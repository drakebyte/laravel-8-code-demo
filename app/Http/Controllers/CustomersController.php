<?php

namespace App\Http\Controllers;

use App\Events\CustomerCreatedEvent;
use App\Http\Requests\CustomerRequest;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:view,customer')->only(['show']); //  only show single page to users with "view" policy (permission)
    }

    public function index()
    {
        $customers = Customer::with('company')->paginate(4);

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $customer  = new Customer();
        $companies = Company::all();
        return view("customers.create", compact('companies', 'customer'));
    }

    public function store(CustomerRequest $request)
    {
        $this->authorize('create', Customer::class);    //  instead of middleware (in route or constructor) we can also use thus
        $customer = Customer::create($request->validated());
        $this->storeImage($customer, $request);
        event(new CustomerCreatedEvent($customer));
        session()->flash('newcustomerlistenerhandle', ['type' => 'warning', 'content' => sprintf("An email has been sent to: %s. This will be sent in the background, by a database job queue.", $customer->email)]);
        return redirect('customers')->with('customer-created', ['type' => 'success', 'content' => sprintf("Customer successfully created: %s", request()->input('name'))]);
    }

    public function show(Customer $customer)   //  controller binding
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer, CustomerRequest $request)
    {
        $this->authorize('update', Customer::class);
        $customer->update($request->validated());   //  cannot be used with static like in create
        $this->storeImage($customer, $request);
        //ToDo: remove old image from storage
        //return redirect()->route('customers.show' , $customer)->with('customer-updated', ['type'=>'success', 'content'=>'Customer successfully updated']);    //  redirect with parameter
        return redirect(request()->input('url'))->with('customer-updated', ['type' => 'success', 'content' => 'Customer successfully updated']);    //  redirect to original url
    }

    public function destroy(Customer $customer)
    {
        $this->authorize('delete', Customer::class);
        $avatar = public_path('storage/' . $customer->image);
        File::delete($avatar);
        $customer->delete();
        return redirect('customers')->with('customer-deleted', ['type' => 'success', 'content' => 'Customer successfully deleted']);
    }

    private function storeImage(Customer $customer, CustomerRequest $request)
    {
        if ($request->has('image')) {
            $customer->update([
                'image' => $request->image->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage/' . $customer->image))->fit(300, 300, null, 'center');
            $image->save();
        }
    }
}

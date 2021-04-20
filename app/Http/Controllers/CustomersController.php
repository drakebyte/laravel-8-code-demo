<?php

namespace App\Http\Controllers;

use App\Events\CustomerCreatedEvent;
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

    public function store()
    {
        $this->authorize('create', Customer::class);    //  instead of middleware (in route or constructor) we can also use thus
        $customer = Customer::create($this->validateRequest());    //	we can use this mass assignment shorthand if we add the fields as fillable to the model
        $this->storeImage($customer);
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

    public function update(Customer $customer)
    {
        $this->authorize('create', Customer::class);
        $customer->update($this->validateRequest(request()->route('customer')->id));   //  cannot be used with static like in create
        $this->storeImage($customer);
        //ToDo: remove old image from storage
        //return redirect()->route('customers.show' , $customer)->with('customer-updated', ['type'=>'success', 'content'=>'Customer successfully updated']);    //  redirect with parameter
        return redirect(request()->input('url'))->with('customer-updated', ['type' => 'success', 'content' => 'Customer successfully updated']);    //  redirect to original url
    }

    public function destroy(Customer $customer)
    {
        $this->authorize('create', Customer::class);
        $avatar = public_path('storage/' . $customer->image);
        File::delete($avatar);
        $customer->delete();
        return redirect('customers')->with('customer-deleted', ['type' => 'success', 'content' => 'Customer successfully deleted']);
    }

    private function validateRequest($exception_id = '0')
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:customers,email,' . $exception_id,
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);
    }

    private function storeImage($customer)
    {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage/' . $customer->image))->fit(300, 300, null, 'center');
            $image->save();
        }
    }
}

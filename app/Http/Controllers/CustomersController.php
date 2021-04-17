<?php

namespace App\Http\Controllers;

use App\Events\CustomerCreatedEvent;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $companies = Company::all();

        return view('customers.index', compact('companies'));
    }

    public function create()
    {
        $customer = new Customer();
        $companies = Company::all();
        return view("customers.create", compact('companies', 'customer'));
    }

    public function store()
    {
        $customer = Customer::create($this->validateRequest());	//	we can use this mass assignment shorthand if we add the fields as fillable to the model
        event( new CustomerCreatedEvent($customer));
        return redirect('customers')->with('customer-created', ['type'=>'success', 'content'=> sprintf("Customer successfully created: %s", request()->input('name'))]);
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
        $customer->update($this->validateRequest(request()->route('customer')->id));   //  cannot be used with static like in create
//        return redirect()->route('customers.show' , $customer)->with('customer-updated', ['type'=>'success', 'content'=>'Customer successfully updated']);    //  redirect with parameter
        return redirect(request()->input('url'))->with('customer-updated', ['type'=>'success', 'content'=>'Customer successfully updated']);    //  redirect to original url
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers')->with('customer-deleted', ['type'=>'success', 'content'=>'Customer successfully deleted']);
    }

    private function validateRequest($exception_id = '0')
    {
        return request()->validate([	//	https://laravel.com/docs/8.x/validation#available-validation-rules
            'name' => 'required|min:3',
            'email' => 'required|email|unique:customers,email,' . $exception_id,
            'active' => 'required',
            'company_id' => 'required',
        ]);
    }
}

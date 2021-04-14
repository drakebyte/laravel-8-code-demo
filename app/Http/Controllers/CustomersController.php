<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list() {
        $customers = Customer::where('active', 1)->get();

        return view('internals.customers', [
            'customers_array' => $customers
        ]);
    }

    public function store() {

        $data = request()->validate([	//	https://laravel.com/docs/8.x/validation#available-validation-rules
            'name' => 'required|min:4',
            'email' => 'required|email|unique:customers',
        ]);

        $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->active = request('active');
        $customer->save();

        return back()->with('customer-created', ['type'=>'success', 'content'=> sprintf("Customer successfully created: %s", $customer->name)]);
    }
}

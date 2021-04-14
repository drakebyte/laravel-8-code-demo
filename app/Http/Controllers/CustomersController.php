<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list() {
        $customers = Customer::all();

        return view('internals.customers', [
            'customers_array' => $customers
        ]);
    }

    public function store() {

        $customer = new Customer();
        $customer->name = request('name');
        $customer->save();

        return back()->with('customer-created', ['type'=>'success', 'content'=> sprintf("Customer successfully created: %s", $customer->name)]);
    }
}

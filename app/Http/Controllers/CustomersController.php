<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list() {
        $customers = Customer::active()->get();

        return view('internals.customers', [
            'customers_array' => $customers
        ]);
    }

    public function store() {

        $data = request()->validate([	//	https://laravel.com/docs/8.x/validation#available-validation-rules
            'name' => 'required|min:4',
            'email' => 'required|email|unique:customers',
            'active' => 'required',
        ]);

        Customer::create($data);

        return back()->with('customer-created', ['type'=>'success', 'content'=> sprintf("Customer successfully created: %s", request()->input('name'))]);
    }
}

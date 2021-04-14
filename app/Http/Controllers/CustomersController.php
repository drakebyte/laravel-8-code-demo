<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list() {
        $customers = [
            'Mary',
            'Sonya',
            'Pisha',
        ];

        return view('internals.customers', [
            'customers_array' => $customers
        ]);
    }
}

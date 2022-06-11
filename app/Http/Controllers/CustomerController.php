<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }
    public function datatable()
    {
        $customers = Customer::all();
        return view('customer.datatable', compact('customers'));
    }

    public function ajax()
    {
        return view('customer.ajax');
    }
}

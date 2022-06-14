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
        $customers = Customer::all();
        $first_names = Customer::orderBy('first_name')->pluck('first_name')->unique();
        $last_names = Customer::orderBy('last_name')->pluck('last_name')->unique();
        return view('customer.ajax', compact('customers', 'first_names', 'last_names'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getCustomers()
    {
        return Datatables::of(Customer::select('first_name', 'last_name', 'email'))
                        ->toJson();
    }
}

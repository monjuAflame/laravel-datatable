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
        // return Datatables::of(Customer::select('id', 'first_name', 'last_name', 'email'))->toJson();
        
        // return Datatables::of(Customer::select('id', 'first_name', 'last_name', 'email')->limit(10)->get())->toJson();
        
        $query = DB::table('customers');

        return DataTables::of($query)->toJson();
    }
}

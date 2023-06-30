<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Resources\Customer as CustomerResource;

class CustomerController extends Controller
{

    public function view($id) {
        $customer = Customer::findOrFail($id);
        $customer_resource = new CustomerResource($customer);
        return response()->json($customer_resource);
    }

    public function store(Request $request) {
        if (empty($request->first_name) || empty($request->last_name)) {
            return response()->json([
                "error" => "First name and Lastname are requried",
            ]);
        }

        $customer = Customer::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
        ]);

        if ($customer) {
            return response()->json($customer);
        }
    }
}

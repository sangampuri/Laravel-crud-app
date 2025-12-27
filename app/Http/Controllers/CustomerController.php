<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {  
        $title = 'Customer Registration';
        $url = url('/customer');
        $data = compact('url', 'title');
        return view('customer')->with($data);
    }

    public function store(Request $request)
    {
        //Insert query
        $customer = new Customer();
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->country = $request['country'];
        $customer->state = $request['state'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->dob = $request['dob'];
        $customer->password = md5($request['password']);
        $customer->save();
        return redirect('/customer/view');
    }
    public function view(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search){
            $customers = Customer::where('name' , 'LIKE',
            "%$search%")->orWhere('email' , 'LIKE',
            "%$search%") ->paginate(10)
            ->withQueryString();
        }else{
            $customers = Customer::paginate(10);
        }
        $data = compact('customers', 'search');
        return view('customer-view')->with($data  );
    }
    public function trash()
    {
        $customers = Customer::onlyTrashed()->get();
        $data = compact('customers');
        return view('customer-trash')->with($data);
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }
        return redirect(route('customer.view'));
    }
    public function restore($id)
    {
        $customer = Customer::onlyTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->restore();
        }
        return redirect(route('customer.view'));
    }
    public function forcedelete($id)
    {
        $customer = Customer::onlyTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->forceDelete();
        }
        return redirect(route('customer.view'));
    }

    public function edit($id)
    {
        $title = "Update Customer";
        $url = url('/customer/update') . "/" . $id;
        $customer = Customer::find($id);
        $data = compact('customer', 'url', 'title');
        return view('customer')->with($data);
    }

    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->country = $request['country'];
        $customer->state = $request['state'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->dob = $request['dob'];
        $customer->save();
        return redirect('/customer/view');
    }
}

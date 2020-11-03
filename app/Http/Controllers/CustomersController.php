<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {

        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:customers',
            'status' => 'required',
            'company_id' => 'required'
        ]);


        Customer::create($data);
        return redirect('customers');
    }

    public function show(Customer $customer)
    {

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'status' => 'required',
            'company_id' => 'required'
        ]);

        $customer->update($data);

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer) {
        $customer->delete();
        return redirect('customers');
    }
}

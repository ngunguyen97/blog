<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Customer;
use App\Events\NewCustomerHasRegisterdEvent;
use App\Mail\WelcomeUserMail;
use Illuminate\Support\Facades\Mail;
use App\Exceptions\CustomersException;
use Illuminate\Pipeline\Pipeline;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index()
    {
        //$customers = Customer::with('company')->paginate(15);

        $customers = Customer::allPosts();

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

        $data = $this->validateRequest();



        $customer = Customer::create($data);

        $this->storeImage($customer);

        event(new NewCustomerHasRegisterdEvent($customer));

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
        $data = $this->validateRequest();

        $customer->update($data);
        $this->storeImage($customer);

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'status' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:5000'
        ]);
    }

    private function storeImage($customer)
    {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }

    public function search(Request $request)
    {
        return view('customers.search');
    }
     public function result(Request $request) {

         try {
            $user = \App\Customer::find($request->input('user_id'));
            if(!$user) throw new CustomersException();
         } catch (\CustomersException $th) {
             throw $th;
         }

        return view('customers.result', compact('user'));
     }
}

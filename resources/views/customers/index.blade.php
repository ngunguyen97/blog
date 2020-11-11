@extends('layouts.app')

@section('title', 'Customers')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Customer List</h1>
        <p><a href="/customers/create">Add New Customer</a></p>
    </div>
</div>

    @foreach ($customers as $customer)
        <div class="row">
            <div class="col-md-2">
                {{ $customer->id }}
            </div>
            <div class="col-md-4">
            <a href="/customers/{{ $customer->id }}">
                {{ $customer->name }}
            </a>
            </div>
            <div class="col-md-4">
                {{ $customer->company->name }}
            </div>
            <div class="col-md-2">
                {{ $customer->status ? 'Active' : 'Inactive' }}
            </div>
        </div>
    @endforeach

    <div class="row py-5">
        <div class="col-md-12 d-flex justify-content-center">
            {{ $customers->links() }}
        </div>
    </div>
@endsection

{{-- Lesson: 15- It's gonna start --}}

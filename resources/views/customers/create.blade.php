@extends('layouts.app')

@section('title', 'Add new Customer')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Create new customer</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <form action="{{ route('customers.create') }}" class="pb-5" method="POST">
        @include('customers.form')
        <button type="submit" class="btn btn-primary">Add Customer</button>
    </form>
    </div>
</div>

@endsection

{{-- Lesson: 15- It's gonna start --}}

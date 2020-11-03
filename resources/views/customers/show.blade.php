@extends('layouts.app')

@section('title', 'Detail for ' . $customer->name )

@section('content')
    <div class="row">
        <div class="col-md-12">
        <h2>Details for {{ $customer->name }}</h2>
            <a href="/customers/{{ $customer->id}}/edit" class="btn btn-primary">Edit</a>
            <form action="/customers/{{ $customer->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p><strong>Name</strong> {{ $customer->name }}</p>
            <p><strong>Email</strong> {{ $customer->email }}</p>
            <p><strong>Company</strong> {{ $customer->company->name }}</p>
        </div>
    </div>
@endsection

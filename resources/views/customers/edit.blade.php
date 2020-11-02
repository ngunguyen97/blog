@extends('layout')

@section('title', 'Edit Customer')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Edit details for {{ $customer->name }}</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <form action="/customers/{{ $customer->id }}" class="pb-5" method="POST">
        @method('PATCH')
        @include('customers.form')
        <button type="submit" class="btn btn-primary">Save Customer</button>
    </form>
    </div>
</div>

@endsection

{{-- Lesson: 15- It's gonna start --}}

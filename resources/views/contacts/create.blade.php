@extends('layouts.app')

@section('title', 'Contact Page')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="/contact" method="POST">
                <div class="form-group pt-2">
                    <label for="name">Name</label>
                <input type="text" name="name" value="" class="form-control">
                    {{ $errors->first('name') }}
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email')}}" class="form-control">
                    @if ($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                    @if ($errors->has('message'))
                    <p>{{ $errors->first('message') }}</p>
                    @endif
                </div>

                @csrf
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
@endsection

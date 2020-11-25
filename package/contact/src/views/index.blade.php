<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact Us</h1>
    
    <form action="{{route('contacts.post')}}" method="post">
        @csrf
        <input type="text" name="name" id="field-name" placeholder="Your name">
        @if ($errors->has('name'))
        <p>{{ $errors->first('name') }}</p>
        @endif
        <input type="email" name="email" id="field-email" placeholder="Your email">
        @if ($errors->has('email'))
        <p>{{ $errors->first('email') }}</p>
        @endif
        <textarea name="message" id="field-message" cols="30" rows="10" placeholder="Your message"></textarea>
        @if ($errors->has('message'))
        <p>{{ $errors->first('message') }}</p>
        @endif
        <input type="submit" value="Submit">
    </form>
</body>
</html>

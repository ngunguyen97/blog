@component('mail::message')
# Introduction
Name: {{$contact->name}}
<br>
{{$contact->message}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

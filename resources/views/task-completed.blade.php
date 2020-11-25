@component('mail::message')
# Introduction
#{{$user['name']}}, <br>
The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

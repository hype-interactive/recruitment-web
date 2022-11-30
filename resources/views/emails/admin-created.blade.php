@component('mail::message')
Hello {{ $user->fname }},

You've just been created as an admin for {{ config('app.name') }}. Please use the following credentials to login:

Email: {{ $user->email }}

Password: {{ $password }}

Note: You can later change your password by clicking on the "Profile" link on the top right corner of the dashboard page.

@component('mail::button', ['url' => 'http://localhost:8000/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
Hello {{ $user->fname }},

Happy Birthday!! Take a moment to enjoy this special day!!


Best Birthday Wishes,<br>
{{ config('app.name') }}
@endcomponent
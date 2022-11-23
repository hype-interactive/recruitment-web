@component('mail::message')
Hello {{ $user->fname }},
happy Birthday!! Take a moment to enjoy this special day!!


Best Birthday Wishes,<br>
{{ config('app.name') }}
@endcomponent
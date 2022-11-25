@component('mail::message')
Dear {{ $user->fname }},

Your application for the **{{ $application->title }}** position has been **{{ $status }}**.

@component('mail::button', ['url' => ''])
View Application
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

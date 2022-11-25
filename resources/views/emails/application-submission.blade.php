@component('mail::message')
Congratulations {{ $user->fname }},

Your application for **{{ $jobPost->title }}** has been submitted successfully. Please wait for the employer to review your application.
You can view the status of your application in your profile page.

@component('mail::button', ['url' => 'http://localhost:8000/user/{{ $user->id }}'])
View your profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

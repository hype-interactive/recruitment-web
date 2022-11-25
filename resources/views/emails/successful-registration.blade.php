@component('mail::message')
Hello {{ $user['fname'] }},
Thank you for onboarding with TopTalented Recruitment Agency. We are glad to have you on board. We hope you will enjoy your experience with us.

@component('mail::button', ['url' => 'https://ttr.hype.co.tz'])
View Site
@endcomponent


Best Regards,<br>
{{ config('app.name') }}
@endcomponent
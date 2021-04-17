@component('mail::message')
    # Welcome new user

    @component('mail::button', ['url' => ''])
        Verify email
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

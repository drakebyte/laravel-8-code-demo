@component('mail::message')
# Introduction

{{ $data['name'] }} has sent you an email.

{{ $data['message'] }}

@component('mail::button', ['url' => ''])
    Click for disappointment
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
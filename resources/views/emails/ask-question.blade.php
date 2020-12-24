@component('mail::message')

## {{ $data['title'] }}

{{ $data['message'] }}

Thanks,<br>
{{ $data['name'] }}
@endcomponent

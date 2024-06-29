@component('mail::message')
# Document Status Updated

Your document of type {{ $documentType }} has been updated to {{ $documentStatus }}.

Thanks,
{{ config('app.name') }}
@endcomponent

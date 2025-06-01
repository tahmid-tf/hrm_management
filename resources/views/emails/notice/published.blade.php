@component('mail::message')
    # {{ $notice->title }}

    {!! nl2br(e($notice->description)) !!}

    @component('mail::button', ['url' => route('public_notice_data')])
        View Notice
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent

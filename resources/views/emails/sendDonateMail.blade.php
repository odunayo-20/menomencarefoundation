

@component('mail::layout')
{{-- Header --}}
@slot ('header')
@component('mail::header', ['url' => config('app.url')])
    <!-- header -->
    {{ config('app.name') }}
@endcomponent
@endslot

{{-- Content here --}}
<h2>Name: {{ $maildata['fullname'] }}</h2>
<h2>Email: {{ $maildata['email'] }}</h2>
<p> Amount to Donate: {{ number_format($maildata['amount'], 2) }} Naira</p>
<p>{{ $maildata['message'] }}</p>


<p> Bank Name : {{ $maildata['bankName'] }}</p>
        <p> Account Name : {{ $maildata['accountName'] }}</p>
        <p> Account Number: {{ $maildata['accountNumber'] }}</p>
        <p>{{ $maildata['thanks'] }}</p>
        



{{-- Subcopy --}}
@slot('subcopy')
@component('mail::subcopy')
<!-- subcopy -->
@endcomponent
@endslot

{{-- Footer --}}
@slot ('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
<!-- footer -->
@endcomponent
@endslot
@endcomponent



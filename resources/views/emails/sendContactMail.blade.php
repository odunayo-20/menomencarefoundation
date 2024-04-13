

@component('mail::layout')
{{-- Header --}}
@slot ('header')
@component('mail::header', ['url' => config('app.url')])
    <!-- header -->
    {{ config('app.name') }}
@endcomponent
@endslot

{{-- Content here --}}
<h2>Name: {{ $maildata['name'] }}</h2>
<h2>Email: {{ $maildata['email'] }}</h2>
<p>{{ $maildata['message'] }}</p>



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



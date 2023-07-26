@include('front.header')
@if ($data['content'])
    {{ view($data['content'],$data) }}
@else
    {{ 'Not found!' }}
@endif
@include('front.footer')
@include('back.header')
@if ($data['content'])
    {{ view($data['content'],$data) }}
@else
    {{ 'Not found!' }}
@endif
@include('back.footer')

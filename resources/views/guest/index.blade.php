@extends('layouts.base')

@section('title')
Guest page
@endsection

@section('body')
<div id="qrcode"></div>
<a href="/logout">logout</a>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
new QRCode(document.getElementById("qrcode"), "{{ Cookie::get('phone_number') }}");
</script>
@endsection

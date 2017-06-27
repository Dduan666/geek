@extends('master')

@section('title', '产品类别')

@section('content')
    <div class="visible-print text-center">
        {!! QrCode::size(100)->generate(Request::url()) !!}
        <p>Scan me to return to the original page.</p>
    </div>
    {{--<p>this is or_code</p>--}}
@endsection
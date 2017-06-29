@extends('master')

@section('title', '邀请码')

@section('content')
    <div class="weui_btn_area">
        <a class="weui_btn" href="javascript:">
            {!! $code !!}
        </a>
    </div>

@endsection
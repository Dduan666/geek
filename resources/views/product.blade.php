@extends('master')

@section('title', '产品列表')

@section('content')
    <div class="weui_cells weui_cells_access">
            <a class="weui_cell" href="">
                <div class="weui_cell_hd"><img class="bk_preview" src=""></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <div style="margin-bottom: 10px;">
                        <span class="bk_title"></span>
                        <span class="bk_price" style="float: right;">￥ </span>
                    </div>

                    <p class="bk_summary"></p>
                </div>
                <div class="weui_cell_ft"></div>
            </a>
    </div>
@endsection

@section('my-js')

@endsection
@extends('admin.master')

@section('content')
    <nav class="breadcrumb">
        <i class="Hui-iconfont"></i> 首页
        <span class="c-gray en">&gt;</span> 产品管理
        <span class="c-gray en">&gt;</span> 产品列表
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont"></i></a>
    </nav>
    <div class="page-container">
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a href="javascript:;" onclick="product_add('添加产品','/admin/product_add')" class="btn btn-primary radius">
                    <i class="Hui-iconfont">&#xe600;</i> 添加产品</a>
            </span>
            <span class="r">共有数据：<strong>{{count($products)}}</strong> 条</span>
        </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th width="80">ID</th>
                    <th width="100">名称</th>
                    <th width="40">简介</th>
                    <th width="90">价格</th>
                    <th width="90">类别</th>
                    <th width="50">预览图</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="text-c">
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->summary}}</td>
                        <td>{{$product->price}}</td>
                        <td>@if($product->category != null)
                                {{$product->category->name}}
                            @endif</td>
                        <td>@if($product->preview != null)
                                <img src="{{$product->preview}}" alt="预览图" style="width: 50px; height: 50px;">
                            @endif</td>
                        <td class="td-manage">
                            <a title="详情" href="javascript:;" onclick="product_info('产品详情','/admin/product_info?id={{$product->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe695;</i></a>
                            <a title="编辑" href="javascript:;" onclick="product_edit('编辑产品','/admin/product_edit?id={{$product->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                            <a title="删除" href="javascript:;" onclick='product_del("{{$product->name}}", "{{$product->id}}")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('my-js')
    <script type="text/javascript">
        function product_add(title, url) {
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

        function product_info(title, url) {
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

        function product_edit(title, url) {
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }

        function product_del(title, url) {
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
    </script>
@endsection
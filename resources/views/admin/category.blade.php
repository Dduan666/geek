@extends('admin.master')

@section('content')
    <nav class="breadcrumb">
        <i class="Hui-iconfont"></i> 首页
        <span class="c-gray en">&gt;</span> 产品管理
        <span class="c-gray en">&gt;</span> 分类管理
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont"></i></a>
    </nav>
    <div class="page-container">
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a href="javascript:;" onclick="category_add('添加类别','/admin/category_add')" class="btn btn-primary radius">
                    <i class="Hui-iconfont">&#xe600;</i> 添加类别</a>
            </span>
            <span class="r">共有数据：<strong>{{count($categories)}}</strong> 条</span>
        </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th width="70">ID</th>
                    <th width="80">名称</th>
                    <th width="200">编号</th>
                    <th width="120">父类别</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr class="text-c">
                    <td>{{$category -> id}}</td>
                    <td>{{$category -> name}}</td>
                    <td>{{$category -> category_no}}</td>
                    <td>
                        @if($category->parent != null)
                            {{$category -> parent -> name}}
                        @endif
                    </td>
                    <td class="f-14 product-brand-manage">
                        <a style="text-decoration:none" onclick="product_brand_edit('品牌编辑','codeing.html','1')" href="javascript:;" title="编辑"><i class="Hui-iconfont"></i></a>
                        <a style="text-decoration:none" class="ml-5" onclick="active_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('my-js')
    <script>
        /*产品-添加*/
        function category_add(title,url){
            var index = layer.open({
                type: 2,
                title: title,
                content: url
            });
            layer.full(index);
        }
    </script>
@endsection
@extends('admin.master')

@section('content')
    <div class="page-container">
        <form action="" method="post" class="form form-horizontal" id="form-category-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <input type="text" class="input-text" value="" datatype="*" placeholder="" name="name" nullmsg="名称不能为空">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>序号：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <input type="number" class="input-text" value="0" datatype="*" placeholder="" name="category_no">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <span class="select-box" style="width: 200px;">
                        <select name="parent_id" class="select">
                            <option>无</option>
                            @foreach($categories as $category)
                                <option value="{{$category -> id}}">{{$category -> name}}</option>
                            @endforeach
                        </select>
				    </span>
                </div>
            </div>

            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <button onClick="article_save_submit();" class="btn btn-primary radius" type="submit">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('my-js')
    <script>
        $(function () {
            $("#form-category-add").validate({
                rules:{
                    name:{
                        required:true,
                    },
                    number:{
                        required:true,
                    },
                    parent_id:{
                        required:true,

                    },
                },
                onkeyup:false,
                focusCleanup:true,
                success:"valid",
                submitHandler:function(form){
                    $(form).ajaxSubmit({
                        type: 'post',
                        url: "xxxxxxx" ,
                        success: function(data){
                            layer.msg('添加成功!',{icon:1,time:1000});
                        },
                        error: function(XmlHttpRequest, textStatus, errorThrown){
                            layer.msg('error!',{icon:1,time:1000});
                        }
                    });
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.$('.btn-refresh').click();
                    parent.layer.close(index);
                }
            });
        });
    </script>
@endsection
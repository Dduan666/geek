@extends('admin.master')

@section('content')
    <div class="page-container">
        <form action="" method="post" class="form form-horizontal" id="form-category-edit">
            {{ csrf_field() }}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <input type="text" class="input-text" value="{{$category -> name}}" datatype="*" placeholder="" name="name" nullmsg="名称不能为空">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>序号：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <input type="number" class="input-text" value="{{$category -> category_no}}" datatype="*" placeholder="" name="category_no">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <span class="select-box" style="width: 200px;">
                        <select name="parent_id" class="select">
                            <option value="0">无</option>
                            @foreach($categories as $temp)
                                @if($category -> parent_id == $temp -> id)
                                    <option selected value="{{$temp -> id}}">{{$temp -> name}}</option>
                                @elseif($category -> parent_id != $temp -> id)
                                    <option value="{{$temp -> id}}">{{$temp -> name}}</option>
                                @endif
                            @endforeach
                        </select>
				    </span>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">预览图：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <img id="preview_id" src="/admin/images/icon-add.png" style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id').click()" />
                    <input type="file" name="file" id="input_id" style="display: none;" onchange="return uploadImageToServer('input_id','images', 'preview_id');" />
                </div>
            </div>

            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <button class="btn btn-primary radius" type="submit">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('my-js')
    <script>
        $(function () {
            $("#form-category-edit").validate({
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
                    var id = "{{$category -> id}}";
                    var name = $('input[name=name]').val();
                    var category_no = $('input[name=category_no]').val();
                    var parent_id = $('select[name=parent_id] option:selected').val();
//                    var preview = ($('#preview_id').attr('src')!='/admin/images/icon-add.png'?$('#preview_id').attr('src'):'');


                    $(form).ajaxSubmit({
                        type: 'POST',
                        dataType: 'json',
                        url: '/admin/service/category/edit' ,
                        data: {id: id, name: name, category_no: category_no, parent_id: parent_id, _token: "{{csrf_token()}}"},
                        success: function(data){
                            if(data == null) {
                                layer.msg('服务端错误', {icon:2, time:2000});
                                return;
                            }
                            if(data.status != 0) {
                                layer.msg(data.message, {icon:2, time:2000});
                                return;
                            }

                            layer.msg(data.message, {icon:1, time:2000});
                            parent.location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                            layer.msg('ajax error', {icon:2, time:2000});
                        },
                        beforeSend: function(xhr){
                            layer.load(0, {shade: false});
                        },
                    });

                    return false;
                }
            });
        });
    </script>
@endsection
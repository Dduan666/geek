@extends('admin.master')

@section('content')
    <div class="page-container">
        <form action="" method="post" class="form form-horizontal" id="form-product-edit">
            {{ csrf_field() }}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <input type="text" class="input-text" value="{{$porduct->name}}" datatype="*" placeholder="" name="name" nullmsg="名称不能为空">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>简介：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <input type="text" class="input-text" value="{{$porduct->summary}}" datatype="*" placeholder="" name="summary" nullmsg="简介不能为空">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>价格：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <input type="number" class="input-text" value="{{$porduct->price}}" datatype="*" placeholder="" name="price" nullmsg="价格不能为空">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>类别：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <span class="select-box" style="width: 200px;">
                        <select name="category_id" class="select">
                            <option value="0">无</option>
                            {{--@foreach($categories as $category)--}}
                            {{--<option value="{{$category -> id}}">{{$category -> name}}</option>--}}
                            {{--@endforeach--}}
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
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>详细内容：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <textarea id="editor" type="text/plain" style="width:100%; height:400px;"></textarea>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品图片：</label>
                <div class="formControls col-xs-7 col-sm-5">
                    <img id="preview_id1" src="/admin/images/icon-add.png"
                         style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id1').click()" />
                    <input type="file" name="file" id="input_id1"
                           style="display: none;" onchange="return uploadImageToServer('input_id1','images', 'preview_id1');" />
                    <img id="preview_id2" src="/admin/images/icon-add.png"
                         style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id2').click()" />
                    <input type="file" name="file" id="input_id2"
                           style="display: none;" onchange="return uploadImageToServer('input_id2','images', 'preview_id2');" />
                    <img id="preview_id3" src="/admin/images/icon-add.png"
                         style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id3').click()" />
                    <input type="file" name="file" id="input_id3"
                           style="display: none;" onchange="return uploadImageToServer('input_id3','images', 'preview_id3');" />
                    <img id="preview_id4" src="/admin/images/icon-add.png"
                         style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id4').click()" />
                    <input type="file" name="file" id="input_id4"
                           style="display: none;" onchange="return uploadImageToServer('input_id4','images', 'preview_id4');" />
                    <img id="preview_id5" src="/admin/images/icon-add.png"
                         style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id5').click()" />
                    <input type="file" name="file" id="input_id5"
                           style="display: none;" onchange="return uploadImageToServer('input_id5','images', 'preview_id5');" />
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
    <script type="text/javascript" src="/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
    <script type="text/javascript" src="/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
    <script type="text/javascript" src="/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
    <script>
        $(function () {
            var ue = UE.getEditor('editor');
            ue.execCommand( "getlocaldata" );
            $("#form-product-edit").validate({
                rules:{
                    name:{
                        required:true,
                    },
                    summary:{
                        required:true,
                    },
                    price:{
                        required:true,
                    },
                },
                onkeyup:false,
                focusCleanup:true,
                success:"valid",
                submitHandler:function(form) {
                    $(form).ajaxSubmit({
                        type: 'POST',
                        dataType: 'json',
                        url: '/admin/service/product/add',
                        data: {
                            name: $('input[name=name]').val(),
                            summary: $('input[name=summary]').val(),
                            price: $('input[name=price]').val(),
                            category_id: $('select[name=category_id] option:selected').val(),
                            preview: ($('#preview_id').attr('src')!='/admin/images/icon-add.png'?$('#preview_id').attr('src'):''),
                            content: ue.getContent(),
                            preview1: ($('#preview_id1').attr('src')!='/admin/images/icon-add.png'?$('#preview_id1').attr('src'):''),
                            preview2: ($('#preview_id2').attr('src')!='/admin/images/icon-add.png'?$('#preview_id2').attr('src'):''),
                            preview3: ($('#preview_id3').attr('src')!='/admin/images/icon-add.png'?$('#preview_id3').attr('src'):''),
                            preview4: ($('#preview_id4').attr('src')!='/admin/images/icon-add.png'?$('#preview_id4').attr('src'):''),
                            preview5: ($('#preview_id5').attr('src')!='/admin/images/icon-add.png'?$('#preview_id5').attr('src'):''),
                            _token: "{{csrf_token()}}"
                        },
                        success: function (data) {
                            if (data == null) {
                                layer.msg('服务端错误', {icon: 2, time: 2000});
                                return;
                            }
                            if (data.status != 0) {
                                layer.msg(data.message, {icon: 2, time: 2000});
                                return;
                            }

                            layer.msg(data.message, {icon: 1, time: 2000});
                            parent.location.reload();
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                            layer.msg('ajax error', {icon: 2, time: 2000});
                        },
                        beforeSend: function (xhr) {
                            layer.load(0, {shade: false});
                        },
                    });
                    return false;
                }
            });
        });
    </script>
@endsection
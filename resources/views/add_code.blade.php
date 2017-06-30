@extends('master')

@section('title', '生成邀请码')

@section('content')
{{--<div class="weui_cells weui_cells_radio">--}}
  {{--<label class="weui_cell weui_check_label" for="x11">--}}
      {{--<div class="weui_cell_bd weui_cell_primary">--}}
          {{--<p>手机号添加</p>--}}
      {{--</div>--}}
      {{--<div class="weui_cell_ft">--}}
          {{--<input type="radio" class="weui_check" name="register_type" id="x11" checked="checked">--}}
          {{--<span class="weui_icon_checked"></span>--}}
      {{--</div>--}}
  {{--</label>--}}
{{--</div>--}}
<div class="weui_cells weui_cells_form">
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">手机号</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="number" placeholder="" name="phone"/>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">昵称</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="text" placeholder="如：女士、先生" name='nickname'/>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">性别</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          男&nbsp;<input class="weui_cells_radio" type="radio" value="0" name='sex'/>&nbsp;&nbsp;&nbsp;&nbsp;
          女&nbsp;<input class="weui_cells_radio" type="radio" value="1" name='sex'/>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">手机验证码</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="number" placeholder="" name='phone_code'/>
      </div>
      <p class="bk_important bk_phone_code_send">发送验证码</p>
      <div class="weui_cell_ft">
      </div>
  </div>
</div>

<div class="weui_cells_tips"></div>
<div class="weui_btn_area">
  <a class="weui_btn weui_btn_primary" href="javascript:" onclick="onRegisterClick();">确定</a>
</div>
@endsection

@section('my-js')
<script type="text/javascript">
  $('.bk_validate_code').click(function () {
    $(this).attr('src', '/service/validate_code/create?random=' + Math.random());
  });

</script>
<script type="text/javascript">
  var enable = true;
  $('.bk_phone_code_send').click(function(event) {
    if(enable == false) {
      return;
    }

    var phone = $('input[name=phone]').val();
    // 手机号不为空
    if(phone == '') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('请输入手机号');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }
    // 手机号格式
    if(phone.length != 11 || phone[0] != '1') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('手机格式不正确');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }

    $(this).removeClass('bk_important');
    $(this).addClass('bk_summary');
    enable = false;
    var num = 60;
    var interval = window.setInterval(function() {
      $('.bk_phone_code_send').html(--num + 's 重新发送');
      if(num == 0) {
        $('.bk_phone_code_send').removeClass('bk_summary');
        $('.bk_phone_code_send').addClass('bk_important');
        enable = true;
        window.clearInterval(interval);
        $('.bk_phone_code_send').html('重新发送');
      }
    }, 1000);

    $.ajax({
      url: '/service/validate_phone/send',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {phone: phone, _token: "{{csrf_token()}}"},
      success: function(data) {
        if(data == null) {
          $('.bk_toptips').show();
          $('.bk_toptips span').html('服务端错误');
          setTimeout(function() {$('.bk_toptips').hide();}, 2000);
          return;
        }
        if(data.status != 0) {
          $('.bk_toptips').show();
          $('.bk_toptips span').html(data.message);
          setTimeout(function() {$('.bk_toptips').hide();}, 2000);
          return;
        }

        $('.bk_toptips').show();
        $('.bk_toptips span').html('发送成功');
        setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      },
      error: function(xhr, status, error) {
        console.log(xhr);
        console.log(status);
        console.log(error);
      }
    });
  });
</script>
<script type="text/javascript">
    var phone = '';
    var nickname = '';
    var sex = '';
    var phone_code = '';
    function onRegisterClick() {
        phone = $('input[name=phone]').val();
        nickname = $('input[name=nickname]').val();
        sex = $('input[name=sex]').val();
        phone_code = $('input[name=phone_code]').val();
        if (verifyPhone(phone, nickname, sex, phone_code) == false){
            return;
        }

        $.ajax({
            type: "POST",
            url: '/service/add_code',
            dataType: 'json',
            cache: false,
            data: {phone: phone, nickname: nickname, sex: sex, phone_code: phone_code, _token: "{{csrf_token()}}"},
            success: function(data) {
                if(data == null) {
                    $('.bk_toptips').show();
                    $('.bk_toptips span').html('服务端错误');
                    setTimeout(function() {$('.bk_toptips').hide();}, 2000);
                    return;
                }
                if(data.status != 0) {
                    $('.bk_toptips').show();
                    $('.bk_toptips span').html(data.message);
                    setTimeout(function() {$('.bk_toptips').hide();}, 2000);
                    return;
                }

                $('.bk_toptips').show();
                $('.bk_toptips span').html('添加成功');
                setTimeout(function() {$('.bk_toptips').hide();}, 2000);
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    }

  function verifyPhone(phone, nickname, sex, phone_code) {
    // 手机号不为空
    if(phone == '') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('请输入手机号');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    // 手机号格式
    if(phone.length != 11 || phone[0] != '1') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('手机格式不正确');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    if(nickname == '') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('昵称不能为空！');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    if(sex == '') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('请选择性别');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }

    if(phone_code == '') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('手机验证码不能为空!');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    if(phone_code.length != 6) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('手机验证码为6位!');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    return true;
  }

</script>

@endsection

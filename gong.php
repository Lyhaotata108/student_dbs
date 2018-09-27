<?php include("user_head.php"); ?>
<form id="form-msg" class="sui-form form-horizontal" novalidate="novalidate">
  <div class="control-group">
    <label for="inputEmail" class="control-label">邮箱：</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="email" placeholder="邮箱" data-rules="required|email">
    </div>
  </div>
  <div class="control-group">
    <label for="inputPassword" class="control-label">密码：</label>
    <div class="controls">
      <input type="password" id="inputPassword" name="password" placeholder="密码" title="密码" data-rules="required|minlength=6|maxlength=12">
    </div>
  </div>
  <div class="control-group">
    <label for="inputNick" class="control-label">昵称：</label>
    <div class="controls">
      <input type="text" id="inputNick" name="nick" placeholder="昵称" data-rules="required|minlength=2|maxlength=6" data-error-msg="昵称必须是2-6位" data-empty-msg="亲，昵称别忘记填了">
    </div>
  </div>
  <div class="control-group">
    <label for="sanwei" class="control-label"></label>
    <div class="controls">
      <button type="submit" class="sui-btn btn-primary">立即注册</button>
    </div>
  </div>
</form>
<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script>
  $("#form-msg").validate({
    messages: {
      email: ["亲，你还没填邮箱呢", "邮箱不要瞎填哦"],
      password: "亲，密码必须是6-12位哦"
    }
  })
</script>
<?php
$range=array('a','b','c','d','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
$rangeTwo=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
$rangeS=array('0','1','2','3','4','5','6','7','8','9');
$arr=array_merge($range,$rangeTwo,$rangeS);
// print_r($arr);
shuffle($arr);
$arr=array_flip($arr);
$arr=array_rand($arr,4);
$res='';
foreach ($arr as $v){
    $res.=$v;
}
if (condition) {
  # code...
}
echo $res;
?>
<?php include("user_foot.php") ?>


  // var spans = document.getElementById('spans');
  // console.log(spans);
  // var worder =document.getElementById("worder");
  // console.log(worder);
  // var code_str = '';
  // var num = 0;
  // getCodeFn();
  // function getCodeFn(){
  //   var strArry = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
  //   code_str = '';
  //   for (var i = 0; i < 4; i++) {
  //     num = parseInt(Math.random()*strArry.length);
  //     code_str += strArry[num];
  //   }
  //   spans.value = code_str;
  // }
  // spans.onclick = getCodeFn;
  // chaFn();
  // function chaFn(){
  //   var cv = spans.value.toLowerCase();
  //   var tv = worder.value.toLowerCase();
  //   if (cv == tv) {
  //     alert('ojbk');
  //     getCodeFn();
  //   }else if (tv == '') {
  //     // alert('输入验证码');
  //   }else{
  //     alert('您点错了');
  //   }
  //   worder.value = '';
  // }
<?php

?>
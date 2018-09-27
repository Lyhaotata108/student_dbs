<?php include("user_head.php"); ?>
			<form id="form-msg"class="sui-form form-horizontal" >
				 <div class="control-group">
    					<label for="inputEmail" class="control-label">邮箱：</label> 	
    					<div class="controls">
      					<input type="text" id="inputEmail" name="yongxiang" placeholder="邮箱"class="input-fat input-large" data-rules="required|email">
    					</div>
  				</div>
				  <div class="control-group">
    					<label for="inputPassword" class="control-label">密码：</label>
    					<div class="controls">
      					<input type="password" id="inputPassword" value="" name="password" class="input-fat input-large"placeholder="密码" title="密码" data-rules="required|minlength=6|maxlength=12">
    					</div>
  				</div>
				    <div class="control-group">
				    <label for="word"class="control-label">密码验证:</label>
				    <div class="controls">
				      <input type="password" id="worder" placeholder="请输入验证密码" class="input-fat input-large" name="wordYan" value="">
				 	<input type="button" name="typeTow"value="<?php
						$range=array('a','b','c','d','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
						$rangeTwo=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
						$rangeS=array('0','1','2','3','4','5','6','7','8','9');
						// $spans =$_REQUEST()
						// $ret = empty($_POST["$res"])?"add":$_POST["$res"];
						$arr=array_merge($range,$rangeTwo,$rangeS);
						shuffle($arr);
						$arr=array_flip($arr);
						$arr=array_rand($arr,4);
						$res='';
						foreach ($arr as $v){
						    $res.=$v;
						}
						echo $res;
            ?>" id="spans"name="agree">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label"></label>
            <div class="controls" id="tijiao">
              <button type="submit" class="sui-btn btn-primary">提交</button>
            </div>
          </div>
                            <a href="wangji.php" title="" id="miMa">忘记密码</a>
        </form>
<?php include("user_foot.php") ?>
<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script>
 var spans = document.getElementById('spans');
  var worder =document.getElementById("worder"); 
  var  inputPassword=document.getElementById("inputPassword");
  $("#form-msg").validate({
    messages: {
      yongxiang:["您,还没填邮箱呢", "邮箱不要瞎填哦"],
      password: "您，密码必须是6-12位哦"
    }
  })
</script>
<script type="text/javascript">
  $("button[type=submit]").on("click",function(){
    // console.log(data.code);
          // 使用$.ajax ()提交数据
          $.ajax({
                    url          :"login-save-ajax.php",
                    type       :"POST",
                    data       :$('#form-msg').serialize(),
                    dataType :"json",
                    // beforeSend:function(XHLHttpRequest){
                    //     // 发送前调用此函数。一般在此检测代码或者loading
                    //     // this
                    //     console.log(data);
                    // },
                    // complete:function(XHLHttpRequest,testStatus){
                    //      // 请求完成调用此函数(请求成功或失败都调用)
                    // },
                    success:function(data,textStatus){
                        // 请求成功调用此函数
                        console.log(data);
                        if (data.code=="200") {
                            chaFn();
                          // console.log(data.code);
                          window.location.href="index.php";
                        }
                          if (data.code=20001) {
                              // 提示密码错误
                          }
                          if (data.code=20004) {
                              // 提示邮箱填写错误
                          }
                    },
                    error :function(XMLHttpRequest,textStatus,errorThrown){
                       // 请求失败后调用此函数
                       console.log("失败原因"+errorThrown);
                    }
          });
          return false;
  });
  // console.log(inputPassword);
  // var word =document.getElementById("word"); 
  // console.log(word);
 
  function chaFn(){
    var cv = spans.value.toLowerCase();
    var tv = worder.value.toLowerCase();
    // console.log(cv);
    // var paSward =inputPassword.value;
    // var pas =word.value;
    // console.log(pas);
 if (cv == tv){
      alert('验证码一致通过');
    }else if (tv == '') {
      alert('输入验证码');
    }
    else{
    alert("验证有误");
    }
    worder.value = '';
  }
</script>


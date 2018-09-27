<?php include("user_head.php"); ?>
			<form id="form-msg"class="sui-form form-horizontal" >
				 <div class="control-group">
    					<label for="inputEmail" class="control-label">邮箱：</label> 	
    					<div class="controls">
      					<input type="text" id="inputEmail" name="yongxiang" placeholder="邮箱"class="input-fat input-large" data-rules="required|email">
                                  <span id="tips"></span><br>
    					</div>
  				</div>
				<div class="control-group">
    					<label for="inputEmail" class="control-label">用户：</label>
    					<div class="controls">
      					<input type="text" id="userm" name="yonghu" placeholder="邮箱"class="input-fat input-large" data-rules="required|minlength=2|maxlength=12">
    					</div>
  				</div>

				  <div class="control-group">
    					<label for="inputPassword" class="control-label">密码：</label>
    					<div class="controls">
      					<input type="password" id="inputPassword" value="" name="password" class="input-fat input-large"placeholder="密码" title="密码" data-rules="required|minlength=6|maxlength=12">
    					</div>
  				</div>
				  <div class="control-group">
    					<label for="inputPassword" class="control-label">重复密码：</label>
    					<div class="controls">
      					<input type="password" id="word" value="" name="word" class="input-fat input-large"placeholder="密码" title="密码" data-rules="required|minlength=6|maxlength=12">
    					</div>
  				</div>
				    <div class="control-group">
				    <label for="word" class="control-label">密码验证:</label>
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
      			    	<label for="miTshi" class="control-label">密码提示问题：</label>
      			    	<div class="controls">
      			     	<select id="miTshi" name="miTshi">
      					<option value="你的小学在哪上学">你的小学在哪上学</option>
      					<option value="你的最好朋友的姓名">你的最好朋友的姓名</option>
      					<option value="你最有纪念意义的日期">你最有纪念意义的日期</option>
      			     	</select>
			    </div>
			  </div>
			 <div class="control-group">
    				<label for="inputNick" class="control-label">密码答案：</label>
   				 <div class="controls">
      				<input type="text" id="inputNick" name="daAan"class="input-fat input-large"
      				 placeholder="密码答案" data-rules="required|minlength=2|maxlength=6" 
      				>
    				</div>
  			</div>
				  <div class="control-group">
				    <label class="control-label"></label>
				    <div class="controls" id="tijiao">
				      <button type="submit" class="sui-btn btn-primary" id="Tijiao" >提交</button>
				    </div>
				  </div>
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
    });
</script>
<script type="text/javascript">
 var inputEmail =document.getElementById("inputEmail");
  $("input[name=yongxiang]").on("blur",function(){
  //为了实现异步请求，先要实例化一个XMLHttpRequest 对象
  if(window.XMLHttpRequest){
      //高级浏览器
      var xhr = new XMLHttpRequest();
    }else{
      //IE6
      var xhr = new ActiveObject("Msxml2.XMLHTTP");
    }
    xhr.onreadystatechange=function(){
      if (xhr.readyState==3) {
        // console.log("正在处理中,请稍候");
      }
      if (xhr.readyState==4) {
            console.log(xhr.responseText);
        if (xhr.status=="200"){
            if (xhr.responseText=="ok") {
            $("#tips").html("邮件重复");
          }else{
            $("#tips").html("可以注册");
          }
        }
        if (xhr.status=="404") {
          console.log("网页被外星人劫持");
        };
      }
    }
    xhr.open("get","logon-save.php?yongxiang="+encodeURIComponent(inputEmail.value),true);
    xhr.send(null); 
    return false;
});



$("#Tijiao").on("click",function(){
            if(window.XMLHttpRequest){
                  //高级浏览器
                  var xhr = new XMLHttpRequest();
                }else{
                  //IE6
                  var xhr = new ActiveObject("Msxml2.XMLHTTP");
            }
            xhr.onreadystatechange=function(){
      // console.log(xhr.responseText);
      if (xhr.readyState==4) {
            console.log(xhr.responseText);
          if (xhr.status=="200"){
              if (xhr.responseText=="ok") {
                        chaFn();
                     $("#tips").html("注册成功"); 
                     window.location.href="yongdeng.php";
                    
                 }else{
                    $("#tips").html("注册失败");
                  }
               }
        if (xhr.status=="404") {
          console.log("网页被外星人劫持");
        };
      }
    }
      xhr.open("POST","login-save.php",true);   
    // 设置文头
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhr.send("yongxiang="+encodeURIComponent($("#inputEmail").val())+
              "&yonghu="+encodeURIComponent($("#userm").val())+
              "&password="+encodeURIComponent($("#inputPassword").val())+
              "&miTshi="+encodeURIComponent($("#miTshi").val()) +"&daAan="+
              encodeURIComponent($("#inputNick").val())
              );
            return false;   
   });

  function chaFn(){
    var cv = spans.value.toLowerCase();
    var tv = worder.value.toLowerCase();
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

<style type="text/css" media="screen">
              #tips{
                color:red;
              }
</style>  

	<?php include("user_head.php"); ?>
			<form class="sui-form form-horizontal"id="form-msg" action="xinwen.php" method="post">

				  <div class="control-group">
    					<label for="inputEmail" class="control-label">用户邮件：</label> 	
    					<div class="controls">
      					<input type="text" id="inputEmail" name="yongxiang" placeholder="用户邮件"class="input-fat input-large" data-rules="required|email">
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
				    <label for="word" class="control-label">密码验证:</label>
				    <div class="controls">
				      <input type="password" id="worder" placeholder="请输入验证密码" class="input-fat input-large" name="word" value="">
				 	<input type="button" name="" value="" id="spans">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label"></label>
				    <div class="controls" id="tijiao">
				      <button type="submit" class="sui-btn btn-primary">提交</button>
				    </div>
				  </div>
				</form>
<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script type="text/javascript">
$("#form-msg").validate({
    messages: {
      yongxiang:["亲，你还没填邮箱呢", "邮箱不要瞎填哦"],
      password: "亲，密码必须是6-12位哦"
    }
  })	
</script>
<script type="text/javascript">
	var spans = document.getElementById('spans');
	console.log(spans);
	var worder =document.getElementById("worder");
	console.log(worder);
	var code_str = '';
	var num = 0;
	getCodeFn();
	function getCodeFn(){
		var strArry = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
		code_str = '';
		for (var i = 0; i < 4; i++) {
			num = parseInt(Math.random()*strArry.length);
			code_str += strArry[num];
		}
		spans.value = code_str;
	}
	spans.onclick = getCodeFn;
	chaFn();
	function chaFn(){
		var cv = spans.value.toLowerCase();
		var tv = worder.value.toLowerCase();
		if (cv == tv) {
			alert('ojbk');
			getCodeFn();
		}else if (tv == '') {
			// alert('输入验证码');
		}else{
			alert('您点错了');
		}
		worder.value = '';
	}
</script>
<?php include("user_foot.php") ?>
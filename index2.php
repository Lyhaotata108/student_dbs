<!-- 头部开始 -->
<?php include("head.php"); ?>
<!-- 左部菜单 -->

  <div class="sidebar sidebar_left">
 	<?php include("leftmenu.php"); ?>
  </div>
  
 			<div class="content">
				<p class="sui-text-xxlarge sui_ck">班级信息录入</p>
				<form class="sui-form form-horizontal  "method="post" action="banji-save.php">
					 <div class="control-group">
    						<label for="inputEmail" class="control-label" >班号:</label>
    						<div class="controls">
                        
      						<input type="text" id="banhao" name="banhao"
            class="input-large input-fat" placeholder="输入课程名称" 
            data-rules="required|minlength=2|maxlength=10">
   				 		</div>
  					</div>
  					<div class="control-group">
    						<label for="inputEmail" class="control-label">班长:</label>
    						<div class="controls">
      						<input type="text" id="banzhang" name="banzhang"
            class="input-large" placeholder="输入班长名称"
             data-rules="required|minlength=2|maxlength=10">
   				 		</div>
  					</div>
  					<div class="control-group">
    						<label for="inputEmail" class="control-label">教室:</label>
    						<div class="controls">
      						<input type="text" id="jiaoshi" name="jiaoshi"
                                    class="input-large" placeholder="输入教室名称" 
                                    data-rules="required|minlength=2|maxlength=10">
   				 		</div>
  					</div>
  					<div class="control-group">
    						<label for="inputEmail" class="control-label">班主任:</label>
    						<div class="controls">
      						<input type="text" id="banzhu" name="banzhu"
                               class="input-large" placeholder="输入班主任名称" 
                               data-rules="required|minlength=2|maxlength=10">
   				 		</div>
  					</div>
  					<div class="control-group">
    						<label for="inputEmail" class="control-label">班级口号:</label>
    						<div class="controls">
      						<input type="text" id="banji_kao" name="banji_kao";
                                 class="input-large" placeholder="输入班级口号"
                                 data-rules="required|minlength=2|maxlength=10">
   				 		</div>
  					</div>
  					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<input type="submit" name="" value="提交" class="sui-btn btn-large btn-primary">
						</div>
  					</div>
				</form>
 			</div>
		</div>
  <script type="text/javascript">
  var str = document.cookie;
  console.log(str.split(";"));
  console.log(str.split(";")[0]);
  console.log(str.split(";")[0].split("="));
  console.log(str.split(";")[0].split("=")[1]);
  console.log(document.cookie);
  // console.log(  getCookie("uname"));
  </script>
<?php include("foot.php"); ?>
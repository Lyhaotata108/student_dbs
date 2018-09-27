<!-- 头部开始 -->
<?php include("head.php"); ?>
<!-- 左部开始 -->
  <div class="sidebar sidebar_left">
 	<?php include("leftmenu.php"); ?>
  </div>
 			<div class="content">
				<p class="sui-text-xxlarge sui_ck">课程录入</p>
				<form class="sui-form form-horizontal sui-validate"
                        action="kecheng-save.php" method="post">
					 <div class="control-group">
    						<label for="inputEmail" class="control-label">课程名：</label>
    						<div class="controls">
      						<input type="text" id="kcName"name="kcName" 
                                          class="input-large input-fat" placeholder="输入课程名称" 
                                          data-rules="required|minlength=2|maxlength=10">
   				 		</div>
  					</div>
  					<div class="control-group">
    						<label for="inputEmail" class="control-label">课程时间：</label>
    						<div class="controls">
      							<input type="text" id="kcTime" name="kcTime"class="input-large input-fat" data-toggle="datepicker" placeholder="输入课程时间">
   				 		</div>
  					</div>
  					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls">
							<input type="submit" name="" value="提交" 
                                              class="sui-btn btn-large btn-primary">
						</div>
  					</div>
				</form>
 			</div>
		</div>
<!-- 底部 -->
<?php include("foot.php"); ?>
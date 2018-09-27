<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php 
$kid=empty($_GET["kid"])?"null":$_GET["kid"];
if ($kid=="null") {
 die("请选择要修改的记录");
}else{
 include("conn.php");

//执行SQL语句
$sql="select 课程编号,课程名,时间 from kecheng where 课程编号={$kid}";
$result =mysqli_query($conn, $sql);
// 输出数据
if (mysqli_num_rows($result) > 0 ){
  // 将查询的结果转换为下列数组
  $row = mysqli_fetch_assoc($result);
  }else{
      echo "没有数据";
  }
// 关闭数据库
mysqli_close($conn);
}
 ?>
<!-- 左部开始 -->
  <div class="sidebar sidebar_left">
 	<?php include("leftmenu.php"); ?>
  </div>
 			<div class="content">
				<p class="sui-text-xxlarge sui_ck">课程修改</p>
				<form class="sui-form form-horizontal sui-validate"action="kecheng-save.php" method="post">
					 <div class="control-group">
    						<label for="inputEmail" class="control-label">课程名：</label>
    						<div class="controls">
                                        <!-- 增加一个隐藏的input用来区分是新增的 -->
                                        <input type="hidden" name="action" value="update">
                                    <!-- 增加一个隐藏的input，保存课程编号 -->
                                        <input type="hidden" name="kid" value="<?php echo $row['课程编号']; ?>">
      						<input type="text" id="kcName"name="kcName"; 
                                 class="input-large input-fat" placeholder="输入课程名称" 
                                  data-rules="required|minlength=2|maxlength=10" value="<?php echo $row['课程名']; ?>">
   				 		</div>
  					</div>
  					<div class="control-group">
    						<label for="inputEmail" class="control-label">课程时间：</label>
    						<div class="controls">
      							<input type="text" id="kcTime" name="kcTime"
                    class="input-large input-fat" data-toggle="datepicker"
                     placeholder="输入课程时间"value="<?php echo $row['时间']; ?>" >
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
<!-- 底部 -->
<?php include("foot.php"); ?>
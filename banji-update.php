<style type="text/css" media="screen">
           
</style>
<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php 
$banid=empty($_GET["banid"])?"att":$_GET["banid"];
if ($banid=="att") {
 die("请选择要修改的记录");
}else{
 include("conn.php");

//执行SQL语句
$sql="select 班号,班长,教室,班主任,班级口号 from banji where 班号='{$banid}'";
$result =mysqli_query($conn, $sql);
// 输出数据
if (mysqli_num_rows($result) > 0 ) {
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
				<p class="sui-text-xxlarge sui_ck">班级修改</p>
				<form class="sui-form form-horizontal sui-validate"action="banji-save.php" method="post">
					 <div class="control-group">
    						<label for="inputEmail" class="control-label">班号:</label>
    						<div class="controls">
                                        <!-- 增加一个隐藏的input用来区分是新增的 -->
                                        <input type="hidden" name="ban_Xin" value="gxName">
                                    <!-- 增加一个隐藏的input，保存班号 -->
                                        <input type="hidden" name="ban" value="<?php echo $row['班号']; ?>">
      						<input type="text" id="banhao"name="banhao"; 
                                 class="input-large input-fat" placeholder="输入班号名称" 
                                  data-rules="required|minlength=2|maxlength=10" value="<?php echo $row['班号']; ?>">
   				 		</div>
  					</div>
  					<div class="control-group">
    						<label for="inputEmail" class="control-label">班长:</label>
    						<div class="controls">
      						<input type="text" id="banzhang" name="banzhang"
                    					class="input-large input-fat" data-rules="required|minlength=2|maxlength=10"
                    					placeholder="输入班长名称"value="<?php echo $row['班长']; ?>" >
   				 		</div>
  					</div>
  					<div class="control-group">
    						<label for="inputEmail" class="control-label">教室:</label>
    						<div class="controls">
      						<input type="text" id="jiaoshi" name="jiaoshi"
                    					class="input-large input-fat"data-rules="required|minlength=2|maxlength=10"
                    					placeholder="输入教室名称"value="<?php echo $row['教室']; ?>" >
   				 		</div>
  					</div>
					<div class="control-group">
    						<label for="inputEmail" class="control-label">班主任:</label>
    						<div class="controls">
      						<input type="text" id="banzhu" name="banzhu"
                    					class="input-large input-fat" data-rules="required|minlength=2|maxlength=10"
                    					placeholder="输入班主任名称"value="<?php echo $row['班主任']; ?>" >
   				 		</div>
  					</div>
  					<div class="control-group">
    						<label for="inputEmail" class="control-label">班级口号:</label>
    						<div class="controls">
      						<input type="text" id="banji_kao" name="banji_kao"
                    					class="input-large input-fat" data-rules="required|minlength=2|maxlength=10"
                    					placeholder="输入班级口号"value="<?php echo $row['班级口号']; ?>" >
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
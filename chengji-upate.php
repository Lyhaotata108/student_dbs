<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php 
$Studentider=empty($_GET["Studentider"])?"att":$_GET["Studentider"];
if ($Studentider=="att") {
 die("请选择要修改的记录");
}else{
 include("conn.php");
//执行SQL语句
$sql="select id,学号,课程编号,成绩 from xuanxiu where id='{$Studentider}'";
$result =mysqli_query($conn, $sql);
// 输出数据
if (mysqli_num_rows($result) > 0 ) {
  // 将查询的结果转换为下列数组
  $row = mysqli_fetch_assoc($result);
  }else{
      echo "没有数据";
  }
// 关闭数据库
     $sql1= "SELECT DISTINCT 课程编号 FROM kecheng";
$result1 = mysqli_query($conn, $sql1);
mysqli_close($conn);
}
 ?>
<!-- 左部开始 -->
  <div class="sidebar sidebar_left">
 	<?php include("leftmenu.php"); ?>
  </div>
 			<div class="content">
				<p class="sui-text-xxlarge sui_ck">成绩修改</p>
				<form class="sui-form form-horizontal sui-validate"action="chengji-save.php" method="post">
					 <div class="control-group">
    						<label for="xHao" class="control-label">学号:</label>
    						<div class="controls">
                                        <!-- 增加一个隐藏的input用来区分是新增的 -->
                                        <input type="hidden" name="Studentider" value="studenTName">
                                    <!-- 增加一个隐藏的input，保存id -->
                                        <input type="hidden" name="kgrAde" value="<?php echo $row['id']; ?>">
      						<input type="text" id="xHao"name="xHao"; 
                                 class="input-large input-fat" placeholder="输入学号名称" 
                                  data-rules="required|minlength=2|maxlength=10" value="<?php echo $row['学号']; ?>">
   				 		</div>
  					</div>
  					  <div class="control-group">
                                 <label for="xuanNumber" class="control-label">课程编号：</label>
                          <div class="controls">
                              <!--  <input type="text" id="bjNumber" name="bjNumber" class="input-large input-fat"   placeholder="输入班号" data-rules="required"> -->
                          <select id="xuanNumber" name="xuanNumber">
                                          <?php
                                          if( mysqli_num_rows($result1) > 0 ){
                                            while ( $row3 = mysqli_fetch_assoc($result1) ) {
                                              echo "<option value='{$row3['课程编号']}'>{$row3['课程编号']}</option>";
                                            }
                                          }else{
                                            echo "<option value=''>请先添加班级信息</option>";
                                          }
                                           ?>       
                           </select>
                            </div>
                      </div>
  					<div class="control-group">
    						<label for="chengjiName" class="control-label">成绩:</label>
    						<div class="controls">
      						<input type="text" id="chengjiName" name="chengjiName"
                    					class="input-large input-fat"data-rules="required|minlength=2|maxlength=10"
                    					placeholder="输入成绩"value="<?php echo $row['成绩']; ?>" >
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
<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php 
$Studentider=empty($_GET["Studentider"])?"att":$_GET["Studentider"];
if ($Studentider=="att") {
 die("请选择要修改的记录");
}else{
 include("conn.php");
//执行SQL语句
$sql="select id,学号,班号,照片,姓名,性别,出生日期,电话 from student where id='{$Studentider}'";
$result =mysqli_query($conn, $sql);
// 输出数据
if (mysqli_num_rows($result) > 0 ) {
  // 将查询的结果转换为下列数组
  $row = mysqli_fetch_assoc($result);
  }else{
      echo "没有数据";
 

  }
       $sql1= "SELECT DISTINCT 班号 FROM banji";
$result1 = mysqli_query($conn, $sql1);
// 关闭数据库
mysqli_close($conn);
}
 ?>
<!-- 左部开始 -->
  <div class="sidebar sidebar_left">
 	<?php include("leftmenu.php"); ?>
  </div>
 			<div class="content">
				<p class="sui-text-xxlarge sui_ck">学生修改</p>
				<form class="sui-form form-horizontal sui-validate"action="student-save.php"
         method="post">
					 <div class="control-group">
    						<label for="sNumber" class="control-label">学号:</label>
    						<div class="controls">
                                        <!-- 增加一个隐藏的input用来区分是新增的 -->
                                        <input type="hidden" name="Studentider" value="studenTName">
                                    <!-- 增加一个隐藏的input，保存id -->
                                        <input type="hidden" name="banid" value="<?php echo $row['id']; ?>">
      						<input type="text" id="sNumber"name="sNumber"; 
                                 class="input-large input-fat" placeholder="输入学号名称" 
                                  data-rules="required|minlength=2|maxlength=10" value="<?php echo $row['学号']; ?>">
   				 		</div>
  					</div>
  					  <div class="control-group">
                                 <label for="bjNumber" class="control-label">班号：</label>
                          <div class="controls">
                              <!--  <input type="text" id="bjNumber" name="bjNumber" class="input-large input-fat"   placeholder="输入班号" data-rules="required"> -->
                          <select id="bjNumber" name="bjNumber">
                                          <?php
                                          if( mysqli_num_rows($result1) > 0 ){
                                            while ( $row2 = mysqli_fetch_assoc($result1) ) {
                                              echo "<option value='{$row2['班号']}'>{$row2['班号']}</option>";
                                            }
                                          }else{
                                            echo "<option value=''>请先添加班级信息</option>";
                                          }
                                           ?>       
                           </select>
                            </div>
                      </div>
  					<div class="control-group">
    						<label for="sName" class="control-label">姓名:</label>
    						<div class="controls">
      						<input type="text" id="sName" name="sName"
                    					class="input-large input-fat"data-rules="required|minlength=2|maxlength=10"
                    					placeholder="输入教室名称"value="<?php echo $row['姓名']; ?>" >
   				 		</div>
  					</div>
                                <div class="control-group">
                                <label for="file" class="control-label">照片:</label>
                                <div class="controls">
                                  <img width="80" height="150" name="file"src="<?php echo $row['照片']; ?>">
                               </div>
                                </div>
					 <div class="control-group">
                                        <label for="sSex" class="control-label">性别:</label>
                                        <div class="controls">
                                          <label class="radio-pretty inline <?php if($row['性别']==1) { echo 'checked';} ?>">
                                          <input type="radio" id="sSex" value="1"  name="sSex" >
                                          <span>男</span>
                                        </label>
                                          <label class="radio-pretty inline <?php if($row['性别']==0) { echo 'checked';} ?>">
                                          <input type="radio" id="sSex " value="0" name="sSex" >
                                          <span>女</span>
                                        </label>
                                        </div>
                                </div>
  					<div class="control-group">
    						<label for="sBrithday" class="control-label">出生日期:</label>
    						<div class="controls">
      						<input type="text" id="sBrithday" name="sBrithday"
                    					class="input-large input-fat" data-rules="required|minlength=2|maxlength=10"
                    					placeholder="输入出生日期"value="<?php echo $row['出生日期']; ?>" >
   				 		</div>
  					</div>
                                <div class="control-group">
                                      <label for="sPhone" class="control-label">电话:</label>
                                      <div class="controls">
                                       <input type="text" id="sPhone" name="sPhone"
                                        class="input-large input-fat" data-rules="required|minlength=2|maxlength=12"
                                        placeholder="输入电话号码"value="<?php echo $row['电话']; ?>" >
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
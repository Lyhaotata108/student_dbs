<?php include("head.php"); 
include "conn.php";
$sql = "SELECT DISTINCT 课程编号 FROM kecheng";
$result = mysqli_query($conn, $sql);
?>
    <div class="sui-layout">
      <div class="sidebar">
      <!--左菜单-->
      <?php include("leftmenu.php"); ?>
      </div>
      <div class="content">
      <p class="sui-text-xxlarge my-padd">成绩查询</p>
      <form id="form1" action="gradeChengji.php" method="post" class="sui-form form-horizontal sui-validate">
        <div class="control-group">
          <label for="sNumber" class="control-label">姓名:</label>
          <div class="controls">
          	<input type="hidden" name="StudentchaName" value="SchaName">
            <input type="text" id="Xname" name="Xname" class="input-large input-fat" placeholder="输入姓名" >
          </div>
        </div>  
        <div class="control-group">
          <label for="sPhone" class="control-label">学号:</label>
          <div class="controls">
            <input type="text" id="student_Number" name="student_Number" class="input-large input-fat"   placeholder="输入学号" >
          </div>
        </div>
          <div class="control-group">
          <label for="xuanNumber" class="control-label">课程编号:</label>
          <div class="controls">
           <!--  <input type="text" id="bjNumber" name="bjNumber" class="input-large input-fat"   placeholder="输入班号" data-rules="required"> -->
           <select id="xuanNumber" name="xuanNumber">
                        <?php
                        if( mysqli_num_rows($result) > 0 ){
                          while ( $row= mysqli_fetch_assoc($result) ) {
                            echo "<option value='{$row['课程编号']}'>{$row['课程编号']}</option>";
                          }
                        }else{
                          echo "<option value=''>请先添加课程信息</option>";
                        }
                     ?>       
           </select>
          </div>
        </div>       
        <div class="control-group">
          <label class="control-label"></label>
          <div class="controls">
            <input type="submit" value="查询" name="" class="sui-btn btn-large btn-primary">
          </div>
        </div>    
      </form>
      </div>
    </div>    
<?php include("foot.php"); ?>
  
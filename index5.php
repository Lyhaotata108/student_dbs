<?php include("head.php"); 
include "conn.php";
$sql = "SELECT DISTINCT 班号 FROM banji";
$result = mysqli_query($conn, $sql);
?>
    <div class="sui-layout">
      <div class="sidebar">
      <!--左菜单-->
      <?php include("leftmenu.php"); ?>
      </div>
      <div class="content">
      <p class="sui-text-xxlarge my-padd">学生信息查询</p>
      <form id="form1" action="student-list.php" method="post" class="sui-form form-horizontal sui-validate">
        <div class="control-group">
          <label for="sNumber" class="control-label">姓名:</label>
          <div class="controls">
          	<input type="hidden" name="StudentchaName" value="SchaName">
            <input type="text" id="sNumber" name="sNumber" class="input-large input-fat" placeholder="输入姓名" >
          </div>
        </div>  
        <div class="control-group">
          <label for="sPhone" class="control-label">学号:</label>
          <div class="controls">
            <input type="text" id="sPhone" name="sPhone" class="input-large input-fat"   placeholder="输入学号" >
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

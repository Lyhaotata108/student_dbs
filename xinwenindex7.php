<!-- 头部开始 -->
<?php include("head.php"); ?>
<!-- 左部菜单 -->
<div class="sidebar sidebar_left">
<?php include("leftmenu.php"); ?>
<?php
include("conn.php");
$sql = "select * from  new_column";
$result = mysqli_query($conn, $sql);// 关闭数据库
// mysqli_close($conn);
?>
  </div>
      <div class="content">
        <p class="sui-text-xxlarge sui_ck">新闻信息录入</p> 
        <form class="sui-form form-horizontal  "method="post" action="xinwen-save.php"enctype="multipart/form-data">
           <div class="control-group">
                <label for="inputEmail" class="control-label" >标题:</label>
                <div class="controls"> 
                  <input type="text" id="headBiao" name="headBiao"
            class="input-large input-fat" placeholder="输入课程名称" 
            data-rules="required|minlength=2|maxlength=10">
              </div>
            </div>
            <div class="control-group">
                <label for="inputEmail" class="control-label">肩题:</label>
                <div class="controls">
                  <input type="text" id="jianTi" name="jianTi"
            class="input-large" placeholder="输入肩题名称"
             data-rules="required|minlength=2|maxlength=10">
              </div>
            </div>
      <div class="control-group">
                <label for="zuoZhe" class="control-label">作者</label>
                <div class="controls">
                  <input type="hidden" name="usid" value="<?php echo $_SESSION['usid']; ?>">
                  <input type="text" id="zuozhe" readonly="readonly"
                    class="input-large input-fat" 
                   value="<?php echo $_SESSION["usname"]; ?>">
                </div>
      </div>
            <div class="control-group">
                <label for="inputEmail" class="control-label">栏目:</label>
                      <select id="xuanNumber" name="Lanmu" id="Lanmu">
                              <?php
                              if( mysqli_num_rows($result) > 0 ){
                                while ( $row= mysqli_fetch_assoc($result) ){
                                  echo "<option value='{$row['id']}'>{$row['name']}</option>";
                                }
                              }else{
                                echo "<option >请先添加课程信息</option>";
                              }
                           ?>       
                   </select>
            </div>
             <div class="control-group">
                <label for="inputEmail" class="control-label">时间:</label>
                <div class="controls">
                   <input type="text" id="Time" name="Time" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入出生日期">
              </div>
            </div>
            <div class="control-group">
                <label for="inputEmail" class="control-label">图片:</label>
                 <div class="controls">
                        <input type="file" id="sName" name="file"/>
                </div>
            </div>
             <div class="control-group">
                <label for="inputEmail" class="control-label">内容:</label>
               <textarea id="content" name="content">请输入内容</textarea>
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
<?php include("foot.php"); ?>
<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
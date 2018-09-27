<!-- 头部开始 -->
<?php include("head.php"); ?>
<!-- 左部菜单 -->
  <div class="sidebar sidebar_left">
  <?php include("leftmenu.php"); ?>
<?php
include("conn.php");
    // 找到所有的栏目
 $xinid =empty($_GET["xinid"])?"att":$_GET["xinid"];
    $sql = "select *from  new_column";
    $result = mysqli_query($conn, $sql);
    // 找到id为xinid的news的数据
    $sql3="select * from news where  id={$xinid}";
    $result3 = mysqli_query($conn,$sql3);
    if (mysqli_num_rows($result3)>0) {
      $rot = mysqli_fetch_assoc($result3);
    }else{
      echo "没有数据";
    }
 // echo "没有数据";
 // // 关闭数据库
    mysqli_close($conn);  
?>
  </div>
      <div class="content">
        <p class="sui-text-xxlarge sui_ck">新闻修改</p> 
         <img id="tupian"src="<?php echo $rot['图片']; ?>">
        <form class="sui-form form-horizontal  "method="post" action="xinwen-save.php"enctype="multipart/form-data">
           <div class="control-group">
                <label for="inputEmail" class="control-label" >标题:</label>
                <div class="controls"> 
                  <input type="text" id="headBiao" name="headBiao"
            class="input-large input-fat" placeholder="输入课程名称" 
            data-rules="required|minlength=2|maxlength=10"value="<?php echo $rot['标题']; ?>">
            <input type="hidden" value="genggai" name="action">
            <input type="hidden" value="<?php echo $rot['id']; ?>" name="xinid">
              </div>
            </div>
            <div class="control-group">
                <label for="inputEmail" class="control-label">肩题:</label>
                <div class="controls">
                  <input type="text" id="jianTi" name="jianTi"
            class="input-large" placeholder="输入肩题名称"
             data-rules="required|minlength=2|maxlength=10"    value="<?php echo $rot['肩题']; ?>">
              </div>
            </div>
        <div class="control-group">
          <label for="zuozhe" class="control-label">作者:</label>
          <div class="controls">
            <input type="text" id="zuozhe" class="input-large input-fat"  value="<?php echo $_SESSION['usname'] ?>" disabled='disabled'>
            <input type="hidden" name="zuozhe" value="<?php echo $_SESSION["usid"]; ?>">
          </div>
        </div>
            <div class="control-group">
                <label for="inputEmail" class="control-label">栏目:</label>
              <select id="xuanNumber" name="Lanmu">
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
<style type="text/css" media="screen">
             #tupian{
              width:100px;
              height:150px;
              float:right;
              margin-right:20%;
              display:block;
             }
</style>
<?php include("foot.php"); ?>
<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>

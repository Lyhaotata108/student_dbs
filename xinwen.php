
<?php include("head.php"); ?>
  <div class="sidebar sidebar_left">
            <?php include("leftmenu.php"); ?>
    </div>
      <div class="content">
                <?php
                  echo "注册或登录系统";
                ?>
      </div>
      
    </div>
    <?php include("foot.php"); ?>
  <script type="text/javascript">
  // 第一种方法
document.cookie="uname=jixiang; expires=Thu,22 Aug 2018 00:00:00 GMT";
// 第二种方法
var days=30;
var daysTime=30*24*60*60*1000; //转换为毫秒
var exp =new Date();
exp.setTime(exp.getTime()+daysTime); //设置为30天后
document.cookie="uname=jixiang; expires="+exp.toGMTString();
var paw="123456789";
document.cookie="paw="+paw;
  </script>



<?php
//创建连接
$conn=mysqli_connect("localhost","root","");
// 第一个参数是
// if($conn){
// echo "连接成功";
// }else{
// die( "连接失败！".mysqli_connect_error());
// }
// 选择要操作的数据库
mysqli_select_db($conn,"student_dbs");
//设置读取数据库的编码，不然显示汉字为乱码
mysqli_query($conn,"set names utf8");
// 读取id
// $xinid = $_SEESION["usname"];
// echo $xinid;
?>

<?php include("head.php"); ?>
    <div class="sidebar sidebar_left">
            <?php include("leftmenu.php"); ?>
    </div>
            <div class="content">
                    <div id="ul_xinwen"></div>
            </div>
    </div>
<?php include("foot.php"); ?>
<script type="text/javascript">
  // 第一种方法
// document.cookie="uname=jixiang; expires=Thu,22 Aug 2018 00:00:00 GMT";
// 第二种方法
// var days=30;
// var daysTime=30*24*60*60*1000; //转换为毫秒
// var exp =new Date();
// exp.setTime(exp.getTime()+daysTime); //设置为30天后
// document.cookie="uname=jixiang; expires="+exp.toGMTString();
// var paw="123456789";
// document.cookie="paw="+paw;
// 
// 
$(function(){
      $.ajax({
        url:"api.php",
        type:"POST",
        dataType:"json",
        data:{
          "action":"news",
        },
         // beforeSend:function(XMLHttpRequest){
                      
         //          // $("#studentlist").html("<tr><td>正在查询,请稍后.....</td></tr>")
         //    },  
        success:function(data,textStatus){
            console.log( data.data);
            if (data.code == 200){
              // $("#studentlist").empty();
              var str = "";   
                for(var i=0;i<data.data.length;i++){
                  console.log(data.data[i]);
                      str+=("<li><a href='beiwang.php?cha="+data.data[i].id+"'><h3 class='biaoti'>"+data.data[i].标题+"</h3><img class='imgs' src='"+data.data[i].图片+"'/><h6>"+data.data[i].发布时间+"|"+data.data[i].columnid+"</h6><span class='neirong'>"+data.data[i].内容+"</span></a></li>");
                }
                $("#ul_xinwen").html(str);
              }
          },
             error:function(XMLHttpRequest,textStatus,errorThrown){
                          // 请求失败后调用次函数
                          console.log("失败原因"+errorThrown);
            },
      });
  });
  </script>
  <script type="text/javascript">
window.onload=function(){
//1.获取a节点,并为其添加onclick响应函数
document.getElementsByTagName("li")[0].onclick=function(){
//3.创建一个XMLHttpRequest对象
var request=new XMLHttpRequest();
//4.准备发送请求的数据:url和发送请求的方法
var url="api.php";
var cha="GET";
//5.调用XMLHttpRequest对象的open方法(打开链接)
request.open(cha, url);
//6.调用XMLHttpRequest对象的send方法(发送数据)
request.send(null); //get请求的数据会紧跟在URL后面
//7.为XMLHttpRequest对象添加onreadystatechange响应函数
request.onreadystatechange=function(){
//8.判断响应是否完成:XMLHttpRequest对象的readyState属性值为4的时候
if(request.readyState==1){
//9.再判断响应是否可用:XMLHttpRequest对象status属性值为200或304的时候
if(request.status==1||request.status==2){
//10.打印响应结果:responseText
alert(request.responseText);
}
  }
}
//2.取消a节点默认行为
return false;
}
}
</script>
  <style type="text/css" media="screen">
  .content{
    margin:0 auto;
    width:750px;
    height:400px;
    text-align:center;
    border-radius:10px;
    /*font-size:25px;*/
    line-height:100px;
    /*background-color:#e0c9c9;*/
  }
    #ul_xinwen{
      list-style:none;
      width:100%;
      height:100%;
      /*background-color:red;*/
    }
    #ul_xinwen li{
      float:left;
      margin:5px auto;
      width:240px;
      height:400px;
      background-color:#838282;
      margin-left:10px;
      list-style:none;
      overflow:hidden;
      display:block;
    }
    #ul_xinwen li .biaoti{
      color:#211919;
      height:40px;
      line-height:40px;
      font-size:18px;
    }
    #ul_xinwen li .imgs{
     width:240px;
     height:230px;
    }
    #ul_xinwen li h6{
     text-align:right;
      display:block;
      width:240px;
      height:20px;
     font-size:14px;
    }
    #ul_xinwen li .neirong{
      display:block;
     font-size:12px;
    }
</style>



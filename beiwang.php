<?php 
// 连接数据库
$conn = mysqli_connect("localhost","root","");
// 判断是否连接成功
// if ($conn) {
// 	// echo "<p class='pp'>连接成功</p>";

// }else{
// 	// die ("<p class='pp'>连接失败!</p>".mysqli_connect_error());
// }
// 选择要操作的数据库
mysqli_select_db($conn,"student_dbs");
// 设置读取数据库的编码，不然显示汉字会乱码
mysqli_query($conn,"set names utf8");
// 执行sql语句
   // $cha = empty($_REQUEST['cha']) ? "null":$_REQUEST['cha'];
   // echo $cha;
 // $sql="select * from news where id = '{$cha}'";
 // echo $sql;
 ?>
<!DOCTYPE html>
<html>
 
	<head>
		<meta charset="UTF-8">
		<title>ajax请求数据并渲染到页面</title>
		<style type="text/css">
			#test{
				width: 100%;
				padding: 10px;
				height: 1000px;
				border: 1px solid gainsboro;
				border-radius: 8px;
				background-color:#fbf5f6;
			}
			#test li {
				display:block;
				margin:100px auto;
				width:450px;
				height:800px;
				float:left;
				list-style:none;
				/*padding: 20px;*/
				border: 1px solid gainsboro;
				text-align: center;
				margin-left: 20px;
				margin-bottom: 20px;
				border-radius: 8px;
			}
			#test li a{
				text-decoration:none;  
			}
			li h3:hover{
				color:red;
			}
			#test li h6{
				/*width: 240px;
				height:40px;*/
				/*line-height:40px;*/
				text-align:right;
				font:bold 16px/1.5em "Microsoft YaHei";
			}
			
			#test img{
				width: 250px;
				height: 340px;
				
			}
			#test span{
				font:bold 15px/1.5em "Microsoft YaHei";

			}
			#test img:hover{
			            opacity: 1;
			            box-shadow: 10px 10px 5px #333;
			            transform:rotate(30deg);
			          /*  margin-top: 200px;*/
			        }
		</style>
	</head>
 
	<body>
		<div id="test"></div>
	</body>
 
</html>
<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script type="text/javascript">
	$(function() {
		$.ajax({
			type: "GET",
			url: "api.php",
			dataType: "json",
			 data:{
          				"action":"news",
        			},
        	 beforeSend:function(XMLHttpRequest){
                      $("#test").empty();
            },
	success:function(data,textStatus){
		            console.log( data.data);
		            if (data.code == 200){
		              var str = "";     
		                for(var i=0;i<data.data.length;i++){
		                  console.log(data.data[i]);
	                      str+=("<li><a href='beiwang.php?cha="+data.data[i].id+"'><h3 class='biaoti'>"+data.data[i].标题+"</h3><img class='imgs' src='"+data.data[i].图片+"'/><h6>"+data.data[i].发布时间+"|"+data.data[i].columnid+"</h6><span class='neirong'>"+data.data[i].内容+"</span></a></li>");
			                }
			                $("#test").html(str);
			                // console.log(Request);
			                // if (Request>=$("#test")) {
			                // 	 $sql="select * from news where id = '{$cha}'";
			                // }else{
			                // console.log("错");
			                // }
			              }
          			},
		});
	});
</script>
<script type="text/javascript">
// function UrlSearch() {
//    var str=location.href; //取得整个地址栏
//    var cha=str.indexOf("?") 
//    str=str.substr(cha+1); //取得所有参数   stringvar.substr(start [, length ]

//    var arr=str.split("&"); //各个参数放到数组里
//    for(var i=0;i < arr.length;i++){ 
//     cha=arr[i].indexOf("="); 
//     if(cha>0){ 
//      cha=arr[i].substring(0,cha);
//      value=arr[i].substr(cha+1);
//      this[cha]=value;
//      } 
//     } 
// } 
// var Request=new UrlSearch(); //实例化、
</script>

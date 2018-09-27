<div class="nume_Button">
	<div id="nav">
		<button disabled>上一页</button>
		<button class="on">1</button>
		<button>2</button>
		<button>3</button>
		<button>4</button>
		<button>5</button>
		<span>...</span>
		<button>下一页</button>
		<input type="text" placeholder="page" id="inp">
		<button>调转</button>
	</div>
</div>
</div>

</body>
</html>
<script type="text/javascript" src='http://g.alicdn.com/sj/lib/jquery.min.js '></script>
<script type="text/javascript" src='http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js '></script>

<script>

//使用jquery实现tab切换效果
$(function(){
	$(".box .level1 > a").on("click", function(){
		//console.log("ok");
		//给当前元素添加"current"样式
		$(this).addClass("current") 
		//下一个元素显示
		.next().show()
		//父元素的兄弟元素的子元素<a>
		.parent().siblings().children("a").
		//移除上面找到的所有<a>的current 样式
		removeClass("current")
		//上面所有<a>的下一个元素隐藏
		.next().hide();
		//找到a的父元素<li>,获取其在兄弟元素中的序号，保存到cookie中。跳转到其他页面后，再读取这个cookie，就知道是哪个<li>下面的菜单处于打开状态。
		document.cookie = "menuState="+ $(this).parent().index();

		return false;
	})
	//账号显示在右上角
	$(".userinfo>span").html(getCookie("usname"));
});
//读取菜单状态cookie
//用正则表达式
var menuState = getCookie("menuState");
$(".box .menu>li").eq(menuState).find("ul").show();
function getCookie(name)
{
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg)){
	return unescape(arr[2]);
	}else{
	return null;}
}

</script>
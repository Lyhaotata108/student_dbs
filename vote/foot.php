</div>
</div>

</body>
</html>
<script type="text/javascript" src="js/jquery.min.js"></script>

<script>

//Ê¹ÓÃjqueryÊµÏÖtabÇÐ»»Ð§¹û
$(function(){
	$(".box .level1 > a").on("click", function(){
		//console.log("ok");
		//¸øµ±Ç°ÔªËØÌí¼Ó"current"ÑùÊ½
		$(this).addClass("current") 
		//ÏÂÒ»¸öÔªËØÏÔÊ¾
		.next().show()
		//¸¸ÔªËØµÄÐÖµÜÔªËØµÄ×ÓÔªËØ<a>
		.parent().siblings().children("a").
		//ÒÆ³ýÉÏÃæÕÒµ½µÄËùÓÐ<a>µÄcurrent ÑùÊ½
		removeClass("current")
		//ÉÏÃæËùÓÐ<a>µÄÏÂÒ»¸öÔªËØÒþ²Ø
		.next().hide();
		//ÕÒµ½aµÄ¸¸ÔªËØ<li>,»ñÈ¡ÆäÔÚÐÖµÜÔªËØÖÐµÄÐòºÅ£¬±£´æµ½cookieÖÐ¡£Ìø×ªµ½ÆäËûÒ³Ãæºó£¬ÔÙ¶ÁÈ¡Õâ¸öcookie£¬¾ÍÖªµÀÊÇÄÄ¸ö<li>ÏÂÃæµÄ²Ëµ¥´¦ÓÚ´ò¿ª×´Ì¬¡£
		document.cookie = "menuState="+ $(this).parent().index();

		return false;
	})
	//ÕËºÅÏÔÊ¾ÔÚÓÒÉÏ½Ç
	$(".userinfo>span").html(getCookie("usname"));
});
//¶ÁÈ¡²Ëµ¥×´Ì¬cookie
//ÓÃÕýÔò±í´ïÊ½
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
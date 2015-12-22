
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我要吐槽</title>

<style type="text/css">
*
{
    margin: 0;
    padding: 0;
}

body
{
    font-family: verdana,arial,sans-serif;
}

div#container
{
    width: 650px;
    margin: 10px auto;

    border: none 1px;
}
table#tucao-table
{
    width: 600px;
    margin: 20px 20px;
}
textarea#tucao-text
{
    width: 600px;
    max-width: 600px;
    height: 196px;
    max-height: 196px;

    font-size: 16px;
    line-height: 24px;

    border: solid 1px #ccc;
    background-color: white;
}

span#left-words
{
    font-family: Constantia, Georgia;
    font-size: 25px;
    font-weight: 600;
    font-style: italic;
}

a#tucao-a
{
    display: block;

    width: 80px;
    height: 50px;

    line-height: 50px;

    text-align: center;
    text-decoration: none;

    color: white; 
    border: solid 1px;
    border-radius: 10px;
    background-color: #ff8140;
}

a#verify-content
{
    text-decoration: none;
}

a#tucao-a:hover
{
    background-color: #09f;
}

div.box
{
    width: 600px;
    margin: 20px 20px;
    padding: 4px 4px;

    line-height: 24px;

    border: solid 1px #ccc;
    border-radius: 10px;
    box-shadow: 3px 3px 3px 2px #ccc;
}

div.box:hover
{
    background-color: #c2d4f5;
}

		/*水平阴影距离（必须），垂直阴影距离（必须）
		阴影模糊程度，阴影的距离*/
</style>

</head>

<body>
<!-- 试一试能不能像新浪微博那样渐次加载数据 -->
<!-- 或者，用户完成输入之后，我们直接把数据放到用户页面上！ -->
<!-- 然后，在后台悄悄地把用户的数据，插入数据库！说白了，就是先显示，后插入！ -->

<div id="container">

<table border='0' id='tucao-table'>
<tr>
	<td>
		<form id='tucao-form' action="tucao-more1.php" method='post'>
			<textarea name="tucaotext" id="tucao-text" onkeyup='checkwords(this.id)' onfocus="this.value=(this.value=='亲爱的用户，写点什么吧，然后点击提交，会在下面看到你的评论哦')?'':this.value" value="亲爱的用户，写点什么吧，然后点击提交，会在下面看到你的评论哦" onblur="this.value=(this.value=='')?'亲爱的用户，写点什么吧，然后点击提交，会在下面看到你的评论哦':this.value"></textarea>
			<br/>
			昵称：
			<input name='username' id='user-name' type="text" style='width:96px;line-height:20px;'/>
			&nbsp;            
			验证码：
			<input id='verify-input' type="text" style='width:48px;line-height:20px;'/>
			<a id='verify-content' href="javascript:void(0)" title='给我换一个!!!' onclick='changeVerifyCode()'>jqw5</a>					
			&nbsp;
			还可输入
			<span id='left-words'>268</span>字！&nbsp;&nbsp;
			<a href="javascript:void(0)" id="tucao-a" style='float:right;' onclick='toSubmit()'>提交</a>
		</form>
	</td>
</tr>
</table>

<script type="text/javascript">
//验证用户输入
function checkwords(link) {
    var tucaotextarea = document.getElementById(link);
    var inputnum = tucaotextarea.value.length;
    var spanleftwords = document.getElementById('left-words');
    if ((268 - inputnum) >= 0) {
        spanleftwords.innerHTML = (268 - inputnum);
    } else {
        //一旦用户输入超标，就用后面那个值（就是最大数，268）来替换前面的
        tucaotextarea.value = tucaotextarea.value.substring(0, 268);
    }
}

// 当页面加载完毕后，改变验证码！
// 免得每次验证码总是一样的，就是我的那个原始值，那样不好
document.onreadystatechange = changeCode;

function changeCode() {
    if (document.readyState == 'complete') {
        changeVerifyCode();
    }
}

// 设置验证码
function changeVerifyCode() {
    // 将大写、小写、数字混合到一起，总共4个
    //我的验证码区分大小写哦！
    var code = '';
    // 一个数组31项，数组62个！  
    var array_num = new Array(0, 1, 2, 3, 4, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

    for (var i = 0; i <= 3; i++) {
        var index = Math.floor(Math.random() * 62); //返回0~62之间的任意一个整数
        code += array_num[index]; //每循环一次，就产生一个新字符串！
    };

    document.getElementById('verify-content').innerHTML = code;
}

function toSubmit() {
    var tucaotextarea11 = document.getElementById('tucao-text');
    var form1 = document.getElementById('tucao-form');
    var tucaoer = document.getElementById('user-name');

    var inputvalue = document.getElementById('verify-input').value;

    var currentvalue = document.getElementById('verify-content').innerHTML;

    if ((!tucaotextarea11.value) || (!tucaoer.value) || (!inputvalue)) {
        alert('亲爱的用户，吐槽内容、用户昵称和验证码三样都不能为空哦~~~');
    } else if (inputvalue != currentvalue.trim()) {
        alert('亲爱的用户，验证码不对哦~~~');
    } else {
        form1.submit();
    }
}

</script>


<div class="box" >
<a href="" name = 'hotcomment'>我在用github管理网页哦，挺有意思的</a>
</div>



<?php 
$conn=new mysqli('localhost','a1108095632','63c2622d','a1108095632');
mysqli_query($conn,"SET NAMES UTF8");
date_default_timezone_set('PRC');  //空间系统时间老是不对！一定得用这个函数！

if(!$conn){echo '亲爱的用户，暂时连接不上数据库哦'; exit;}

$usercontent =$_POST['tucaotext'];
$username1   =$_POST['username'];
$userip      =get_client_ip();
$date        =date('Y-m-d H:i:s');


// 如果用户有提交查询，就把插入和查询一起执行
if($usercontent&&$username1&&$userip&&$date){

$query="insert into tucao values
			(NULL,'".$username1."','".$userip."','".$usercontent."','".$date."')";
		// (NULL,".$username.",".$userip.",".$usercontent.",".$date.")";

if($_POST){
	$result=mysqli_query($conn,$query);
	}else{
		exit;
	}

if(!$result){echo '对不起，亲爱的用户，吐槽无法插入数据库';   exit;}

$query  ="select * from tucao	order by tucaoerdate desc";
$result =$conn->query($query);
if(!$result){echo '对不起，亲爱的用户，无法提取评论信息！';   exit;}

while($row=$result->fetch_array()){
?>
	<div class="box" >
		<p>用户昵称：<b><?php echo $row['tucaoername']; ?></b></p> 
		<p>用户IP：<b><?php echo $row['tucaoerip']; ?>	</b></p>
		<p>吐槽时间：<b><?php echo $row['tucaoerdate']; ?></b></p>
		<p>吐槽内容：<span class='user_comment'><?php echo $row['tucaoercontent']; ?></span></p>
		
	</div>
<?php
}

mysqli_free_result($result);  //释放结果集


}else{
// 如果只是刚刚打开页面，用户还未插入数据，那么，直接打开页面，从数据库提取数据！
$query="select * from tucao			
		order by tucaoerdate desc";
$result=$conn->query($query);
if(!$result){echo '对不起，亲爱的用户，无法提取评论信息！';   exit;}

while($row=$result->fetch_array()){
?>
	<div class="box" >
		<p>用户昵称：<b><?php echo $row['tucaoername']; ?></b></p> 
		<p>用户IP：<?php echo $row['tucaoerip']; ?>	</p>
		<p>吐槽时间：<?php echo $row['tucaoerdate']; ?></p>
		<p>吐槽内容：<span class='user_comment'><?php echo $row['tucaoercontent']; ?></span></p>
		
	</div>
<?php
}

mysqli_free_result($result);  //释放结果集
}







function get_client_ip() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
				$ip = getenv("REMOTE_ADDR");
			else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
					$ip = $_SERVER['REMOTE_ADDR'];
				else
					$ip = "unknown";
	return ($ip);
}


 ?>






</div>
</body>
</html>
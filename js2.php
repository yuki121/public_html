<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<meta name = "robots" content = "noindex, nofollow, noarchive" />
<title>test</title>

<script type="text/javascript">
function check(){

	var flag = 0;

	if(document.form1.field1.value == ""){ // 「お名前」の入力をチェック
		flag = 1;
	}

	else if(document.form1.field2.value == ""){ // 「パスワード」の入力をチェック
		flag = 1;
	}

	else if(document.form1.field3.value == ""){ // 「コメント」の入力をチェック
		flag = 1;
	}

	if(flag){
		window.alert('必須項目に未入力がありました'); // 入力漏れがあれば警告ダイアログを表示
		return false; // 送信を中止
	}

	else{
		return true; // 送信を実行
	}

}
</script>

</head>
<body>

<p id = "myid">こんにちは！</p>

<div style = clear:both;>
<input type = "button" id = "b1" value = "Click" onclick = "myfunc()" />
</div>



<div class = "float">
<input type = "text" id = "t1" name = "t1" maxlength = "10" placeholder = "入力1" value = "" />
</div>

<div class = "float">
<input type = "button" id = "b2" value = "Click1" onclick = "myfunc2()" />
</div>

<div class = "float">
<input type = "text" id = "t2" name = "t2" maxlength = "10" placeholder = "入力2" value = "" />
</div>

<div class = "float">
<input type = "button" id = "b3" value = "Click2" onclick = "myfunc3()" />
</div>

<div class = "float">
<input type = "text" id = "t3" name = "t3" maxlength = "10" placeholder = "入力3" value = "" />
</div>

<div style = clear:both;>
<input type = "text" id = "t4" name = "t4" maxlength = "10" placeholder = "入力4" value = "" />
</div>

<div style = clear:both;>
<input type = "button" id = "b4" value = "Click4" onclick = "myfunc4()" />
</div>

<script>
var myfunc = function(){
	var myp = document.getElementById("myid");
	myp.innerHTML = "こんばんは！";
}

var myfunc2 = function(){
	document.getElementById("t2").value=document.getElementById("t1").value;
}

var myfunc3 = function(){
	document.getElementById("t3").value=document.getElementById("t2").value;
	var myp3 = document.getElementById("t3");
	myp3.style = "color:red;font-size:48px;";
}

var myfunc4 = function(){
	document.getElementById("name").value=document.getElementById("t4").value;
	document.getElementById("pass").value=document.getElementById("t4").value;
	document.getElementById("comment").value=document.getElementById("t4").value;
}
</script>

<?php
if(isset($_POST['field1'])){
	echo htmlspecialchars($_POST['field1'], ENT_QUOTES)."<br />";
	echo htmlspecialchars($_POST['field2'], ENT_QUOTES)."<br />";
	echo htmlspecialchars($_POST['field3'], ENT_QUOTES)."<br />";
}
?>

<form method="POST" action="j-2.php" name="form1" onSubmit="return check()">
<p>お名前：<br><input type="text" id = "name" name="field1" size="30"> （必須）</p>
<p>パスワード：<br><input type="password" id = "pass" name="field2" size="30"> （必須）</p>
<p>コメント：<br><textarea id = "comment" name="field3" rows="5" cols="30"></textarea> （必須）</p>
<p><input type="submit" value="送信"></p>
</form>
</body>
</html>
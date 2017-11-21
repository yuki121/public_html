<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<meta name = "robots" content = "noindex, nofollow, noarchive" />
<title>test</title>
</head>
<body>
<script language="javascript">

function push(n){
	document.f.sel.value += n;
}

function clearsel(){
	document.f.sel.value = "";
	document.getElementById("result").innerHTML = "";
}

function calc(){
	res = eval(document.f.sel.value);
	document.getElementById("result").innerHTML = res;
}

</script>

<form name="f">
<input type="button" value="9" onclick="push('9')">
<input type="button" value="3" onclick="push('3')">
<input type="button" value="/" onclick="push('/')">
<input type="button" value="=" onclick="calc()">
<input type="button" value="clear" onclick="clearsel()">
<input type="text" size="8" name="sel">
</form>
<div id="result"></div>
</body>
</html>
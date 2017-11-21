<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
if((strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false)){
	header('Location: mobile.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<meta name = "robots" content = "noindex, nofollow, noarchive" />
<link href = "bbs8_design.css" rel = "stylesheet" />
<title>BBS8</title>
</head>
<body>
<div class = "content">
<h1>BBS8へようこそ</h1>
<br />
<div style = "text-align: center;">
<form action = "manual.html" method = "post">
<input type = "submit" value = "説明と規約" /><br />
</form>
</div>
<br />
<div style = "text-align: center;">
<form action = "login.php" method = "post">
<input type = "submit" value = "規約に同意して利用する" /><br />
</form>
</div>
</div>
</body>
</html>
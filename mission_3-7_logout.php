<?php
session_start();

if(isset($_SESSION['NAME'])){
	$errorMessage = "ログアウトしました。";
}

else{
	$errorMessage = "セッションがタイムアウトしました。";
}

$_SESSION = array();

@session_destroy();
?>
<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<meta name = "robots" content = "noindex, nofollow, noarchive" />
<meta name = "viewport" content = "width=device-width, initial-scale=0.6, minimum-scale=0.6, maximum-scale=0.6, user-scalable=no" />
<link href = "mission_2-15.css" rel = "stylesheet" />
<title>ログアウト</title>
</head>
<body>
<h1>ログアウト</h1>
<div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
<br />
<form action = "mission_3-7_login.php" method = "post">
<input type = "submit" value = "ログインフォームに移動" />
</body>
</html>
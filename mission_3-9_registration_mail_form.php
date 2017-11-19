<?php
session_start();

header("Content-type: text/html; charset=utf-8");

//クロスサイトリクエストフォージェリ（CSRF）対策
$_SESSION['token'] = base64_encode(sha1(date('Y/m/d H:i:s')));
$token = $_SESSION['token'];

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

?>
<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<meta name = "robots" content = "noindex, nofollow, noarchive" />
<meta name = "viewport" content = "width=device-width, initial-scale=0.6, minimum-scale=0.6, maximum-scale=0.6, user-scalable=no" />
<link href = "mission_2-15.css" rel = "stylesheet" />
<title>メール登録画面</title>
</head>
<body>
<h1>メール登録画面</h1>
<form action = "mission_3-9_registration_mail_check.php" method = "post">
<p>メールアドレス<br /><input type = "text" name = "mail" size = "50"></p>
<input type = "hidden" name = "token" value = "<?=$token?>" />
<input type = "submit" value = "登録する" />
</form>
</body>
</html>
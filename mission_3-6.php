<?php
session_start();

$db['host'] = 'localhost';
$db['user'] = 'ユーザー名';
$db['pass'] = 'パスワード';
$db['dbname'] = 'データベース名';

$errorMessage = "";
$signupMessage = "";

if(isset($_POST['signup'])){

	if(empty($_POST['name'])){
		$errorMessage = '名前欄が未入力です。';
	}

	else if(empty($_POST['password'])){
		$errorMessage = 'パスワード欄が未入力です。';
	}

	else if(empty($_POST['password2'])){
		$errorMessage = 'パスワード(確認)欄が未入力です。';
	}

	if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['password2']) && $_POST['password'] === $_POST['password2']){
		$name = $_POST['name'];
		$password = $_POST['password'];
		$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        	try{
			$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			$stmt = $pdo->prepare("insert into userData5798 (name, password) VALUES (?, ?)");
			$stmt->execute(array($name, crypt($password)));
			$id = $pdo->lastinsertid();
			$signupMessage = 'ユーザー登録が完了しました。登録情報は ID:'.$id.' パスワード:'.$password.' になります。';
		}

		catch(PDOException $e){
			$errorMessage = 'データベースエラー';
		}

	}

	else if($_POST['password'] != $_POST['password2']){
		$errorMessage = 'パスワードが一致しません。';
	}

}
$pdo = null;
?>
<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<meta name = "robots" content = "noindex, nofollow, noarchive" />
<link href = "mission_2-15.css" rel = "stylesheet" />
<title>ユーザー登録</title>
</head>
<body>
<h1>ユーザー登録</h1>
<form id = "loginform" name = "loginform" action = "" method = "post">
<fieldset>
<legend>新規登録フォーム</legend>
<div><font color = "#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
<div><font color = "#0000ff"><?php echo htmlspecialchars($signupMessage, ENT_QUOTES); ?></font></div>
<label for = "name">名前</label><br /><input type = "text" id = "name" name = "name" maxlength = "10" placeholder = "名前を入力" value = "<?php if(!empty($_POST['name'])) {echo htmlspecialchars($_POST['name'], ENT_QUOTES);} ?>" />
<br />
<label for = "password">パスワード</label><br /><input type = "password" id = "password" name = "password" maxlength = "20" value = "" placeholder = "パスワードを入力" />
<br />
<label for = "password2">パスワード(確認)</label><br /><input type = "password" id = "password2" name = "password2" maxlength = "20" value = "" placeholder = "再度パスワードを入力" />
<br />
<br />
<input type = "submit" id = "signup" name = "signup" value = "登録" />
<br />
<br />
</fieldset>
</form>
</body>
</html>
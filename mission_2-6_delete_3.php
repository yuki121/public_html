<?php
if(isset($_POST['delete'])){
	$delete = $_POST['delete'];
}
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>パスワードの入力</title>
</head>
<body>
<h1>パスワードを入力してください。</h1>
<form action = "mission_2-6_delete_4.php" method = "post">
パスワード：<br />
<input type = "text" name = "password" size = "30" value = "" /><br />
<input type = "hidden" name = "delete" value = "<?php echo $delete;?>" />
<br />
<input type = "submit" value = "送信" />
</form>
</body>
</html>
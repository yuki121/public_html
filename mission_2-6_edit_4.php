<?php
if(isset($_POST['name'],$_POST['comment'],$_POST['edit'])){
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$edit = $_POST['edit'];
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
<form action = "mission_2-6_edit_5.php" method = "post">
パスワード：<br />
<input type = "text" name = "password" size = "30" value = "" /><br />
<input type = "hidden" name = "name" value = "<?php echo $name;?>" />
<input type = "hidden" name = "comment" value = "<?php echo $comment;?>" />
<input type = "hidden" name = "edit" value = "<?php echo $edit;?>" />
<br />
<input type = "submit" value = "送信" />
</form>
</body>
</html>
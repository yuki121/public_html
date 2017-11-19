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
<title>編集の確認</title>
</head>
<body>
<h1>編集の確認</h1>

<?php
echo "本当に、"."<br />\r\n";
echo "名前：".$name."<br />\r\n";
echo "コメント：".$comment."<br />\r\n";
echo "で編集しますか？"."<br />\r\n";
?>

<form action = "mission_2-6_edit_4.php" method = "post">
<input type = "hidden" name = "name" value = "<?php echo $name;?>" />
<input type = "hidden" name = "comment" value = "<?php echo $comment;?>" />
<input type = "hidden" name = "edit" value = "<?php echo $edit;?>" />
<br />
<input type = "submit" value = "はい" />
</form>

</body>
</html>
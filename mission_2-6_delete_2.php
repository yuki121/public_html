<?php
if(isset($_POST['delete'])){
	$delete = $_POST['delete'];
}
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>削除の確認</title>
</head>
<body>
<h1>削除の確認</h1>

<?php
echo "本当に削除しますか？"."<br />\r\n";
?>

<form action = "mission_2-6_delete_3.php" method = "post">
<input type = "hidden" name = "delete" value = "<?php echo $delete;?>" />
<br />
<input type = "submit" value = "はい" />
</form>
</body>
</html>

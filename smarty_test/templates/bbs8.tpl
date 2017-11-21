<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<meta name = "robots" content = "noindex, nofollow, noarchive" />
<link href = "../bbs8_design.css" rel = "stylesheet" />
<title>BBS8</title>
</head>
<body>
<div class = "content">
<h1>BBS8</h1>
<h2>新規投稿</h2>
<fieldset>
{$message}
<form action = "" method = "post">
名前<br />
<input type = "text" name = "name" size = "20" maxlength = "10" value = "" placeholder = "未入力の場合「名無し」" /><br />
コメント<br />
<textarea name = "comment" cols = "60" rows = "4" maxlength = "200"></textarea><br />
<br />
<input type = "submit" value = "投稿" /><br />
</form>
</fieldset>
<div class = "toukou">
<h2>投稿一覧</h2>
<div class = "foo">

{foreach from = $read item = row}
	<p>{$row}</p>
{/foreach}

</div>
</div>
</div>
</body>
</html>
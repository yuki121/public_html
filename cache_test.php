<?php
//PEARのキャッシュライブラリを読み込み
require_once "./Cache/Lite.php";
 
//オプションの設定
$cache_opt = array(
"cacheDir" => "./Cache/tmp/", //キャッシュファイルの保存場所
"lifeTime" => 3600, //キャッシュ時間
"pearErrorMode" => CACHE_LITE_ERROR_DIE
);
 
//オブジェクトを作成
$cache_obj = new Cache_Lite($cache_opt);
 
$url = "http://ドメイン/files/mission_3-8.php";
 
if($cache_obj->get($cache_id)){
	//キャッシュが存在する場合は、キャッシュを取得
	$data = $cache_obj->get($cache_id);
}

else{
	$data = file_get_contents($url);
	//キャッシュが存在しない場合は、キャッシュを保存
	$cache_obj->save($data, $cache_id);
}

echo $data;
?>
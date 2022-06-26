<?php
//１．PHP
//select.phpの[PHPコードだけ！]をマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。

$id = $_GET["id"];
///////////////////////
// select.phpよりコピー
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//２．データ登録SQL作成
$stmt   = $pdo->prepare("SELECT * FROM users_table_2 WHERE id=:id"); //SQLをセット
$stmt->bindValue(':id',   $id,    PDO::PARAM_INT);
$status = $stmt->execute(); //SQLを実行→エラーの場合falseを$statusに代入

//３．データ表示
$view=""; //HTML文字列作り、入れる変数
if($status==false) {
  //SQLエラーの場合
  sql_error($stmt);
}else{
  //SQL成功の場合
  $row = $stmt->fetch(); //一つのデータを取り出してrowに格納
}
///////////////////////

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>登録情報の編集</legend>
    <div class="input">
      <label>姓*：<input type="text" name="t_family_name" value="<?=$row["family_name"]?>" required></label><br>
      <label>セイ*：<input type="text" name="t_family_kana" value="<?=$row["family_kana"]?>" required></label><br>
      <label>名*：<input type="text" name="t_first_name" value="<?=$row["first_name"]?>" required></label><br>
      <label>メイ*：<input type="text" name="t_first_kana" value="<?=$row["first_name"]?>" required></label><br>
      <label>メールアドレス*：<input type="text" name="t_email" value="<?=$row["email"]?>" required></label><br>
      <label>電話番号*：<input type="text" name="t_tel" value="<?=$row["tel"]?>"></label required><br>
      <label>郵便番号*：<input type="text" name="t_postcode" value="<?=$row["postcode"]?>" onKeyUp="AjaxZip3.zip2addr(this,'','prefecture','city');" required></label><br>
      <label>都道府県*：<input type="text" name="t_prefecture" value="<?=$row["prefecture"]?>" required></label><br>
      <label>市区町村*：<input type="text" name="t_city" value="<?=$row["city"]?>" required></label><br>
      <label>番地*：<input type="text" name="t_address" value="<?=$row["address"]?>" required></label><br>
      <label>建物：<input type="text" name="t_building" value="<?=$row["building"]?>"></label><br>
      <!-- idを隠して送信 -->
      <input type="hidden" name="id" value="<?=$row["id"]?>">
      <!-- idを隠して送信 -->
      <button type="submit">更新</button>
    </div>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
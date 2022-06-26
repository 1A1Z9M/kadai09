// データ削除の確認ポップアップ
<script>
  function deleteFunc(){
  return confirm('このデータを削除して良いですか？');
  }
</script>

<?php
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//２．データ取得SQL作成
$stmt = $pdo->prepare("select * from users_table_2");
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<tr>";
    $view .= "<td>".h($res["id"])."</td>";
    $view .= "<td>".h($res["family_name"])."</td>";
    $view .= "<td>".h($res["first_name"])."</td>";
    $view .= "<td>".h($res["family_kana"])."</td>";
    $view .= "<td>".h($res["first_kana"])."</td>";
    $view .= "<td>".h($res["email"])."</td>";
    $view .= "<td>".h($res["tel"])."</td>";
    $view .= "<td>".h($res["postcode"])."</td>";
    $view .= "<td>".h($res["prefecture"])."</td>";
    $view .= "<td>".h($res["city"])."</td>";
    $view .= "<td>".h($res["address"])."</td>";
    $view .= "<td>".h($res["building"])."</td>";
    $view .= "<td>".h($res["indate"])."</td>";
    $view .= '<td>';
    $view .= '<a href="detail.php?id='.h($res["id"]).'">';
    $view .= "-編集-";
    $view .= '</a>';
    $view .= '</td>';
    $view .= '<td>';
    $view .= '<a href="delete.php?id='.h($res["id"]).'">';
    $view .= "-削除-";
    $view .= '</a>';
    $view .= '</td>';
    $view .= "</tr>";
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>admin</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">admin</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
      <table>
        <tr>
          <th>ID</th>
          <th>姓</th>
          <th>名</th>
          <th>カナ(姓)</th>
          <th>カナ(名)</th>
          <th>メールアドレス</th>
          <th>電話番号</th>
          <th>郵便番号</th>
          <th>住所</th>
          <th></th>
          <th></th>
          <th></th>
          <th>登録日時</th>
        </tr>
        <?=$view?>
      </table>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>

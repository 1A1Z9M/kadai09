<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ


$t_family_name = $_POST['t_family_name'];
$t_family_kana = $_POST['t_family_kana'];
$t_first_name = $_POST['t_first_name'];
$t_first_kana = $_POST['t_first_kana'];
$t_email = $_POST['t_email'];
$t_tel = $_POST['t_tel'];
$t_postcode = $_POST['t_postcode'];
$t_prefecture = $_POST['t_prefecture'];
$t_city = $_POST['t_city'];
$t_address = $_POST['t_address'];
$t_building = $_POST['t_building'];


//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=azuma1109_kadai09_db;charset=utf8;host=mysql57.azuma1109.sakura.ne.jp','azuma1109','******');
  // $pdo = new PDO('mysql:dbname=kadai09_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnection Error:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("insert into users_table_2 (family_name, first_name, family_kana, first_kana, email, tel, postcode, prefecture, city, address, building, indate) VALUES(:family_name, :first_name, :family_kana, :first_kana, :email, :tel, :postcode, :prefecture, :city, :address, :building, sysdate())");
$stmt->bindValue(':family_name', $t_family_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':first_name', $t_first_name, PDO::PARAM_STR);
$stmt->bindValue(':family_kana', $t_family_kana, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':first_kana', $t_first_kana, PDO::PARAM_STR);
$stmt->bindValue(':email', $t_email, PDO::PARAM_STR);
$stmt->bindValue(':tel', $t_tel, PDO::PARAM_STR);
$stmt->bindValue(':postcode', $t_postcode, PDO::PARAM_INT);
$stmt->bindValue(':prefecture', $t_prefecture, PDO::PARAM_STR);
$stmt->bindValue(':city', $t_city, PDO::PARAM_STR);
$stmt->bindValue(':address', $t_address, PDO::PARAM_STR);
$stmt->bindValue(':building', $t_building, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}else{
  header("Location: complete.php");
  exit();
}
?>

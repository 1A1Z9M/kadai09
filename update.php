<?php
//1. POSTデータ取得
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
$id    = $_POST["id"];   //idを取得

//2. DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数


//３．データ登録SQL作成
$sql = "UPDATE users_table_2 SET family_name=:family_name, first_name=:first_name, family_kana=:family_kana, first_kana=:first_kana, email=:email, tel=:tel, postcode=:postcode, prefecture=:prefecture, city=:city, address=:address, building=:building WHERE id=:id";
$stmt = $pdo->prepare($sql);
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
$stmt->bindValue(':id', $id,  PDO::PARAM_INT);
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php");
}

?>
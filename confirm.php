<?PHP

$family_name = $_POST['family_name'];
$family_kana = $_POST['family_kana'];
$first_name = $_POST['first_name'];
$first_kana = $_POST['first_kana'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$postcode = $_POST['postcode'];
$prefecture = $_POST['prefecture'];
$city = $_POST['city'];
$address = $_POST['address'];
$building = $_POST['building'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録内容確認</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">登録内容確認</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<div>
  <form method="post" action="insert.php">
    <div class="input">
      <label>姓*：<input type="text" name="t_family_name" value="<?=$family_name?>" required></label><br>
      <label>セイ*：<input type="text" name="t_family_kana" value="<?=$family_kana?>" required></label><br>
      <label>名*：<input type="text" name="t_first_name" value="<?=$first_name?>" required></label><br>
      <label>メイ*：<input type="text" name="t_first_kana" value="<?=$first_kana?>" required></label><br>
      <label>メールアドレス*：<input type="text" name="t_email" value="<?=$email?>" required></label><br>
      <label>電話番号*：<input type="text" name="t_tel" value="<?=$tel?>"></label required><br>
      <label>郵便番号*：<input type="text" name="t_postcode" value="<?=$postcode?>" onKeyUp="AjaxZip3.zip2addr(this,'','prefecture','city');" required></label><br>
      <label>都道府県*：<input type="text" name="t_prefecture" value="<?=$prefecture?>" required></label><br>
      <label>市区町村*：<input type="text" name="t_city" value="<?=$city?>" required></label><br>
      <label>番地*：<input type="text" name="t_address" value="<?=$address?>" required></label><br>
      <label>建物：<input type="text" name="t_building" value="<?=$building?>"></label><br>
     <button type="submit">登録</button>      
    </div>
  </form>
  <div class="back">
  <button onclick="location.href='index.php'">戻る</button>
  </div>
</div>
  
</body>
</html>
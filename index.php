<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規会員登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">新規会員登録</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ajaxzip3読み込み -->
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<form method="post" action="confirm.php">
  <div class="jumbotron">
    <legend>ユーザー情報を入力してください(*は必須項目です)</legend>
    <div class="input">
     <label>姓*：<input type="text" name="family_name" required></label><br>
     <label>セイ*：<input type="text" name="family_kana" required></label><br>
     <label>名*：<input type="text" name="first_name" required></label><br>
     <label>メイ*：<input type="text" name="first_kana" required></label><br>
     <label>メールアドレス*：<input type="text" name="email" required></label><br>
     <label>電話番号*：<input type="text" name="tel" required></label><br>
     <label>郵便番号*：<input type="text" name="postcode" onKeyUp="AjaxZip3.zip2addr(this,'','prefecture','city');" required></label><br>
     <label>都道府県*：<input type="text" name="prefecture" required></label><br>
     <label>市区町村*：<input type="text" name="city" required></label><br>
     <label>番地*：<input type="text" name="address" required></label><br>
     <label>建物：<input type="text" name="building"></label><br>
     <button type="submit">登録内容確認</button>
    </div>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

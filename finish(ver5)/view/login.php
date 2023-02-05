<?php
// headerとfooterは未設定、フォームタグの遷移先未指定
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link rel="stylesheet" type="text/css" href="./css/login.css">
  <!-- <link rel="stylesheet" type="text/css" href="./css/default.css"> -->
</head>
<body>
  
  <header id="header">
    <!-- videoの設定 -->
    <div id="video-area">
        <video id="video" playsinline autoplay muted loop>
            <source src="video/video.mp4" type="video/mp4">
            <source src="video/video.webm" type="video/webm">
        </video>
    </div>
  </header>
    
  <main>
    <div id="logo"><img src="./img/logo3.png" alt="アラペルトロゴ" width="400"></div>
    <div id="form">
      <h2>ログイン</h2>
      <h3>始めてご利用の方は<a href="./register.php">アカウント作成</a>をしてください</h3>

      <form action="./login.php" method="POST">
        <p id="erorr"><?php echo isset($err_msg)?$err_msg:''; ?></p>
        <p>メールアドレス</p>
        <input type="text" name="mail"><br>
        <p>パスワード</p>
        <input type="password" name="pass"><br>
        <button type="submit" name="login" value="send">ログイン</button>
      </form>
  </main>


</body>
</html>

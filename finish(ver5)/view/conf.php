<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- destyle -->
    <link rel="stylesheet" href="./css/destyle.css">
    <!-- スタイル -->
    <link rel="stylesheet" href="./css/conf.css">
    <title>会員登録内容確認</title>
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

    <div id="logo"><a href="./home.php"><img src="./img/logo3.png" alt="アラペルトロゴ" width="400"></a></div>  
    <div id="form">
      <h1>登録情報確認</h1>
      <div class="content1" id="name">
        <h2>名前</h2>
        <p><?php print $name; ?></p>
      </div><!--#mail-->

      <div class="content1" id="mail">
        <h2>メールアドレス</h2>
        <p><?php print $mail; ?></p>
      </div><!--#mail-->

      <div class="content1" id="tell">
        <h2>電話番号</h2>
        <p><?php print $tel; ?></p>
      </div><!--#tell-->

      <div class="content1" id="birth">
        <h2>生年月日</h2>
        <p><?php print $birth_year; ?>年<?php print $birth_month; ?>月<?php print $birth_day; ?>日</p>
      </div><!--#birth-->

      <div class="content1" id="gender">
        <h2>性別</h2>
        <p><?php print $gender; ?></p>
      </div><!--#gender-->

      <div class="content1" id="post">
        <h2>郵便番号</h2>
        <p><?php print $zip; ?></p>
      </div><!--#post-->

      <div class="content1" id="address">
        <h2>住所</h2>
        <p><?php print $address; ?></p>
      </div><!--#address-->

      <div class="content1" id="card_num">
        <h2>カード番号</h2>
        <p><?php print $card_num; ?></p>
      </div><!--#card_num-->

      <div class="content1" id="card_date">
        <h2>カード有効期限</h2>
        <p><?php print $card_year; ?>年/<?php print $card_month; ?>月</p>
      </div><!--#card_date-->

      <div class="content1" id="card_name">
        <h2>カード名義</h2>
        <p><?php print $card_name; ?></p>
      </div><!--#card_name-->

      <p><a href="./conf.php?btn=inset">登録</a></p>
    </div>
    </main>
  </body>
</html>

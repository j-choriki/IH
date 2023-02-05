<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>購入画面</title>
  <link rel="stylesheet" type="text/css" href="./css/header.css">
  <link rel="stylesheet" type="text/css" href="./css/buy_style.css">
  <link rel="stylesheet" href="./css/footer_style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body>
<header>
        <!-- サイトタイトル -->
        <h1 class="header_title"><a href="./home.php"><img src="./img/logo1.png" alt="" width="90"></a></h1>

        <!-- 検索フォーム -->
        <div id="search">
        <form  class ="search-form" action="./home.php" method="post">
            <input type="text" name="search" class="search-input" placeholder="何をお探しですか">
            <input type="submit" value="&#xf002;" class="search-button">
        </form>
        </div>

        <!-- 通知 -->
        <div id="news">
            <a href="#2"><i class="fas fa-bell fa-lg fa-fw"></i></a>
        </div>

      <!-- ログイン名を表示 -->
      <p id="login_name">ようこそ<span><?php echo $name;?></span>さん</p>

        <!-- ハンバーガーメニュー -->
        <div class="openbtn"><span></span><span></span><span></span></div>
         <!-- グローバルナビゲーション -->
         <nav id="g-nav">
            <div class="g-nav-list" id="login">
                <ul>
                    <li><a href="./login.php">ログイン</a></li>
                    <li><a href="register.php">会員登録</a></li>
                </ul>
            </div>

            <div class="g-nav-list" id="logout">
                <ul>
                  <li><a href="./home.php?out=out">ログアウト</a></li>
                </ul>
                <ul>
                    <li><a href="">購入履歴</a></li>
                    <li><a href="./information.php">出品</a></li>
                    <li><a href="./exhibit_log.php">出品一覧</a></li>
                </ul>

            </div>
        </nav>

    </header> 
        
   

    <div id="body">
    <div id="product">
      <div id="img">
        <p><img src="<?php echo DIR_IMG. $img;?>" alt="商品画像"></p>
      </div><!--#img-->

      <div id="info">
        <p id="pName"><?php print $Pname ?></p>
        <p id="price">
          ￥<?php print $price ?>
          <span>(税込み)</span>
          <span>送料込み</span>
        </p><!--#price-->
      </div><!--#info-->
    </div><!--#product-->

    <div id="main">
    <form action="buy.php?product_id=<?php echo $product_id;?>" method="post">
        <div class="content1">
          <div class="content2">
            <div class="content3" id="subtotal">
              <p>商品の小計：</p>
              <p>￥<?php print $price; ?></p>
            </div><!--#subtotal-->

            <div class="content3" id="margin">
              <p>手数料：</p>
              <p>￥<?php print $margin; ?></p>
            </div><!--margin-->

            <div class="content3" id="total">
              <p class="text">ご請求額<span>：</span></p>
              <p>￥<?php print $total; ?></p>
              <input type="hidden" name="total" value="<?php print $total; ?>">
            </div><!--#total-->
          </div><!--.content2-->
        </div><!--.content1-->

        <div class="content1">
          <h2>お届け先情報</h2>
          <div class="content2" id="address_info">
            <p><span>氏名</span><input id="name" type="text" name="name" value="<?php print $name; ?>"></p>
            <p><span>郵便番号</span><input id="post" type="text" name="post" value="<?php print $post; ?>"></p>
            <p><span>住所</span><input id="address" type="text" name="address" value="<?php print $address; ?>"></p>

<!-- modalWindow------------------------------------------------------------------------------------------------------------- -->
            <div class="overlay" id="js-overlay"></div>
            <div class="modal" id="js-modal">
              <div id="modal_main">
                <p>更新箇所を入力してください</p>
                <p><span>氏名</span><input id="modal_name" type="text"></p>
                <p><span>郵便番号</span><input id="modal_post" type="text"></p>
                <p><span>住所</span><input id="modal_address" type="text"></p>
                <div id="btn">
                <button type="button" class="modal-close" id="js-cancel">キャンセル</button>
                <button type="button" class="modal-close" id="js-close" name="update" value="update">確定</button>
                </div><!--#btn-->
              </div><!--#modal_main-->
            </div><!--#js-modal-->
<!-- modalWindow--------------------------------------------------------------------------------------------------------------- -->


            <button type="button" class="modal-open" id="js-open">変更する際はこちら</button>

          </div><!--#address_info-->
        </div><!--.content1-->

        <div class="content1">
          <h2>お支払い情報</h2>
          <div class="content2" id="card">
            <p>カード番号</p>
            <p><?php print $card_num; ?></p>
            <!-- <a href=""><p class="change">情報に誤り、もしくは変更がある場合はこちら</p></a> -->
          </div><!--#card-->
        </div><!--.content1-->


        <button id="cash" name="cash" type="submit">購入</button>
      </form>
    </div><!--#main-->

  <footer>
        <div class="footer_box1">
            <ul class="menu">
                <li><a href="#10" target="_blank">初めてのお客様</a ></li>
                <li><a href="#11" target="_blank">新規会員登録</a ></li>
                <li><a href="#12" target="_blank">マイページ</a ></li>
                <li><a href="#13" target="_blank">よくあるご質問/ヘルプ</a ></li>
                <li><a href="#14" >お問い合わせ</a ></li>
                <li><a href="#15" target="_blank">プライバシーポリシー</a ></li>
                <li><a href="#16" target="_blank">会社概要</a ></li>
                <li><a href="#17" target="_blank">プレスリリース</a ></li>
                <li><a href="#18" target="_blank">個人情報保護方針</a ></li>
                <li><a href="#19">特定商取引法に基づく表示</a></li>
            </ul>
        </div>
        <div class="logo">
            <a href="#9"><img src="./img/logo2.png"></img></a>
        </div>
        <div id="page_top">
            <a href="#20"><i class="fab fa-instagram fa-lg" style="color:gray;"></i></a>
            <a href="#21"><i class="fab fa-twitter fa-lg" style="color:gray;"></i></a>    
            <a href="#22"><i class="fab fa-facebook-f fa-lg" style="color:gray;"></i></a>
            <a href="#23"><i class="fas fa-share-alt fa-lg" style="color:gray;"></i></a>
            <a href="#24"><i class="fab fa-youtube fa-lg" style="color:gray;"></i></a>
        </div>
        <div class="footer_box2">
            <p class="copyright">© アラペルト. 2022.</p>
        </div>
    </footer>

    

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./js/plugin/slick.min.js"></script>
    <script src="./js/styleHome.js"></script>
    <script src="./js/buy.js"></script>
    <script src="./js/menu.js"></script>
</body>
</html>

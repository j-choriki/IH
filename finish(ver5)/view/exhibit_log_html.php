<?php
// footerは未設定、URLの遷移先未指定
// 下記の関数はテスト用の為、書き換えるか別で用意してください。

$notice = 0; //通知件数

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>出品履歴一覧画面</title>
  <!-- ページスタイル -->
  <link rel="stylesheet" type="text/css" href="css/exhibit_log_style.css">
  <!-- ヘッダー -->
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <!-- フッター -->
  <link rel="stylesheet" type="text/css" href="css/footer_style.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body>
  <div class="all">

  <header>
        <!-- サイトタイトル -->
        <h1 class="header_title"><a href="./home.php"><img src="./img/logo1.png" alt="" width="90"></a></h1><!-- リンク先設定 -->

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
        

    <div id="main">
 
      <h1 id="title">
        出品履歴
      </h1><!--#title-->

      <div id="table">
        <table>
          <tr class="tableTitle">
            <th>商品画像</th>
            <th>商品番号</th>
            <th>商品名</th>
            <th>価格</th>
            <th>出品日時</th>
          </tr>

<!--ループ処理-->
          <?php foreach($data_list as $list){?>
            <tr>
              <td class="img"><div class="td"><img src="<?php echo DIR_IMG . $list['id'] . '_1.' . $list['photo1']; ?>" alt="商品画像"></div></td>
              <td class="num"><div class="td"><p><?php echo $list['id']; ?></p></div></td>
              <td class="name"><div class="td"><p><?php echo $list['name']; ?></p></div></td>
              <td class="price"><div class="td"><span>￥</span><?php echo $list['price']; ?></div></td>
              <td class="date">
                <?php echo date("Y年m月d日" ,strtotime($list['time']));?>
              </td>
            </tr>
          <?php } ?>
        </table>

<!--ループ処理-->
        <div id="pager">
          <ul>
            <li>
              <!-- 前へ -->
              <?php if($now_page != 0){ ?>
                  <a href="exhibit_log.php?page=<?php echo $now_page-1?>;">前へ</a>
              <?php }else{ ?>
                  <a href="" class="now">前へ</a>
              <?php } ?>
            </li>

            <div id="num">
              <!-- ページリンク -->
              <li>
                <?php for($i=0;$i<$all_page;$i++){ ?>
                    <!-- 今見ているページはリンクを無効化 -->
                    <?php if($i != $now_page){ ?>
                        <a href="exhibit_log.php?page=<?php echo $i?>;"><?php echo $i+1;?></a>
                    <?php }else{ ?>
                        <a href="" class="now"><?php echo $i+1;?></a>
                    <?php } ?>
                <?php } ?>
              </li>
            </div>


            <!-- 次へ -->
            <li>
              <?php if($now_page < $all_page-1){ ?>
                  <a href="exhibit_log.php?page=<?php echo $now_page+1?>;">次へ</a>
              <?php }else{ ?>
                  <a href="" class="now">次へ</a>
              <?php } ?>
            </li> <!--リンク未指定-->


          </ul>

        </div><!--#pager-->

      </div><!--#table-->

    </div><!-- #main -->

    <div class="footer">

    </div><!-- .footer -->

  </div><!-- .all -->

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
    <script src="./js/menu.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer_style.css">
    <link rel="stylesheet" type="text/css" href="./css/plugin/slick.css">
    <link rel="stylesheet" type="text/css" href="./css/plugin/slick-theme.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <title>ホーム画面</title>
</head>
<body>
    <header>
        <!-- サイトタイトル -->
        <h1 class="header_title"><a href="#1"><img src="./img/logo1.png" alt="" width="90"></a></h1><!-- リンク先設定 -->
   
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
                    <li><a href="./<?php echo $uri;?>?out=out">ログアウト</a></li>
                </ul>
                <ul>
                    <li><a href="">購入履歴</a></li>
                    <li><a href="./information.php">出品</a></li>
                    <li><a href="./exhibit_log.php">出品一覧</a></li>
                </ul>

            </div>
        </nav>

    </header> 
        
    <main>
        <!-- 広告 -->
        <div id="slider">
            <ul class="slider">
                <li><img src="./img/cm1.jpg" alt="広告1"></li>
                <li><img src="./img/cm2.jpg" alt="広告2"></li>
                <li><img src="./img/cm3.jpg" alt="広告3"></li>
                <li><img src="./img/cm4.jpg" alt="広告4"></li>
            </ul>
        </div>

        <!-- 商品表示エリア -->
        <div id="contents">
                <?php foreach($list as  $val): ?>
                    <div class="item">
                        <a href="./item.php?id=<?php echo $val['id'] ?>">
                        <div><img src="<?php echo DIR_IMG . $val['id'] . '_1.' . $val['photo1'];?>" alt="テスト" width="200"></div>
                        <p><?php echo $val['name'];?></p>
                        <div class="price">¥<?php echo $val['price'];?></div>
                        </a>
                </div>
                <?php endforeach; ?>
        </div>
    </main>

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

    
    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./js/plugin/jquery-3.6.1.min.js"></script>
    <script src="./js/plugin/slick.min.js"></script>
    <script src="./js/styleHome.js"></script>
    <script src="./js/menu.js"></script>
    <script>$('body').fadeIn(1000);</script>
</body>
</html>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/details_style.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="./css/footer_style.css">
    <link rel="stylesheet" type="text/css" href="./css/plugin/slick.css">
    <link rel="stylesheet" type="text/css" href="./css/plugin/slick-theme.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <title>商品詳細</title>
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
            </div>
        </nav>

    </header> 
    
    <main>
        <section id="box2">
            <div class="container">
             <ul class="slider1">
                    <li class="slick-img"><img src="../img/<?php echo $list[0]['id']; ?>_1.<?php echo $list[0]['photo1']; ?>"alt=""/></li>
                    <li class="slick-img"><img src="../img/<?php echo $list[0]['id']; ?>_2.<?php echo $list[0]['photo2']; ?>"alt=""/></li>
                    <li class="slick-img"><img src="../img/<?php echo $list[0]['id']; ?>_3.<?php echo $list[0]['photo3']; ?>"alt=""/></li>
                </ul>
                <ul class="thumbnail">
                    <li class="thumbnail-img"><img src="../img/<?php echo $list[0]['id']; ?>_1.<?php echo $list[0]['photo1']; ?>"alt=""/></li>
                    <li class="thumbnail-img"><img src="../img/<?php echo $list[0]['id']; ?>_2.<?php echo $list[0]['photo2']; ?>"alt=""/></li>
                    <li class="thumbnail-img"><img src="../img/<?php echo $list[0]['id']; ?>_3.<?php echo $list[0]['photo3']; ?>"alt=""/></li>
                </ul>
            </div>

            <div id="right_box">
                <!-- 商品名 -->
                <h1><?php echo $list[0]['name']; ?></h1>

                <!-- 金額 -->
                <div class="money">
                    <p class="money_red">￥<?php echo $price; ?><span>(税込)送料込み</span></p>
                </div>
                
                <!-- ハート -->
                <div class="example2">
                    <input type="checkbox" checked id="1" name="example2"><label for="1"></label>
                </div>

                <!-- コメント -->
                <div id="comment">
                    <a href="#box3"><img src="./img/comment.png"alt=""/></a><!-- 通知数をphpで設定 --><!-- リンク先設定 -->
                </div>

                <!-- 購入手続きボタン -->
                <div class="block2">
                    <a href="buy.php?product_id=<?php echo $list[0]['id'];?>">購入手続へ</a>
                </div>

                <!-- 商品説明 -->
                <div class="explanation">
                    <h3>商品の説明</h3>
                    <p>
                        <?php echo $list[0]['overview']; ?>
                    </p>
                </div>

                 <!-- 出品者 -->
                 <div id="buyer">
                    <a href="">
                    <h3>出品者</h3>
                    <div class="flex">
                        <p id="radius"><img src="./img/test1.jpg"alt="" alt="" width="80"></p>
                        <div>
                            <p>saori</p>
                            <p>本人確認済み</p>
                        </div>
                    </div>
                    </a>
                </div>

            </div>
        </section>

        <!-- 質問関係 -->
        <section id="box3">
            <h2>コメント</h2>
            <!-- 質問内容表示エリア -->
            <div id="show_question">
                <?php foreach($contact_list as $data):?>
                <p>ユーザー名：<?php echo $data['name'];?></p>
                <p><?php echo date('Y年m月d日H時i分',  strtotime($data['contact_day'])) ;?></p>
                <p><?php echo $data['comment'];?></p>
                <hr>
                <?php endforeach;?>

                
            </div>

            <div id="question">
                <form action="item.php?id=<?php echo $products_id;?>" method="post" enctype="multipart/form-data"><!-- リンク先設定 -->
                    <h2 class="title3">出品者へ質問</h2>
                    <textarea name="tx_explanation" class="tarea" placeholder="" required></textarea>
                    <input type="submit" name="comment" class="button3" value="送信">
                </form>
            </div>
        </section>

        <!-- ランダムで商品を配置 -->
        <section id="other_item">
            <h2>他の商品を見る</h2>
            <div id="contents">
                <?php for($i=0;$i<5;$i++){ ?>
                    <div class="item">
                        <a href="./"><!-- 詳細ページへのリンクを記載 -->
                        <div><img src="<?php echo DIR_IMG . $all_products[$num[$i]]['id'] . '_1.' . $all_products[$num[$i]]['photo1'];?>" alt="テスト" width="200"></div>
                        <p><?php echo $all_products[$num[$i]]['name'];?></p>
                        <div class="price">¥<?php echo $all_products[$num[$i]]['price'];?></div>
                        </a>
                    </div>
                <?php } ?>
        </div>
        </section>


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

    <script src="./js/plugin/jquery-3.6.1.min.js"></script>
    <script src="./js/plugin/slick.min.js"></script>
    <script src="./js/main.js" async ></script>
    <script src="./js/styleHome.js"></script>
    <script src="./js/menu.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/info.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="./css/footer_style.css">
    <link rel="stylesheet" type="text/css" href="css/plugin/slick.css">
    <link rel="stylesheet" type="text/css" href="css/plugin/slick-theme.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <!-- <script src="js/index.js" async ></script> -->

    <title>商品情報登録</title>
</head>
<body>
    <!-- ヘッダー -->   
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
    <main>
        <section id="box1">
            <!-- タイトル -->
            <div class="title">
                <h1>商品情報</h1>
            </div>

            <div class="input">
                <form action="information.php" method="post" enctype="multipart/form-data">リンク先設定
                    <div class="exhibit">
                        <h2 class="title3">出品画像</h2>
                    </div>

                    <div class="flex">
                        <!-- ファイル＆ドロップ -->
                        <div id="box" class="box">
                            <!-- 写真1枚目 -->
                            <div class="upload-area">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>ドラッグ＆ドロップ or クリック</p>
                                <input type="file" name="img1" id="input-files1" onChange="loop(event, 'item1')" multiple class="input-files">
                            </div>
                            <div id="preview-item1"></div>
                        </div>  
                        
                        <!-- ファイル＆ドロップ -->
                        <div id="box" class="box">
                            <!-- 写真2枚目 -->
                            <div class="upload-area">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>ドラッグ＆ドロップ or クリック</p>
                                <input type="file" name="img2" id="input-files2" onChange="loop(event, 'item2')" multiple class="input-files">
                            </div>
                            <div id="preview-item2"></div>
                        </div>  

                        <!-- ファイル＆ドロップ -->
                        <div id="box" class="box">
                            <!-- 写真3枚目 -->
                            <div class="upload-area">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>ドラッグ＆ドロップ or クリック</p>
                                <input type="file" name="img3" id="input-files3" onChange="loop(event, 'item3')" multiple class="input-files">
                            </div>
                            <div id="preview-item3"></div>
                            
                        </div>  
                    </div>
                    
                    
                    <div class="exhibit">
                        <h2 class="title3">商品名</h2>
                        <input type="text" name="tx_name" class="txt" placeholder="商品名" required ><!--商品名入力項目-->
                    </div>

                    <div class="exhibit">
                        <h2 class="title3">商品の説明</h2>
                        <textarea id ="textarea" name="tx_explanation" class="tarea" placeholder="商品の説明（メーカー、色、素材、重さ、定価、注意点など）" required></textarea>
                    </div>

                    <div class="exhibit">
                        <h2 class="title3"> 販売価格</h2>
                        <input type="number" name="tx_price" class="txt2"  step="1" max="9999999" required >円<!--販売価格入力項目-->
                    </div>
                </fome>
                <div class="block2">
                    <input type="submit" id="openModal" class="button2" name="upload" value="確認する">
                </div>
            </div>
        </section>

        <!-- 以下モーダルメニュー -->
        <section id="modalArea" class="modalArea">
            <div id="modalBg" class="modalBg"></div>
            <div class="modalWrapper">
                <div class="modalContents">
                    <h2>入力内容の確認</h2>
                    <p>下記の入力内容に間違いありませんか？</p>

                    <form name="userForm" action="information.php" method="post" enctype="multipart/form-data">
                        <div>
                            <h3>添付画像</h3>
                            <p id="item_file"></p>
                        </div>

                        <div>
                            <h3>商品名</h3>
                            <p id="item_name"></p>
                            <!-- <input type="hidden" name="tx_name"> -->
                        </div>
                        <div>
                            <h3>商品説明</h3>
                            <p id="item_explain"></p>
                            <!-- <input type="hidden" name="tx_explanation"> -->
                        </div>
                        <div>
                            <h3>商品価格</h3>
                            <p id="item_price" ></p>
                            <!-- <input type ="hidden" name="tx_price"> -->
                        </div>
                            <button id="btn" class="signUpButton btn06" disabled="false" name="upload" value="確認する">登録</button>
                    </form>
                </div>
                <div id="closeModal" class="closeModal">
                ×
                </div>
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

    

    <script src="js/plugin/jquery-3.6.1.min.js"></script>
    <script src="js/plugin/slick.min.js"></script>
    <script src="js/main.js" async></script>
    <script src="js/mordal.js"></script>
    <script src="./js/menu.js"></script>
    <script src="./js/styleHome.js"></script>
</body>
</html>
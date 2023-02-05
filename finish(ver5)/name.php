<?php

$name = 'ゲスト';

// ログイン状態
if(isset($_COOKIE['id'])){
    $id = $_COOKIE['id'];
    $sql = "SELECT name FROM customer WHERE id = '" . $id ."';";
    $result = mysqli_query($link, $sql);
    $name = mysqli_fetch_assoc($result)['name'];
    // ページ名を取得
    $uri  = explode('/',$_SERVER['REQUEST_URI']);
    $uri  = end($uri);
}

if(isset($_GET['out'])){
    // cookieの削除
    setcookie('id','',time()-60);
    $name = 'ゲスト';
    header('location:./home.php');
    exit;
}
?>
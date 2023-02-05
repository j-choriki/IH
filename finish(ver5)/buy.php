<?php

require_once '../config.php';

// db接続
$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link,'utf8');

//未ログインの場合
if(isset($_COOKIE['id']) == false){
    setcookie('page' , $_GET['product_id'] , time() +60*10);
    header('location:login.php');
    exit;
}else{
    require_once('./name.php');
}



////送信されてきた顧客ID
$id = $_COOKIE['id'];

//商品ID
$product_id = $_GET['product_id'];

if(isset($_POST['cash'])){
    // 購入手続
    $sql = "INSERT INTO sale(customer_id,products_id) VALUES (" . $id . "," . $product_id . ")";
    //SQLに登録
    mysqli_query($link,$sql);

    //顧客情報を格納
    session_start();
    $_SESSION['user'] = array(
        $_POST['name'],
        $_POST['post'],
        $_POST['address'],
    );

    
    header('location:./buy_comp.php?product_id=' . $product_id);
    exit;
}

//顧客の情報を取得
$sql = "SELECT * FROM customer WHERE id = " . $id;

$data = mysqli_query($link,$sql);
while($row = mysqli_fetch_assoc($data)){
    $data_list = $row;
}

//商品情報を取得
$sql = "SELECT * FROM products WHERE id = " . $product_id;

$data = mysqli_query($link,$sql);
while($row = mysqli_fetch_assoc($data)){
    $product_list = $row;
}
mysqli_close($link);

//郵便番号にハイフンを入れる
$zipcode = $data_list['zip'];
//最初から3文字分を取得する
$zip1    = substr($zipcode ,0,3);
//4文字目から最後まで取得する
$zip2    = substr($zipcode ,3);
//ハイフンで結合する
$zipcode = $zip1 . "-" . $zip2;


$img = $product_list['id'] . '_1.' . $product_list['photo1'];
$notice = 0;
$Pname = $product_list['name'];
$price = $product_list['price'];
$total = $product_list['price'];
$post = $zipcode;
$address = $data_list['address'];
$name = $data_list['name'];
$card_num = "************1111";
$margin = 0;
require_once('./view/buy_html.php');
?>

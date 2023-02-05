<?php
require_once '../config.php';

session_start();

$user = $_SESSION['user'];

//送信されてきたID
// $id = $_COOKIE['id'];
$product_id = $_GET['product_id'];

// db接続
$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link,'utf8');

require_once('./name.php');

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

//郵便番号
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
$address = $user[2];
$name = $user[0];
$card_num = "************1504";
$margin = 0;

require_once('./view/buy_comp_html.php');
?>

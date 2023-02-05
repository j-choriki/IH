<?php


require_once '../config.php';
// require_once '../func.php';

$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link,'utf8');

require_once('./name.php');

$now_page = 0;//現在のページ
$num_data = 5;//1ページの表示件数
$data_list = [];
$all_list = [];

//検索ボタンが押されたとき
if(isset($_POST['search'])){
    setcookie("search", $_POST['search'], time() +60 * 6);
    // header('');
    // exit;
}

$id = $_COOKIE['id'];

//DB接続
$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);


//sql文生成
$sql = "SELECT * FROM products WHERE buyer_id = " . $id . " ORDER BY time DESC";

//情報取得
mysqli_set_charset($link,'utf8');
$data = mysqli_query($link,$sql);
while($row = mysqli_fetch_assoc($data)){
    $all_list[] = $row;
}

//総件数取得
$data_num = count($all_list);

//ページ数格納
$all_page = ceil($data_num / $num_data);

//値が送られてきていたらその位置から5件の情報を取得
if(isset($_GET['page'])){
    $num = (int)$_GET['page'] * $num_data;
    $sql = "SELECT * FROM products WHERE buyer_id = " . $id . " ORDER BY time DESC LIMIT " . $num . " , " . $num_data;
    $now_page = (int)$_GET['page'];
}
else{
    $sql = "SELECT * FROM products WHERE buyer_id = " . $id . " ORDER BY time DESC LIMIT 0 , " . $num_data;
}

//情報取得
mysqli_set_charset($link,'utf8');
$data = mysqli_query($link,$sql);
while($row = mysqli_fetch_assoc($data)){
    $data_list[] = $row;
}



//DB切断
mysqli_close($link);



require_once 'view/exhibit_log_html.php';
?>
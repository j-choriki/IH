<?php

session_start();
require_once('../config.php');

// setcookie('id' , '' , time() -60*10);
setcookie('page' , '' , time() -60*10);

$flg = 1;
$list = [];


// db接続
$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link , 'utf8');


// ログイン名の取得
require_once('./name.php');

//検索ボタンが押されたとき
if(isset($_POST['search'])){
    $_SESSION['search'] = $_POST['search'];
    //検索の値が飛んできたとき
    if(isset($_SESSION['search']) != ''){
        $sql = "SELECT id , name , price , photo1 FROM products WHERE name LIKE '%" . $_SESSION['search'] . "%' ORDER BY id DESC";
        //該当情報を取得
        $result = mysqli_query($link,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
    }
}
else{
    //sql生成
    $sql = "SELECT id , name , price , photo1 FROM products ORDER BY id DESC";
    //該当情報を取得
    $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $list[] = $row;
    }
}   



foreach($list as $num => $val){
    foreach($val as $key => $data){
        if($key === 'price'){   
            $list[$num][$key] = number_format($list[$num][$key]);
        }
    }
}

mysqli_close($link);

//3ケタごとに,を入れる

session_destroy();



require_once('./view/home.php');
?>
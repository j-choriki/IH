<?php
require_once '../config.php';
// require_once '../func.php';

session_start();

$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link,'utf8');

require_once('./name.php');

//ログイン中の顧客ID
// $id = $_COOKIE['id'];

//DB情報取得用配列
$data_list = [];

setcookie("search", '', time() -60);

//検索ボタンが押されたとき
if(isset($_POST['search'])){
    $_SESSION['search'] = $_POST['search'];
    header('location:home.php');
    exit;
}





//登録ボタンが押されたとき
if(isset($_POST['upload']) && $_POST['upload'] == '確認する'){

    $img_flg = 0;

    $name = $_POST['tx_name'];
    $price = $_POST['tx_price'];
    $explanation = $_POST['tx_explanation'];

    //画像情報を格納
    $upload_file1 = $_FILES['img1'];
    $upload_file2 = $_FILES['img2'];
    $upload_file3 = $_FILES['img3'];
    
    //画像の情報を格納
    $img_size = getimagesize($upload_file1['tmp_name']);
    @$img2_size = getimagesize($upload_file2['tmp_name']);
    @$img3_size = getimagesize($upload_file3['tmp_name']);


    //拡張子を格納
    $img_data = explode('.' , $upload_file1['name']);
    $type = $img_data[count($img_data) - 1];

    //sql生成
    $sql = "INSERT INTO products(name,price,photo1,overview,del_date,buyer_id,situation,genre) VALUES('" . $name . "'," . $price . ",'" . $type . "','" . $explanation . "','非常に綺麗'," . $id . ",0,'AL')";

    //2枚目の画像があるとき
    if($img2_size != false && $img3_size === false){

        $img2_data = explode('.' , $upload_file2['name']);
        $type2 = $img2_data[count($img2_data) - 1];

        $sql = "INSERT INTO products(name,price,photo1,photo2,overview,del_date,buyer_id,situation,genre) VALUES('" . $name . "'," . $price . ",'" . $type . "','" . $type2 . "','" . $explanation . "','非常に綺麗'," . $id . ",0,'AL')";

        $img_flg = 1;
    }
    //3枚目の画像があるとき
    elseif($img2_size != false && $img3_size != false){

        $img2_data = explode('.' , $upload_file2['name']);
        $type2 = $img2_data[count($img2_data) - 1];

        $img3_data = explode('.' , $upload_file3['name']);
        $type3 = $img3_data[count($img3_data) - 1];

        $sql = "INSERT INTO products(name,price,photo1,photo2,photo3,overview,del_date,buyer_id,situation,genre) VALUES('" . $name . "'," . $price . ",'" . $type . "','" . $type2 . "','" . $type3 . "','" . $explanation . "','非常に綺麗'," . $id . ",0,'AL')";

        $img_flg = 2;
    }

    //SQLに登録
    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link,'utf8');
    mysqli_query($link,$sql);

    //直前に登録したidを取得
    $id = mysqli_insert_id($link);
    mysqli_close($link);

    //保存先のパスを生成
    $file_name = DIR_IMG . $id . "_1." . $type;

    //保存
    move_uploaded_file($upload_file1['tmp_name'],$file_name);

    if($img_flg === 1){
        $file_name2 = DIR_IMG . $id . "_2." . $type2;    
        move_uploaded_file($upload_file2['tmp_name'],$file_name2);  
    }
    elseif($img_flg === 2){

        $file_name2 = DIR_IMG . $id . "_2." . $type2;    
        move_uploaded_file($upload_file2['tmp_name'],$file_name2); 

        $file_name3 = DIR_IMG . $id . "_3." . $type3;    
        move_uploaded_file($upload_file3['tmp_name'],$file_name3);  
    }

    header('location:exhibit_log.php');
    exit;


}

require_once 'view/information_html.php';

?>
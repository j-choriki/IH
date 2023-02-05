<?php
$products_id = $_GET['id'];

require_once('../config.php');

$contact_list = [];
//DB接続
$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link,'utf8');

require_once('./name.php');



//コメント情報取得
if(isset($_POST['comment']) && $_POST['comment'] == '送信'){

    //ログイン済みの場合
    if(isset($_COOKIE['id'])){
        $sql = "INSERT INTO contact(customer_id,products_id,comment) VALUES (" . $_COOKIE['id'] . "," . $products_id . ",'" . $_POST['tx_explanation'] .  "')";

        //DB接続
        $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);

        mysqli_set_charset($link,'utf8');
        mysqli_query($link,$sql);

        //DB切断
        mysqli_close($link);
    }
    //未ログインの場合
    else{
    setcookie('page' , $products_id , time() +60*10);
    header('location:login.php');
    exit;
}

}


$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);

//商品情報取得
mysqli_set_charset($link , 'utf8');
$result = mysqli_query($link, "SELECT id , name , price , photo1 , photo2 , photo3 , overview FROM products WHERE id = $products_id;");
while($row = mysqli_fetch_assoc($result)){
    $list[] = $row;
}



//商品のコメントを取得
$sql = "SELECT B.name,A.contact_day,A.comment FROM contact A INNER JOIN customer B ON B.id  = A.customer_id WHERE A.products_id = " .  $products_id . " ORDER BY A.contact_day DESC";

mysqli_set_charset($link,'utf8');
$data = mysqli_query($link,$sql);
while($row = mysqli_fetch_assoc($data)){
    $contact_list[] = $row;
}

//商品を全件取得
$sql = "SELECT * FROM products";

mysqli_set_charset($link,'utf8');
$data = mysqli_query($link,$sql);
while($row = mysqli_fetch_assoc($data)){
    $all_products[] = $row;
}

//その他で表示する商品番号をランダムに格納
$products_num = count($all_products);
$num = [];
for($i=0;$i<5;$i++){
    $num[] = rand(1,$products_num - 1);
}


mysqli_close($link);




$price = number_format($list[0]['price']);
require_once('view/item_html.php');
?>
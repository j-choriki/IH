<?php
require_once('../config.php');

$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link , 'utf8');
$result = mysqli_query($link, "SELECT id , mail , pass FROM customer;");
while($row = mysqli_fetch_assoc($result)){
    $list[] = $row;
}
mysqli_close($link);
if(!empty($_POST['mail']) || !empty($_POST['pass'])){
    if(!empty($_POST['mail']) && !empty($_POST['pass'])){
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];
        foreach($list as $val){
            if($val['mail'] == $mail && $val['pass'] == $pass){

                //ログインした顧客のIDを保持
                setcookie('id' , $val['id'] , time() +60 * 20);

                //商品詳細から遷移してきた場合
                if(isset($_COOKIE['page'])){
                    $page = $_COOKIE['page'];
                    setcookie('page' , '' , time() -60*10);
                    header('location: item.php?id=' . $page);
                    exit;
                }

                header('location: ./home.php');
                exit;
            }
            else{
                $err_msg = 'メールアドレスもしくはパスワードが違います';
            }
        }
    }
    else{
        $err_msg = 'メールアドレス,パスワードを入力してください';
    }
}
require_once('./view/login.php');
?>
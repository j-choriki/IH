<?php
// configまでのパス
require_once('../config.php');

// db接続
$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link , 'utf8');

// 登録ボタンが押されたときの処理
if(isset($_GET['btn'])){
    // cookie の値を取得
    $name = $_COOKIE['name'];
    $mail = $_COOKIE['mail'];
    $tel = $_COOKIE['tel'];
    $pass = $_COOKIE['pass'];
    $birth_year = $_COOKIE['year'];
    $birth_month = $_COOKIE['month'];
    $birth_day = $_COOKIE['day'];
    $gender = $_COOKIE['gender'];
    $zip = $_COOKIE['zip'];
    $address = $_COOKIE['address'];
    $card_num = $_COOKIE['card_num'];
    $card_year = $_COOKIE['card_year'];
    $card_month = $_COOKIE['card_month'];
    $card_year = $_COOKIE['card_year'];
    $card_security = $_COOKIE['sec'];
    $card_name = $_COOKIE['card_name'];

    // db登録用URL作成
    $sql = "INSERT INTO customer(name,mail,tel,pass,birth_year,birth_month,birth_day,gender,zip,address,credityear,creditmonth,creditsec,creditname)VALUES('".$name."','".$mail."','".$tel."','".$pass."','".$birth_year."','".$birth_month."','".$birth_day."','".$gender."','".$zip."','".$address."','".$card_year."','".$card_month."',$card_security,'".$card_name."');";
    // dbへ会員登録
    mysqli_query($link,$sql);

    $id = mysqli_insert_id($link);

    mysqli_close($link);

    // db登録が終わればログイン状態でホーム画面へ
    setcookie('id',$id,time() + 60 * 60);
    header('location:./home.php');
    exit;
}
else{//一番はじめにページに入ってきたときの処理

    //入力値を変数に格納
    $name = $_POST['name'];
    setcookie('name',$name,time() + 60 * 60);
    $mail = $_POST['mail'];
    setcookie('mail',$mail,time() + 60 * 60);
    $tel = $_POST['tel'];
    setcookie('tel',$tel,time() + 60 * 60);
    $pass = $_POST['pass'];
    setcookie('pass',$pass,time() + 60 * 60);
    $birth_year = $_POST['year'];
    setcookie('year',$birth_year,time() + 60 * 60);
    $birth_month = $_POST['month'];
    setcookie('month',$birth_month,time() + 60 * 60);
    $birth_day = $_POST['day'];
    setcookie('day',$birth_day,time() + 60 * 60);
    $gender = $_POST['gender'];
    $zip = $_POST['zip'];
    setcookie('zip',$zip,time() + 60 * 60);
    $address = $_POST['address'];
    setcookie('address',$address,time() + 60 * 60);
    $card_num = $_POST['card_num'];
    setcookie('card_num',$card_num,time() + 60 * 60);
    $card_month = $_POST['card_month'];
    setcookie('card_month',$card_month,time() + 60 * 60);
    $card_year = $_POST['card_year'];
    setcookie('card_year',$card_year,time() + 60 * 60);
    $card_security = $_POST['card_security'];
    setcookie('sec',$card_security,time() + 60 * 60);
    $card_name = $_POST['card_name'];
    setcookie('card_name',$card_name,time() + 60 * 60);
    $gender = $_POST['gender'];
    setcookie('gender',$gender,time() + 60 * 60);

    // 性別の表記を変更
    if($gender == 'M'){
        $gender = '男性';
    }elseif($gender == 'F'){
        $gender = '女性';
    }
}

require_once('./view/conf.php');
?>

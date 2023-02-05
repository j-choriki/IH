console.log('menu');

// ゲストの名前を取得
const loginName = $("#login_name span").text();

if(loginName != 'ゲスト'){
    $('#login').css('display','none');
    $('#logout').css('display','block');
}
else{
    $('#logout').css('display','none');
    $('#login').css('display','block');
}
"use strict";
console.log('mordal');

// 要素の取得
const modalOpen = document.getElementById('openModal');
const modalArea = document.getElementById('modalArea');

    
// ボタンをクリックした後の処理
// モーダルエリアの表示
modalOpen.addEventListener('click', (event) => {
    event.preventDefault();
    // 入力した値の取得
    let name = $('input[name="tx_name"]').val();
    let explain = $('#textarea').val();
    let price = $('input[name="tx_price"]').val();
    let insert_num = 0; 
    const file1 = $('#input-files1').prop('files')[0];
    const file2 = $('#input-files2').prop('files')[0];
    const file3 = $('#input-files3').prop('files')[0];

    if(typeof(file1) != 'undefined'){
        const fileName1 = file1.name;
        const text = $('#item_file').append('<span>'+ fileName1+'</span>');
        text.css('color', '#000');
    }

    if(typeof(file2) != 'undefined'){
        const fileName2 = file2.name;
        const text = $('#item_file').append('<span>'+ fileName2+'</span>');
        text.css('color', '#000');
    }

    if(typeof(file3) != 'undefined'){
        const fileName3 = file3.name;
        const text = $('#item_file').append('<span>'+ fileName3+'</span>');
        text.css('color', '#000');
    }

    if(typeof(file1) == 'undefined' && typeof(file2) == 'undefined' && typeof(file3) == 'undefined'){
        $('#item_file').
        text('画像を添付してください').
        css('color', 'red'); 
    }




    let fd = new FormData();
    fd.append("upfile", file1);
    fd.append("upfile", file2);
    fd.append("upfile", file3);

    $('#btn').on('click', function () {
        $.ajax({
            url:'information.php',
            type:'post',
            data: fd,
            processData: false,
            contentType: false,
            cache: false,
        }).done(function (data) {
            // 成功時の処理
            console.log('contact correct');
        }).fail(function() {
        // 失敗時の処理
         console.log('contact error');
        });
});

    // 空白チェック
    if(name == '')
    {
        $('#item_name')
            .css('color','red');
        name = '商品名を入力してください';
    }
    else{
        $('#item_name')
        .css('color','black');
        insert_num++;
    }

    if(explain == ''){
        $('#item_explain')
            .css('color','red');
        explain = '商品説明を入力してください';
    }
    else{
        $('#item_explain')
        .css('color','black');
        insert_num++;
    }

    if(price == ''){
        $('#item_price')
            .css('color','red');
        price = '価格を入力してください';
    }
    else{
        $('#item_price')
        .css('color','black');
        insert_num++;
    }

    if(insert_num == 3){
        // 送信ボタンの活性化
        $('#btn').removeAttr('disabled');
    }

    // 値を挿入
    const item_name  = $('#item_name').text(name);
    const item_explan  = $('#item_explain').text(explain);
    const item_price  = $('#item_price').text(price);

    // modalArea.style.display = 'block';
    $("#modalArea").fadeIn(200);
});


// モーダルエリアを閉じる
const modalClose1 = document.getElementById('closeModal');
modalClose1.addEventListener('click',() => {
    modalArea.style.display = 'none';
});

const modalClose2 = document.getElementById('modalBg');
modalClose2.addEventListener('click',() => {
    modalArea.style.display = 'none';
});



// 共通部
$(".openbtn").click(function () {//ボタンがクリックされたら
    $(this).toggleClass('active');//ボタン自身にactiveクラスを付与し
    $("#g-nav").toggleClass('panelactive');//ナビゲーションにpanaelactiveクラスを付与
});

$("#g-nav a").click(function () {//ナビゲーションのリンクがクリックされたら
    $(".openbtn").removeClass('active');//ボタンのactiveクラスを除去し
    $("#g-nav").removeClass('panelactive');//ナビーゲーションのpanaelactiveクラスも除去
});

$(function(){
    $(".slider").slick({
        infinite:true, //スライドのループ
        slidesToShow: 3, //3つ画像を表示
        slidesToScroll: 1, //スライドした際にスクロールされるスライド数を指定
        arrows:false,//矢印
        dots:true, //画像下の丸ボタン
        autoplay: true, //自動スクロール
        autoplaySpeed: 2900, //スライドの自動再生時のインターバル(ミリ秒)
        centerMode:true, //スライドを中央に表示
        centerPadding: '100px', //センターモード時のスライドの左右paddingを指定
        useCSS: true, //CSS transitionを有効
        variableWidth: false, //スライド幅の自動計算
        centerPadding: "2%",
    });
});

$(function () {
	$(".slider1").slick({
	  autoplay: false,
	  arrows: false,
	  fade: true,
	  asNavFor: ".thumbnail",
	  
	  variableWidth: false, //スライド幅の自動計算
	});
	$(".thumbnail").slick({
	  slidesToShow: 3,
	  asNavFor: ".slider1",
	  focusOnSelect: true,
	  variableWidth: false, //スライド幅の自動計算
	  
	  infinite:false
	});
});

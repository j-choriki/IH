var cnt = 0;
var tmpId = 'tmp-' + cnt;

function loop(event, id){
  for (let file of event.target.files){
    imgPreView(file, id);
  }
  tmpId = 'tmp-' + ++cnt;
}

function imgPreView(file, id){
  let preview = document.getElementById("preview-"+ id);
  let previewImages = document.getElementsByClassName(tmpId);
  let reader = new FileReader();

  // if(previewImages != null) {
  //   for(let img of previewImages){
  //     preview.removeChild(img);
  //   }
  // }

  reader.onload = function(event) {
    var img = document.createElement("img");
    img.setAttribute("src", reader.result);
    img.setAttribute("id", "previewImage-" + id);
    img.setAttribute("class", tmpId);
    preview.appendChild(img);
  };

  reader.readAsDataURL(file);
}

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
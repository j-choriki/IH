console.log("js_load");

const modal = $("#js-modal");
const overlay = $("#js-overlay");
const close = $("#js-close"); // 追記
const open = $("#js-open");
const cancel = $("#js-cancel");

let modalName = document.getElementById("modal_name");
let modalPost = document.getElementById("modal_post");
let modalAddress = document.getElementById("modal_address");
let name = document.getElementById("name");
let post = document.getElementById("post");
let address = document.getElementById("address");

open.on('click', function () {
  console.log("addClass");
  modal.addClass("open"); // modalクラスにopenクラス付与
  overlay.addClass("open"); // overlayクラスにopenクラス付与
  modalName.value=name.value;
  modalPost.value=post.value;
  modalAddress.value=address.value;
});

close.on('click', function () {
  console.log("removeClass");
  modal.removeClass("open"); // modalクラスからopenクラスを外す
  overlay.removeClass("open"); // overlayクラスからopenクラスを外す
  name.value = modalName.value;
  post.value=modalPost.value;
  address.value=modalAddress.value;
});

overlay.on('click', function () {
  console.log("removeClass");
  modal.removeClass("open"); // modalクラスからopenクラスを外す
  overlay.removeClass("open"); // overlayクラスからopenクラスを外す
});

cancel.on('click', function () {
  console.log("removeClass");
  modal.removeClass("open"); // modalクラスからopenクラスを外す
  overlay.removeClass("open"); // overlayクラスからopenクラスを外す
});

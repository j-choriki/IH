/* 
「パスワードの表示/非表示切り替え」
【流れ】
１、目のボタンが押されたら、その要素のnameが「eye-outline」か「eye-off-outline」かをチェックする。
２、inputのtypeを変える。
３、目の切り替えをする。
*/
function switch_pass(state) {
  if (state.children[0].name == 'eye-outline') {
    state.parentNode.children[1].type = 'password';
    state.parentNode.children[2].classList.add('hide');
    state.parentNode.children[3].classList.remove('hide');
  } else if (state.children[0].name == 'eye-off-outline') {
    state.parentNode.children[1].type = 'text';
    state.parentNode.children[2].classList.remove('hide');
    state.parentNode.children[3].classList.add('hide');
  }
}

/* 
「フォーム切り替え」
【流れ】
１、ボタンが押されたら、そのボタンのステータスをチェックする。
２、そのボタンのステータスごとに、フォームを切り替える、必要・不必要なボタンを表示・非表示にする、Step数を変える。
*/
function form_type(state) {
  let form1 = document.querySelector('#form1');
  let form2 = document.querySelector('#form2');
  let form3 = document.querySelector('#form3');
  let back = document.querySelector('#back');
  let next = document.querySelector('#next');
  let conf = document.querySelector('#conf');
  let form_num = document.querySelector('#form_num');
  let next_state = true;

  if (state == 'next') {
    if (form1.className != 'form hide') {
      for (let index = 0; index < 5; index++) {
        next_state = input_chenge(document.querySelector('#form1').children[index].children[1]);
      }
      if (next_state == true) {
        form1.classList.add('hide');
        form2.classList.remove('hide');
        back.classList.remove('hide');
        form_num.textContent = '2';
      }
    } else if (form2.className != 'form hide') {
      for (let index = 0; index < 4; index++) {
        if (index == 0) {
          next_state = input_chenge(document.querySelector('#form2').children[index].children[1]);
          next_state = input_chenge(document.querySelector('#form2').children[index].children[2]);
          next_state = input_chenge(document.querySelector('#form2').children[index].children[3]);
        } else if (index == 2) {
          let zip_state = document.querySelector('#form2').children[index].children[1];
          let param = zip_state.value.replace("-", ""); //入力された郵便番号から「-」を削除
          if (zip_state.value == '') {
            zip_state.parentNode.children[0].classList.add('err');
            zip_state.parentNode.children[2].children[0].classList.remove('hide');
            return false;
          } else {
            let api = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=';
            let url = api + param;

            fetchJsonp(url, {
              timeout: 10000, //タイムアウト時間
            })
              .then((response) => {
                return response.json();
              })
              .then((data) => {
                if (data.status === 400) { //エラー時
                  zip_state.parentNode.children[0].classList.add('err');
                  zip_state.parentNode.children[2].children[0].classList.remove('hide');
                  return false;
                } else if (data.results === null) {
                  zip_state.parentNode.children[0].classList.add('err');
                  zip_state.parentNode.children[2].children[0].classList.remove('hide');
                  return false;
                } else {
                  zip_state.parentNode.children[0].classList.remove('err');
                  zip_state.parentNode.children[2].children[0].classList.add('hide');
                  return true;
                }
              });
          }
        } else {
          next_state = input_chenge(document.querySelector('#form2').children[index].children[1]);
        }
      }
      if (next_state == true) {
        form2.classList.add('hide');
        form3.classList.remove('hide');
        next.classList.add('hide');
        conf.classList.remove('hide');
        form_num.textContent = '3';
      }
    }

  } else if (state == 'back') {
    if (form2.className != 'form hide') {
      form1.classList.remove('hide');
      form2.classList.add('hide');
      back.classList.add('hide');
      form_num.textContent = '1';
    } else if (form3.className != 'form hide') {
      form2.classList.remove('hide');
      form3.classList.add('hide');
      conf.classList.add('hide');
      next.classList.remove('hide');
      form_num.textContent = '2';
    }
  } else if (state == 'conf') {
    for (let index = 0; index < 4; index++) {
      if (index == 1) {
        next_state = input_chenge(document.querySelector('#form3').children[index].children[1]);
        next_state = input_chenge(document.querySelector('#form3').children[index].children[2]);
      } else {
        next_state = input_chenge(document.querySelector('#form3').children[index].children[1]);
      }
    }
    if (next_state == true) {/* Submit */
      document.register.submit();
    }
  }
}

/* 
「入力値チェック(付与+解除)」
【流れ】
１、inputのidを照合する
２、エラー時は文字を赤くしてエラーを表示する
３、エラーが治ったら文字の色を戻してエラー文を隠す
*/
function input_chenge(state) {

  function check_Default(num) {
    if (state.value == '') {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[num].children[0].classList.remove('hide');
      return false;
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[num].children[0].classList.add('hide');
      return true;
    }
  }

  if (state.id == 'name') {/* 名前 */
    return check_Default(2);
  } else if (state.id == 'mail') {/* メールアドレス */
    let mail_Reg = /[!#-9A-~]+@+[a-z0-9]+.+[^.]$/i;/* 文字列@文字列 */
    if (state.value == '') {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[2].children[0].classList.remove('hide');
      return false;
    } else if (!(state.value.match(mail_Reg))) {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[2].children[0].classList.add('hide');
      state.parentNode.children[3].children[0].classList.remove('hide');
      return false;
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[2].children[0].classList.add('hide');
      state.parentNode.children[3].children[0].classList.add('hide');
      return true;
    }
  } else if (state.id == 'tel') {/* 電話番号 */
    let tel = state.value;
    tel = tel.replace('-', '');
    tel = tel.replace('-', '');/* ○○○-○○○○-○○○○ ハイフンありで入力されたときも判断できるように取り除く処理(2回) */
    let tel_Reg = /^0\d{9,10}$/;/* 数字のみの9or10桁 */
    if (tel == '') {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[2].children[0].classList.remove('hide');
      return false;
    } else if (!(tel.match(tel_Reg))) {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[2].children[0].classList.add('hide');
      state.parentNode.children[3].children[0].classList.remove('hide');
      return false;
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[2].children[0].classList.add('hide');
      state.parentNode.children[3].children[0].classList.add('hide');
      return true;
    }
  } else if (state.id == 'pass') {/* パスワード */
    let pass_Reg = /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}$/;/* 半角英小文字大文字数字をそれぞれ1種類以上含む8文字以上100文字以下の正規表現 */
    if (state.value == '') {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[4].children[0].classList.remove('hide');
      return false;
    } else if (!(state.value.match(pass_Reg))) {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[4].children[0].classList.add('hide');
      state.parentNode.children[5].children[0].classList.remove('hide');
      return false;
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[4].children[0].classList.add('hide');
      state.parentNode.children[5].children[0].classList.add('hide');
      return true;
    }
  } else if (state.id == 'pass_conf') {/* パスワード確認 */
    if (state.value == '') {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[4].children[0].classList.remove('hide');
      return false;
    } else if (state.value != document.querySelector('#pass').value) {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[4].children[0].classList.add('hide');
      state.parentNode.children[5].children[0].classList.remove('hide');
      return false;
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[4].children[0].classList.add('hide');
      state.parentNode.children[5].children[0].classList.add('hide');
      return true;
    }
  } else if (state.id == 'year') {/* 生年月日 */
    return check_Default(4);
  } else if (state.id == 'month') {
    return check_Default(4);
  } else if (state.id == 'day') {
    return check_Default(4);
  } else if (state.id == 'gender') {/* 性別 */
    return check_Default(2);
  } else if (state.id == 'zip') {/* 郵便番号 */
    let param = state.value.replace("-", ""); //入力された郵便番号から「-」を削除
    if (state.value == '') {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[2].children[0].classList.remove('hide');
      return false;
    } else {
      let api = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=';
      let url = api + param;

      fetchJsonp(url, {
        timeout: 10000, //タイムアウト時間
      })
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          if (data.status === 400) { //エラー時
            state.parentNode.children[0].classList.add('err');
            state.parentNode.children[2].children[0].classList.remove('hide');
            return false;
          } else if (data.results === null) {
            state.parentNode.children[0].classList.add('err');
            state.parentNode.children[2].children[0].classList.remove('hide');
            return false;
          } else {
            state.parentNode.children[0].classList.remove('err');
            state.parentNode.children[2].children[0].classList.add('hide');
            document.querySelector('#address').value = data.results[0].address1 + data.results[0].address2 + data.results[0].address3;
            input_chenge(document.querySelector('#form2').children[3].children[1]);
            return true;
          }
        });
    }

  } else if (state.id == 'address') {/* 住所 */
    return check_Default(2);
  } else if (state.id == 'card_num') {/* カード番号 */
    if (state.value == '') {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[2].children[0].classList.remove('hide');
      state.parentNode.children[4].classList.add('hide');
      return false;
    } else if (checksum(state.value) == false || checkLength(state.value) == false) {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[2].children[0].classList.add('hide');
      state.parentNode.children[3].children[0].classList.remove('hide');
      state.parentNode.children[4].classList.add('hide');
      return false;
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[2].children[0].classList.add('hide');
      state.parentNode.children[3].children[0].classList.add('hide');
      if (checkLength(state.value) == 'visa') {
        state.parentNode.children[4].classList.remove('hide');
        state.parentNode.children[4].children[0].src = 'img/visa.png';
      } else if (checkLength(state.value) == 'mastercard') {
        state.parentNode.children[4].classList.remove('hide');
        state.parentNode.children[4].children[0].src = 'img/master.png';
      } else if (checkLength(state.value) == 'jcb') {
        state.parentNode.children[4].classList.remove('hide');
        state.parentNode.children[4].children[0].src = 'img/jcb.png';
      } else if (checkLength(state.value) == 'americanexpress') {
        state.parentNode.children[4].classList.remove('hide');
        state.parentNode.children[4].children[0].src = 'img/amex.png';
      } else if (checkLength(state.value) == 'dinersclub') {
        state.parentNode.children[4].classList.remove('hide');
        state.parentNode.children[4].children[0].src = 'img/diners.png';
      }
      return true;
    }
  } else if (state.id == 'card_year') {
    return check_Default(3);
  } else if (state.id == 'card_month') {
    return check_Default(3);
  } else if (state.id == 'card_security') {/* セキュリティコード */
    let card_secu_Reg = /^\d{3,4}$/;/* 数字のみの3or4桁 */
    if (state.value == '') {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[2].children[0].classList.remove('hide');
      return false;
    } else if (!(state.value.match(card_secu_Reg))) {
      state.parentNode.children[0].classList.add('err');
      state.parentNode.children[2].children[0].classList.add('hide');
      state.parentNode.children[3].children[0].classList.remove('hide');
      return false;
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[2].children[0].classList.add('hide');
      state.parentNode.children[3].children[0].classList.add('hide');
      return true;
    }
  } else if (state.id == 'card_name') {/* カード名義 */
    return check_Default(2);
  }
}

/* 
「入力値チェック(解除)」
【流れ】
１、inputのidを照合する
３、エラーが治ったら文字の色を戻してエラー文を隠す
*/
function input_chenge_err(state) {

  function check_Default(num) {
    if (state.value == '') {
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[num].children[0].classList.add('hide');
    }
  }

  if (state.id == 'name') {/* 名前 */
    return check_Default(2);
  } else if (state.id == 'mail') {/* メールアドレス */
    let mail_Reg = /[!#-9A-~]+@+[a-z0-9]+.+[^.]$/i;/* 文字列@文字列 */
    if (state.value == '') {
    } else if (!(state.value.match(mail_Reg))) {
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[2].children[0].classList.add('hide');
      state.parentNode.children[3].children[0].classList.add('hide');
    }
  } else if (state.id == 'tel') {/* 電話番号 */
    let tel = state.value;
    tel = tel.replace('-', '');
    tel = tel.replace('-', '');/* ○○○-○○○○-○○○○ ハイフンありで入力されたときも判断できるように取り除く処理(2回) */
    let tel_Reg = /^0\d{9,10}$/;/* 数字のみの9or10桁 */
    if (tel == '') {
    } else if (!(tel.match(tel_Reg))) {
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[2].children[0].classList.add('hide');
      state.parentNode.children[3].children[0].classList.add('hide');
    }
  } else if (state.id == 'pass') {/* パスワード */
    let pass_Reg = /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,100}$/;/* 半角英小文字大文字数字をそれぞれ1種類以上含む8文字以上100文字以下の正規表現 */
    if (state.value == '') {
    } else if (!(state.value.match(pass_Reg))) {
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[4].children[0].classList.add('hide');
      state.parentNode.children[5].children[0].classList.add('hide');
    }
  } else if (state.id == 'pass_conf') {/* パスワード確認 */
    if (state.value == '') {
    } else if (state.value != document.querySelector('#pass').value) {
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[4].children[0].classList.add('hide');
      state.parentNode.children[5].children[0].classList.add('hide');
    }
  } else if (state.id == 'year') {/* 生年月日 */
    return check_Default(4);
  } else if (state.id == 'month') {
    return check_Default(4);
  } else if (state.id == 'day') {
    return check_Default(4);
  } else if (state.id == 'gender') {/* 性別 */
    return check_Default(2);
  } else if (state.id == 'zip') {/* 郵便番号 */
    let param = state.value.replace("-", ""); //入力された郵便番号から「-」を削除
    if (state.value == '') {
    } else {
      let api = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=';
      let url = api + param;

      fetchJsonp(url, {
        timeout: 10000, //タイムアウト時間
      })
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          if (data.status === 400) { //エラー時
          } else if (data.results === null) {
          } else {
            state.parentNode.children[0].classList.remove('err');
            state.parentNode.children[2].children[0].classList.add('hide');
            document.querySelector('#address').value = data.results[0].address1 + data.results[0].address2 + data.results[0].address3;
            input_chenge(document.querySelector('#form2').children[3].children[1]);
          }
        });
    }

  } else if (state.id == 'address') {/* 住所 */
    return check_Default(2);
  } else if (state.id == 'card_num') {/* カード番号 */
    if (state.value == '') {
    } else if (checksum(state.value) == false || checkLength(state.value) == false) {
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[2].children[0].classList.add('hide');
      state.parentNode.children[3].children[0].classList.add('hide');
      if (checkLength(state.value) == 'visa') {
        state.parentNode.children[4].classList.remove('hide');
        state.parentNode.children[4].children[0].src = 'img/visa.png';
      } else if (checkLength(state.value) == 'mastercard') {
        state.parentNode.children[4].classList.remove('hide');
        state.parentNode.children[4].children[0].src = 'img/master.png';
      } else if (checkLength(state.value) == 'jcb') {
        state.parentNode.children[4].classList.remove('hide');
        state.parentNode.children[4].children[0].src = 'img/jcb.png';
      } else if (checkLength(state.value) == 'americanexpress') {
        state.parentNode.children[4].classList.remove('hide');
        state.parentNode.children[4].children[0].src = 'img/amex.png';
      } else if (checkLength(state.value) == 'dinersclub') {
        state.parentNode.children[4].classList.remove('hide');
        state.parentNode.children[4].children[0].src = 'img/diners.png';
      }
    }
  } else if (state.id == 'card_year') {
    return check_Default(3);
  } else if (state.id == 'card_month') {
    return check_Default(3);
  } else if (state.id == 'card_security') {/* セキュリティコード */
    let card_secu_Reg = /^\d{3,4}$/;/* 数字のみの3or4桁 */
    if (state.value == '') {
    } else if (!(state.value.match(card_secu_Reg))) {
    } else {
      state.parentNode.children[0].classList.remove('err');
      state.parentNode.children[2].children[0].classList.add('hide');
      state.parentNode.children[3].children[0].classList.add('hide');
    }
  } else if (state.id == 'card_name') {/* カード名義 */
    return check_Default(2);
  }
}

/**
 * カード番号の入力ミスを検出する 
 * 
 * @param {string} number カード番号
 * @return {boolean}
*/
function checksum(number) {
  const temp = (typeof number === 'string') ? number : String(number)
  const n = temp
    .split('')              // 1文字ずつ分割し配列に
    .map(a => Number(a))  // 配列の各要素を文字列型→数値型に変換
    .reverse()              // 配列を逆順にする
  let total = 0

  for (let i = 0; i < n.length; i++) {
    if (((i + 1) % 2) === 0) {
      const value = n[i] * 2
      total += (value > 9) ? value - 9 : value
    }
    else {
      total += n[i]
    }
  }

  return (total % 10 === 0)
}

/**
 * カード番号の桁数をチェックする 
 * 
 * @param {string} number カード番号
 * @return {mixed} 正=[visa|mastercard|jcb|americanexpress|dinersclub], 誤=false 
 */
function checkLength(number) {
  const n = (typeof number === 'string') ? number : String(number)
  const between = (value, min, max) => ((min <= Number(value)) && (Number(value) <= max))

  // 13〜16桁の整数で無いならfalseを返して終了
  if (!n.match(/^[0-9]{13,16}$/)) {
    return (false)
  }

  //--------------------------------------
  // カード会社を判定しつつチェック
  //--------------------------------------
  // VISA
  // (13桁はすでに存在しない説があるため後ろに持ってくる)
  if ((n.substr(0, 1) === '4') && ((n.length === 16) || (n.length === 13))) {
    return ('visa')
  }
  // MASTER Card
  else if ((n.match(/^5[1-5]/) || between(n.substr(0, 6), 222100, 272099)) && n.length === 16) {
    return ('mastercard')
  }
  // JCB
  else if (between(n.substr(0, 4), 3528, 3589) && n.length === 16) {
    return ('jcb')
  }
  // American Express
  else if (n.match(/^3[47]/) && n.length === 15) {
    return ('americanexpress')
  }
  // Diners Club
  else if ((between(n.substr(0, 6), 300000, 303574) || n.substr(0, 4) === '3095' || n.match(/^3[689]/)) && (n.length === 14)) {
    return ('dinersclub')
  }

  return (false)
}
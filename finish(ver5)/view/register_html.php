<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>会員登録</title>
	<!-- cssリセット -->
	<link rel="stylesheet" href="./css/destyle.css">
	<!-- スタイルのcss -->
	<link rel="stylesheet" type="text/css" href="./css/register.css">
	<!-- ionicons -->
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<!-- zip -->
	<script src="https://cdn.jsdelivr.net/npm/fetch-jsonp@1.1.3/build/fetch-jsonp.min.js"></script>
	<!-- jQuery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
	<script src="./js/style.js" defer></script>
</head>

<body>
	<header id="header">
		<!-- videoの設定 -->
		<div id="video-area">
        <video id="video" playsinline autoplay muted loop>
            <source src="video/video.mp4" type="video/mp4">
            <source src="video/video.webm" type="video/webm">
        </video>
    </div>
	</header>

	<main>
	 	<div id="logo"><img src="./img/logo3.png" alt="アラペルトロゴ" width="400"></div>
		<div id="form">
			<!-- jsで1/3を変更 -->
			<p>step <span id="form_num">1</span>/3</p>
			<h2>アカウント作成</h2>
			<form action="conf.php" method="POST" name="register">
				<div id="form1" class="form">
					<div>
						<label for="name">氏名</label>
						<input type="text" name="name" id="name" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
						<p><span class="hide">*名前を入力してください。</span></p>
					</div>
					<div>
						<label for="mail">メールアドレス</label>
						<input type="text" name="mail" id="mail" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
						<p><span class="hide">*メールアドレスを入力してください。</span></p>
						<p><span class="hide">*このメールアドレスは使用できません。</span></p>
					</div>
					<div>
						<label for="tel">電話番号</label>
						<input type="text" name="tel" id="tel" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
						<p><span class="hide">*電話番号を入力してください。</span></p>
						<p><span class="hide">*正しい電話番号を入力してください。</span></p>
					</div>
					<div>
						<label for="pass">パスワード</label>
						<input type="password" name="pass" id="pass" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)" placeholder="8文字以上の半角小文字大文字含む英数字">
						<span onclick="switch_pass(this)" class="hide eye">
							<ion-icon name="eye-outline"></ion-icon>
						</span>
						<span onclick="switch_pass(this)" class="eye">
							<ion-icon name="eye-off-outline"></ion-icon>
						</span>
						<p><span class="hide">*パスワードを入力してください。</span></p>
						<p><span class="hide">*正しいパスワードを入力してください。</span></p>
					</div>
					<div>
						<label for="pass_conf">パスワード確認</label>
						<input type="password" name="pass_conf" id="pass_conf" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)" placeholder="8文字以上の半角小文字大文字含む英数字">
						<span onclick="switch_pass(this)" class="hide eye">
							<ion-icon name="eye-outline"></ion-icon>
						</span>
						<span onclick="switch_pass(this)" class="eye">
							<ion-icon name="eye-off-outline"></ion-icon>
						</span>
						<p><span class="hide">*パスワードを入力してください。</span></p>
						<p><span class="hide">*パスワードが一致しません。</span></p>
					</div>
				</div>

				<div id="form2" class="form hide">
					<div>
						<label for="birth">生年月日</label>
						<select name="year" id="year" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
							<option value="">年</option>
							<?php for ($i = 1900; $i < date('Y') + 1; $i++) { ?>
								<option value="<?php print $i; ?>"<?php echo  $i == date('Y') - 20 ? 'selected':'';?> ><?php print $i; ?></option>
							<?php } ?>
						</select>
						<select name="month" id="month" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
							<option value="">月</option>
							<?php for ($i = 1; $i < 13; $i++) { ?>
								<option value="<?php print $i; ?>"><?php print $i; ?></option>
							<?php } ?>
						</select>
						<select name="day" id="day" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
							<option value="">日</option>
							<?php for ($i = 1; $i < 32; $i++) { ?>
								<option value="<?php print $i; ?>"><?php print $i; ?></option>
							<?php } ?>
						</select>
						<p><span class="hide">*生年月日を入力してください。</span></p>
					</div>
					<div>
						<label for="gender">性別</label>
						<select name="gender" id="gender" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
							<option value="">選択してください</option>
							<option value="M">男性</option>
							<option value="F">女性</option>
						</select>
						<p><span class="hide">*生年月日を入力してください。</span></p>
					</div>
					<div>
						<label for="zip">郵便番号</label>
						<input type="text" name="zip" id="zip" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
						<p><span class="hide">*正しい郵便番号を入力してください。</span></p>
					</div>
					<div>
						<label for="address">住所</label>
						<input type="text" name="address" id="address" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
						<p><span class="hide">*住所を入力してください。</span></p>
					</div>
				</div>

				<div id="form3" class="form hide">
					<div>
						<label for="card_num">カード番号</label>
						<input type="text" name="card_num" id="card_num" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
						<p><span class="hide">*カード番号を入力してください。</span></p>
						<p><span class="hide">*正しいカード番号を入力してください。</span></p>
						<span class="eye hide"><img src="" alt=""></span>
					</div>
					<div>
						<label for="card_date">有効期限</label>
						<select name="card_year" id="card_year" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
							<option value="">年</option>
							<?php for ($i = date('Y'); $i < date('Y') + 10; $i++) { ?>
								<option value="<?php print $i; ?>"><?php print $i; ?></option>
							<?php } ?>
						</select>
						<select name="card_month" id="card_month" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
							<option value="">月</option>
							<?php for ($i = 1; $i < 13; $i++) { ?>
								<option value="<?php print $i; ?>"><?php print $i; ?></option>
							<?php } ?>
						</select>
						<p><span class="hide">*有効期限を入力してください。</span></p>
					</div>
					<div>
						<label for="card_security">セキュリティコード</label>
						<input type="text" name="card_security" id="card_security" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
						<p><span class="hide">*セキュリティコードを入力してください。</span></p>
						<p><span class="hide">*正しいセキュリティコードを入力してください。</span></p>
					</div>
					<div>
						<label for="card_name">カード名義</label>
						<input type="text" name="card_name" id="card_name" onkeyup="input_chenge_err(this)" onchange="input_chenge(this)">
						<p><span class="hide">*カード名義を入力してください。</span></p>
					</div>
				</div>
				<button type="button" id="back" name="btn" value="back" class="hide" onclick="form_type('back')">戻る</button>
				<button type="button" id="next" name="btn" value="next" onclick="form_type('next')">次へ</button>
				<button type="button" id="conf" name="btn" value="conf" class="hide" onclick="form_type('conf')">確認</button>
			</form>
		</div>
	</main>

	<footer></footer>
</body>

</html>
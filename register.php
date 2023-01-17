<?php

$result = "";

// 新規登録
if (isset($_POST['submit'])) {
    // 暗号学的にセキュアなパスワードの作成
    $bytes = random_bytes(5);
    $hex = bin2hex($bytes);
    $password = base_convert($hex, 16, 36);
    $email = $_POST['email'];
    $to = $email;
    $subject = "【重要】256ch｜会員登録完了のお知らせ｜初期パスワード添付";
    $message = "$email 様 \n\n平素より256ch.netをご愛顧いただきまして誠にありがとうございます\nお客様の会員登録処理が完了したことをお知らせいたします。\n\n初期パスワード : $password\n\n\n━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n『256教信者が集まる夢の電子掲示板 - 256ch - 』\n■URL : https://256ch.net/\n━━━━━━━━━━━━━━━━━━━━━━━━━━━━";
    $headers = "From: info@256ch.net";

    // メールの送信
    if (mail($to, $subject, $message, $headers)) {
        $result = "<p class='text-success fs-6'>確認メールを送信しました</p>";
    } else {
        $result = "<p class='text-danger fs-6'>メールの送信に失敗しました<br>誤入力等お確かめの上再度登録してください</p>";
    }

}





?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once __DIR__ . "/static/head/head.php"; ?>
    <title>新規登録｜256channel</title>
</head>
<body>
    <?php include_once __DIR__ . "/static/header/header.php"; ?>

    <div id="login">
        <form name="form-login" action="" method="POST">
            <p class="fs-3 text-light">新規登録</p>
            <ion-icon name="mail-outline"></ion-icon>
            <input type="text" name="email" id="user" placeholder="Email"><br>
            <!--<div class="g-recaptcha" data-sitekey="6LdQNgUkAAAAADuDpwuPAiayncEXsWaeqqsQO1G5"></div>-->
            <input type="submit" name="submit" value="Register">
            <p class="fs-6">既にアカウントをお持ちですか？<a href="./login">ログイン</a></p>
            <br>
            <?php echo $result;?>
        </form>
    </div>
    
    <?php include_once __DIR__ . "/static/footer/footer.php"; ?>
</body>
</html>
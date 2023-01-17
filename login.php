<?php

// ログイン処理
if (isset($_POST['submit'])) {
    
}



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once __DIR__ . "/static/head/head.php"; ?>
    <title>ログインフォーム｜256channel</title>
</head>
<body>
    <?php include_once __DIR__ . "/static/header/header.php"; ?>

    <div id="login">
        <form name="form-login" action="" method="POST">
            <p class="fs-3 text-light">ログイン画面</p>
            <ion-icon name="mail-outline"></ion-icon>
            <input type="text" name="email" id="user" placeholder="Email"><br>
            <ion-icon name="document-lock-outline"></ion-icon>
            <input type="password" name="password" id="pass" placeholder="Password"><br>
            <input type="submit" name="submit" value="Login">
            <p class="fs-6">アカウントをお持ちでないですか？こちらから<a href="./register">アカウントを作成</a></p>
        </form>
    </div>
    
    <?php include_once __DIR__ . "/static/footer/footer.php"; ?>
</body>
</html>
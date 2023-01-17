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
            <input type="submit" name="submit" value="Register">
            <p class="fs-6">既にアカウントをお持ちですか？<a href="./login">ログイン</a></p>
        </form>
    </div>
    
    <?php include_once __DIR__ . "/static/footer/footer.php"; ?>
</body>
</html>
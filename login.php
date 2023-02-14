<?php

session_start();

$result = NULL;


//ログイン状態の場合ログイン後のページにリダイレクト
if (isset($_SESSION["login"])) {
    header("Location: https://256ch.net/logged.php");
    exit();
}

// ログイン処理
if (isset($_POST['submit'])) {
    $conn = mysqli_connect("localhost", "xs810371_256", "f7695c44", "xs810371_256ch");

    $username = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');


    $query = "SELECT * FROM userdata WHERE email='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        //ログイン成功
        $_SESSION["login"] = $_POST['email'];
        header("Location: https://256ch.net/");
    } else {
        //ログイン失敗
        $result = "<p class='text-danger fs-6'>メールアドレス又はパスワードが間違っています</p>";
    }

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
        <form name="form-login" action="?" method="POST">
            <p class="fs-3 text-light">ログイン画面</p>
            <ion-icon name="mail-outline"></ion-icon>
            <input type="text" name="email" id="user" placeholder="Email"><br>
            <ion-icon name="document-lock-outline"></ion-icon>
            <input type="password" name="password" id="pass" placeholder="Password"><br>
            <input type="submit" name="submit" value="Login">
            <p class="fs-6">アカウントをお持ちでないですか？こちらから<a href="./register">アカウントを作成</a></p>
            <br>
            <?php echo $result;?>
        </form>
    </div>
    
    <?php include_once __DIR__ . "/static/footer/footer.php"; ?>
</body>
</html>
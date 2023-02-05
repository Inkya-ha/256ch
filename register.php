<?php
// タイムゾーンをセット
// なんとなく上の方がいいかなって
// by陰キャ男子
date_default_timezone_set("Asia/Tokyo");
?>

<?php
// テーブルを作成する
$servername = "localhost";
$username = "xs810371_256";
$dbpassword = "f7695c44";
$dbname = "xs810371_256ch";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table
$sql = "CREATE TABLE userdata (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    EMAIL VARCHAR(255) NOT NULL,
    PASSWORD VARCHAR(255) NOT NULL,
    DATE TIMESTAMP,
    ADMIN TINYINT(1) DEFAULT 0,
    UUID VARCHAR(255)
    )";

if ($conn->query($sql) === TRUE) {
    // テーブル作成完了
} else {
    // テーブル作成失敗
}

$conn->close();
?>

<?php





$result = NULL;
$password = NULL;

// 新規登録
if (isset($_POST['submit'])) {
    // メールアドレスを変数に格納
    $email = $_POST['email'];

    // 暗号学的にセキュアなパスワードを作成
    $bytes = random_bytes(5);
    $hex = bin2hex($bytes);
    $password = base_convert($hex, 16, 36);

    // アカウントのUUID作成
    function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    $uuid = generateRandomString(8) . "-" . generateRandomString(4) . "-" . generateRandomString(4) . "-" . generateRandomString(4) . "-" . uniqid();


    // メールアドレスの重複チェック
    $servername = "localhost";
    $username = "xs810371_256";
    $dbpassword = "f7695c44";
    $dbname = "xs810371_256ch";
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    $sql = "SELECT EMAIL FROM userdata WHERE LOWER(EMAIL) = LOWER('$email')";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $result = "<p class='text-danger'>既にこのメールアドレスは既に登録されているか無効の可能性があります</p>";
        echo $result;
        exit(); // 中断処理
    } else {
        // insert data into the table
    }
    $conn->close();


    // +記号検知
    if (strpos($email, '+') !== false) {
        $result ="<p class='text-danger'>メールアドレスに使用できない文字が含まれています</p>";
        echo $result;
        exit();
    } else {
        // rest of your code here
    }
    
    
    
    // プログラムの実行日時 / アカウントの作成日時を取得
    $date = date("Y-m-d H:i:s");

    // データベースに情報を登録
    $servername = "localhost";
    $username = "xs810371_256";
    $dbpassword = "f7695c44";
    $dbname = "xs810371_256ch";
    // Create connection
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO userdata (EMAIL, PASSWORD, DATE, ADMIN, UUID)
    VALUES ('$email', '$password', '$date', '$admin', '$uuid')";
    if ($conn->query($sql) === TRUE) {
        // データベース登録完了
    } else {
        // データベース登録エラー
    }

    $conn->close();


    // ユーザーに初期パスワードを送信
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
            <div class="g-recaptcha" data-sitekey="6LdQNgUkAAAAADuDpwuPAiayncEXsWaeqqsQO1G5"></div>
            <input type="submit" name="submit" value="Register">
            <p class="fs-6">既にアカウントをお持ちですか？<a href="./login">ログイン</a></p>
            <br>
            <?php echo $result;?>
        </form>
    </div>
    
    <?php include_once __DIR__ . "/static/footer/footer.php"; ?>
</body>
</html>
<?php 
require_once __DIR__ . "/connect_db.php";//pdo接続用 
require_once __DIR__ . "/class/User.php";//Userクラス 
session_start();
$pdo = connect();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once __DIR__ . "/static/head/head.php"; ?>
    <title>スレッド作成フォーム｜256channel</title>
</head>
<body>
    <?php include_once __DIR__ . "/static/header/header.php"; ?>
    <main>
        <div class="createThread">
            <p class="fs-1">新規スレッド作成</p>
            <div class="createThread-form">
            <form name="create" action="" method="POST">
                <p class="fs-3">タイトル<input class="form-control" type="text" name="title" placeholder="Raspberry Piを買った話" required></p>
                <p class="fs-3">最初の投稿<input class="form-control" type="text" name="body" placeholder="クッソ性能良かったｗ" required></p>
                
                <!--ここに出来ればGoogleのreCAPTCHA-->
                
                <input type="submit" name="submit" class="createBtn" value="作成">
            </form>
            </div>
        </div>
    </main>
    <?php 
        //ユーザーインスタンスの生成
        $user = new User("email",$_SESSION['login']);
        
        
        //1月28日、uruzunyaaメモ。
        //次回、パラメーターがセットされてるか確認し
        //ここから受け取ったタイトルとbodyを基にDBにデータを挿入
        //その後、パラメータを付けてthread.phpをページ遷移


        //メソッドの呼出しの例
        //$uuid = $user->uuid();
    ?>
    
    <?php include_once __DIR__ . "/static/footer/footer.php"; ?>
</body>
</html>`
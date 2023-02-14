<?php
require_once __DIR__ . "/connect_db.php";//pdo接続用 
require_once __DIR__ . "/class/User.php";//Userクラス 
require_once __DIR__ . "/class/Thread.php";//Threadクラス 
$id = $_GET['id'];
session_start();

if(!Thread::is_exist($id)) {
    header("Location: thread_found_failed.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once __DIR__ . "/static/head/head.php"; ?>
    <title>スレッド一覧｜256channel</title>
</head>
<body>
    <?php include_once __DIR__ . "/static/header/header.php"; ?>

    <main>
        <?php if (isset($id)): ?>
            <?php
            //ユーザーのインスタンス生成
            $user = new User("email",$_SESSION['login']);
            //スレッドインスタンス生成
            $thread = new Thread($id);
            //レスの投稿がある場合、レスを投稿
            if (isset($_POST["less"])) {
                $thread->new_less($_POST['less'],$user->uuid());
            }
            //レスのリストを取得
            $lessList=$thread->less_list();
            //レスを表示
            for($i=1;$i<=count($lessList);$i++){
                echo '<p class="fs-1">' . $i . " " . $lessList[$i]['body'] . '</p>';
            }
            if(isset($_SESSION['login'])):?>
                <form name="contribution" action="" method="POST">
                <p class="fs-3">レスを投稿<input class="form-control" type="text" name="less" placeholder="クソリプでも許してあげない" required></p>
                <input type="submit" name="submit" class="createBtn" value="投稿">
                </form>
            <?php endif; ?>
            
            
        <?php else: ?>
            <p class="fs-1">スレッド一覧</p>
            <div class="thread-list">
            <?php
            // ここにスレッドの一覧を表示させるプログラムを書きたい(理想)
            ?>
            </div>
        <?php endif; ?>
    </main>
    
    <?php include_once __DIR__ . "/static/footer/footer.php"; ?>
</body>
</html>

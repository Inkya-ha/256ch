<?php 
require_once __DIR__ . "/connect_db.php";//pdo接続用 
require_once __DIR__ . "/class/User.php";//Userクラス 
require_once __DIR__ . "/class/Thread.php";//Threadクラス 
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
    <?php 
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
    }
    include_once __DIR__ . "/static/header/header.php"; 
    //ユーザーインスタンスの生成
    $user = new User("email",$_SESSION['login']);
    
    if (isset($_POST["title"])) {
        //スレッドリストに追加。
        $currentTime = (new DateTime())->format('y.m.d H:i:s');//現在時刻を取得
        $sql = "INSERT INTO thread_list (title,time,owner_uuid,visit) VALUES (:title,:time,:uuid,0)";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
        $statement->bindValue(':time',$currentTime,PDO::PARAM_STR);
        $statement->bindValue(':uuid',$user->uuid(),PDO::PARAM_STR);
        $statement->execute();

        //スレッドIDを取得
        $threadId = $pdo->lastInsertId();
        $thread = new Thread($threadId);
        $thread->new_less($_POST['body'],$user->uuid());
        header("Location: thread.php?id=" . $threadId);
        exit();
        // print_r('<pre>');
	    // print_r($theardId);
	    // print_r('</pre>');
    }
    ?>
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
    <?php include_once __DIR__ . "/static/footer/footer.php"; ?>
</body>
</html>`
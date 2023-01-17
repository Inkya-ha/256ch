<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once __DIR__ . "/static/head/head.php"; ?>
    <title>トップページ｜256channel</title>
</head>
<body>
    <?php include_once __DIR__ . "/static/header/header.php"; ?>

    <main>
        <p class="fs-1 anim-box zoomin is-animated">
            256教信者
        </p>
        <p class="fs-4 anim-box zoomin is-animated">
            256教信者が集まる夢の電子掲示板
        </p>
        <div style="margin-top: 20px;"></div><hr>
        <div style="margin-top: 10px;"></div>
        <div class="popular-box anim-box slidein is-animated">
            <p class="fs-3 anim-box popup is-animated">人気急上昇スレ</p>
            <?php
            // ここに急上昇スレを表示するプログラムを書きたい(願望)
            ?>
        </div>
    </main>
    
    <?php include_once __DIR__ . "/static/footer/footer.php"; ?>
</body>
</html>
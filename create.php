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
                <p class="fs-3">タイトル<input class="form-control" type="text" name="title" placeholder="Raspberry Piを買った話" required></p>
                <!--ここに出来ればGoogleのreCAPTCHA-->
                
                <input type="submit" name="submit" class="createBtn" value="作成">
            </div>
        </div>
    </main>
    
    <?php include_once __DIR__ . "/static/footer/footer.php"; ?>
</body>
</html>`
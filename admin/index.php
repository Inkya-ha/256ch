<!--

ここの管理システムにはWeb上で様々な情報を管理できるようにしようと思います。
まだログイン機能が出来ていないので作ってくれる方絶賛募集中です。

陰キャ男子

-->

<!DOCTYPE html>
<html lang="ja">
<head>
    <!--HTML基本情報読み込み-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--BootStrap5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--CSS-->
    <link rel="stylesheet" href="../css/style.css">

    <!--GoogleFontsAPI-->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">

    <!--reCAPTCHA-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!--アクセス解析研究所-->
    <script src="//accaii.com/ch256/script.js" async></script><noscript><img src="//accaii.com/ch256/script?guid=on"></noscript>

    <!--タイトル指定-->
    <title>256ch｜管理システム</title>
</head>
<body>
    
    <!--Header-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">256ch｜管理システム</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#STORAGE">Storage</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <main>
        <div class="main-mg-box">
            <p class="fs-1">管理画面</p>
            <div id="STORAGE">
                <div class="text-start text-light">
                    <p class="fs-3">サーバー容量</p>
                    <?php
                    $total_space = disk_total_space("/");
                    $total_space_gb = $total_space / (1024 * 1024 * 1024);
                    echo "<p class='fs-5'>全体容量 : $total_space_gb GB</p>";

                    $free_space = disk_free_space("/");
                    $free_space_gb = $free_space / (1024 * 1024 * 1024);
                    $free_percent = $free_space / $total_space * 100;
                    echo "<p class='fs-5'>空き容量 : $free_space_gb GB ($free_percent %)</p>";

                    $used_space = $total_space - $free_space;
                    $used_space_gb = $used_space / (1024 * 1024 * 1024);
                    $used_percent = 100 - $free_percent;
                    echo "<p class='fs-5'>使用容量 : $used_space_gb GB ($used_percent %)</p>";
                    ?>
                    <p class="fs-6">
                        ※これは貸出サーバーの全体容量です
                    </p>
                </div>
            </div>
            <div style="margin-top: 10vh;"></div>

        </div>
    </main>


    <!--Footer-->
    <div style="margin-top: 100vh;"></div>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
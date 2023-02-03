<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once __DIR__ . "/static/head/head.php"; ?>
    <title>お問い合わせ｜256channel</title>
    <style type="text/css">
        #formWrap {
        width: 700px;
        margin: 0 auto;
        color: #555;
        line-height: 120%;
        font-size: 90%;
    }

    table.formTable {
        width: 100%;
        margin: 0 auto;
        border-collapse: collapse;
    }

    table.formTable td,
    table.formTable th {
        border: 1px solid #ccc;
        padding: 10px;
    }

    table.formTable th {
        width: 30%;
        font-weight: normal;
        background: white;
        text-align: left;
    }

    tr {
        background-color: lavender;
    }

    /*　簡易版レスポンシブ用CSS（必要最低限のみとしています。ブレークポイントも含め自由に設定下さい）　*/
    @media screen and (max-width:572px) {
        #formWrap {
            width: 95%;
            margin: 0 auto;
        }

        table.formTable th,
        table.formTable td {
            width: auto;
            display: block;
        }

        table.formTable th {
            margin-top: 5px;
            border-bottom: 0;
        }

        form input[type="text"],
        form textarea {
            width: 80%;
            padding: 5px;
            font-size: 110%;
            display: block;
        }

        form input[type="submit"],
        form input[type="reset"],
        form input[type="button"] {
            display: block;
            width: 100%;
            height: 40px;
        }
    }
    </style>
</head>
<body>
    <?php include_once __DIR__ . "/static/header/header.php"; ?>

    <main>
        <div id="formWrap">
            <p class="fs-1">お問い合わせ</p>
            <p>下記フォームに必要事項を入力後、確認ボタンを押してください。</p>
            <form method="post" action="mail.php">
                <table class="formTable">
                    <tr>
                        <th>ご用件</th>
                        <td>
                            <select name="ご用件">
                                <option value="">選択してください</option>
                                <option value="ご質問・お問い合わせ">ご質問・お問い合わせ</option>
                                <option value="リンクについて">リンクについて</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>お名前</th>
                        <td>
                            <input size="20" type="text" name="お名前" />※必須
                        </td>
                    </tr>
                    <tr>
                        <th>電話番号（半角）</th>
                        <td>
                            <input size="30" type="text" name="電話番号" />
                        </td>
                    </tr>
                    <tr>
                        <th>Mail（半角）</th>
                        <td>
                            <input size="30" type="text" name="Email" />※必須
                        </td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>
                            <input type="radio" name="性別" value="男" />男　 
                            <input type="radio" name="性別" value="女" />女 
                        </td>
                    </tr>
                    <tr>
                        <th>サイトを知ったきっかけ</th>
                        <td>
                            <input name="サイトを知ったきっかけ[]" type="checkbox" value="友人・知人" />友人・知人　 
                            <input name="サイトを知ったきっかけ[]" type="checkbox" value="検索エンジン" />検索エンジン
                        </td>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容
                            <br />
                        </th>
                        <td>
                            <textarea name="お問い合わせ内容" cols="50" rows="5"></textarea>
                        </td>
                    </tr>
                </table>
                <p align="center">
                    <input type="submit" value="　 確認 　" />　
                    <input type="reset" value="リセット" />
                </p>
            </form>
            <br>
            <p>※IPアドレスを記録しております。いたずらや嫌がらせ等はご遠慮ください</p>
        </div>
    </main>
    
    <?php include_once __DIR__ . "/static/footer/footer.php"; ?>
</body>
</html>
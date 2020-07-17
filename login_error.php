<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ログイン</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <ul>
            <li><a href="login.php">ログイン</a></li>
            <li><a href="log_out.php">ログアウト</a></li>
            <li><a href="register.php">新規登録</a></li>
        </ul>
    </header>
    <main>
        <div class="container" style="width:450px;">
            <div class="centering"><p class="error_message">メールアドレスまたはパスワードが間違っています。</p></div>
            <form class="login" method="post" action="mypage.php">
                <div class="item">
                    <label>メールアドレス</label><br>
                    <input type="text" class="textbox" name="mail" size="35">
                </div>
                <div class="item">
                    <label>パスワード</label><br>
                    <input type="password" class="textbox" name="password" size="35">
                </div>
                <div class="item">
                    <label>
                        <input type="checkbox" class="checkbox" name="keep_login" value="yes">ログイン状態を保持する
                    </label>
                </div>
                <div class="item centering">
                    <input type="submit" class="button" value="ログイン">
                </div>
            </form>
        </div>
    </main>
    <footer class="_bottom">
        © 2018 interNous.Inc. All rights reserved
    </footer>
</body>
</html>
<?php
session_start();
if (isset($_SESSION['id'])) {
    header('Location:mypage.php');
}
?>

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
        <div class="container" style="width: 350px;">
            <form class="login" method="post" action="mypage.php">
                <div class="item">
                    <label>メールアドレス</label><br>
                    <input type="text" class="textbox" name="mail" size="35" value="<?php if(isset($_COOKIE['mail'])){echo $_COOKIE['mail'];} ?>">
                </div>
                <div class="item">
                    <label>パスワード</label><br>
                    <input type="password" class="textbox" name="password" size="35" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>">
                </div>
                <div class="item">
                    <label>
                        <input type="checkbox" class="checkbox" name="keep_login" value="yes"
                            <?php if(isset($_COOKIE['keep_login'])){echo "checked='checked'";} ?>
                        >ログイン状態を保持する
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
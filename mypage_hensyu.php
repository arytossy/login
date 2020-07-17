<?php
mb_internal_encoding("utf8");
session_start();

if (empty($_POST['from_mypage'])) {
    header('location:login_error.php');
}
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>会員情報編集</title>
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
        <div class="container" style="width:600px;">
            <h3>会員情報</h3>
            <p>こんにちは！　<?php echo $_SESSION['name']; ?>さん</p>
            <form method="post" action="mypage_update.php">
                <img class="profile" src="<?php echo $_SESSION['image']; ?>">
                <div class="profile">
                    <p>氏名：<input type="text" class="textbox" name="name" size="35" value="<?php echo $_SESSION['name']; ?>" required></p>
                    <p>メール：<input type="text" class="textbox" name="mail" size="35" value="<?php echo $_SESSION['mail']; ?>" pattern="^[a-z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,3}$" required></p>
                    <p>パスワード：<input type="text" class="textbox" name="password" size="35" value="<?php echo $_SESSION['password']; ?>" pattern="^[a-zA-Z0-9]{6,}$" required></p>
                </div>
                <p><textarea cols="50" rows="5" name="comments"><?php echo $_SESSION['comments']; ?></textarea></p>
                <p class="centering"><input type="submit" class="button" value="この内容に変更する"></p>
            </form>
        </div>
    </main>
    <footer class="_bottom">
        © 2018 interNous.Inc. All rights reserved
    </footer>
</body>
</html>
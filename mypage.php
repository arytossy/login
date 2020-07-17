<?php
mb_internal_encoding("utf8");
session_start();

if (empty($_SESSION['id'])) {

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=arimitsu;", "root", "");
    } catch (PDOException $e) {
        die("
            <p>
                申し訳ありません。一時的にアクセスできません。<br>
                時間をおいて再度お試しください。
            </p>
            <a href='login.php'>ログイン</a>
        ");
    }

    $stmt = $pdo->prepare("select * from login_mypage where mail = ? && password = ?");

    $stmt->bindValue(1, $_POST['mail']);
    $stmt->bindValue(2, $_POST['password']);

    $stmt->execute();
    $pdo = null;

    while ($row = $stmt->fetch()) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['mail'] = $row['mail'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['image'] = $row['image'];
        $_SESSION['comments'] = $row['comments'];
    }

    if (empty($_SESSION['id'])) {
        header('Location:login_error.php');
    }
    
    if (!empty($_POST['keep_login'])) {
        $_SESSION['keep_login'] = $_POST['keep_login'];
    }
    
}

if (!empty($_SESSION['id']) && !empty($_SESSION['keep_login'])) {
    setcookie('mail', $_SESSION['mail'], time()+60*60*24*7);
    setcookie('password', $_SESSION['password'], time()+60*60*24*7);
    setcookie('keep_login', $_SESSION['keep_login'], time()+60*60*24*7);
} else if(empty($_SESSION['keep_login'])) {
    setcookie('mail', '', time()-1);
    setcookie('password', '', time()-1);
    setcookie('keep_login', '', time()-1);
}

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>マイページ</title>
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
        <div class="container" style="width:500px">
            <h3>会員情報</h3>
            <p>こんにちは！　<?php echo $_SESSION['name']; ?>さん</p>
            <img class="profile" src="<?php echo $_SESSION['image']; ?>">
            <div class="profile">
                <p>氏名：<?php echo $_SESSION['name'] ?></p>
                <p>メール：<?php echo $_SESSION['mail'] ?></p>
                <p>パスワード：<?php echo $_SESSION['password'] ?></p>
            </div>
            <p><?php echo $_SESSION['comments'] ?></p>
            <form class="update centering" method="post" action="mypage_hensyu.php">
                <input type="hidden" value="<?php echo rand(1, 10); ?>" name="from_mypage">
                <input type="submit" class="button" value="編集する">
            </form>
        </div>
    </main>
    <footer class="_bottom">
        © 2018 interNous.Inc. All rights reserved
    </footer>
</body>
</html>
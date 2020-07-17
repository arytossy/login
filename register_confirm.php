<?php

$tmp = $_FILES['image']['tmp_name'];
$imageName = $_FILES['image']['name'];
$imagePath = './image/'.$imageName;
move_uploaded_file($tmp, $imagePath);

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>登録内容の確認</title>
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
            <h3>会員登録　確認</h3>
            <p class="centering">こちらの内容で登録してもよろしいでしょうか？</p>
            <p>氏名：<?php echo $_POST['name']; ?></p>
            <p>メール：<?php echo $_POST['mail']; ?></p>
            <p>パスワード：<?php echo $_POST['password']; ?></p>
            <p>プロフィール写真：<?php echo $imageName; ?></p>
            <p>コメント：<?php echo $_POST['comments']; ?></p>
            <div class="centering">
                <form class="return" action="register.php">
                    <input type="submit" class="button gray" value="戻って修正する">
                </form>
                <form class="go" method="post" action="register_insert.php">
                    <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
                    <input type="hidden" name="mail" value="<?php echo $_POST['mail']; ?>">
                    <input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
                    <input type="hidden" name="image" value="<?php echo $imagePath; ?>">
                    <input type="hidden" name="comments" value="<?php echo $_POST['comments']; ?>">
                    <input type="submit" class="button" value="登録する">
                </form>
            </div>
        </div>
    </main>
    <footer class="_bottom">
        © 2018 interNous.Inc. All rights reserved
    </footer>
</body>
</html>
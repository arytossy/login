<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>新規登録</title>
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
            <h3>会員登録</h3>
            <form class="register" method="post" action="register_confirm.php" enctype="multipart/form-data">
                <div class="item">
                    <div class="required">必須</div><label>氏名</label><br>
                    <input type="text" class="textbox" name="name" size="35" required>
                </div>
                <div class="item">
                    <div class="required">必須</div><label>メールアドレス</label><br>
                    <input type="text" class="textbox" name="mail" size="35" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>
                <div class="item">
                    <div class="required">必須</div><label>パスワード（半角英数字6文字以上）</label><br>
                    <input type="password" class="textbox" name="password" id="password" size="35" pattern="^[a-zA-Z0-9]{6,}$" required>
                </div>
                <div class="item">
                    <div class="required">必須</div><label>パスワード確認</label><br>
                    <input type="password" class="textbox" name="pass_confirm" id="confirm" size="35" oninput="ConfirmPassword(this)" required>
                </div>
                <div class="item">
                    <label>プロフィール写真</label><br>
                    <input type="hidden" name="max_file_size" value="1000000">
                    <input type="file" name="image">
                </div>
                <div class="item">
                    <label>コメント</label><br>
                    <textarea cols="35" rows="7" name="comments"></textarea>
                </div>
                <div class="item centering">
                    <input type="submit" class="button" value="登録する">
                </div>
            </form>
        </div>
    </main>
    <footer>
        © 2018 interNous.Inc. All rights reserved
    </footer>
    
    <script>
        function ConfirmPassword(confirm) {
            var input1 = password.value;
            var input2 = confirm.value;
            if (input1 != input2) {
                confirm.setCustomValidity("パスワードが一致しません。");
            } else {
                confirm.setCustomValidity("");
            }
        }
    </script>
</body>
</html>
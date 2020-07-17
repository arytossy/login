<?php
mb_internal_encoding("utf8");
session_start();

try {
    $pdo = new PDO("mysql:host=localhost;dbname=arimitsu;", "root", "");
} catch (PDOException $e) {
    die("
       <p>
        申し訳ありません。サーバーの接続に失敗しました。<br>
        もう一度やり直してください。
       </p> 
       <a href='login.php'>ログイン</a>
    ");
}

$stmtUpdate = $pdo->prepare("update login_mypage set name = ?, mail = ?, password = ?, comments = ? where id = ?");
$stmtUpdate->bindValue(1, $_POST['name']);
$stmtUpdate->bindValue(2, $_POST['mail']);
$stmtUpdate->bindValue(3, $_POST['password']);
$stmtUpdate->bindValue(4, $_POST['comments']);
$stmtUpdate->bindValue(5, $_SESSION['id']);
$stmtUpdate->execute();

$stmtSelect = $pdo->prepare("select * from login_mypage where id = ?");
$stmtSelect->bindValue(1, $_SESSION['id']);
$stmtSelect->execute();

$pdo = null;

foreach ($stmtSelect as $row) {
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['comments'] = $row['comments'];
}

header("Location:mypage.php");

?>
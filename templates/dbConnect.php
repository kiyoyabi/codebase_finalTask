<?php

//    DB接続の際のglobal変数
$db = getDb();

//db接続
$user='twitter';
$password='twitter';
$dbName='Twitter';
$host='localhost:8889';
$dsn="mysql:host={$host};dbname={$dbName};charset=utf8";

$pdo = new PDO($dsn, $user, $password);


//Db接続時に使いまわせるグローバル関数を定義
function getDb(){

    try {
        $user='twitter';
        $password='twitter';
        $dbName='Twitter';
        $host='localhost:8889';
        $dsn="mysql:host={$host};dbname={$dbName};charset=utf8";

        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e) {
        echo '<span class="error">エラーがありました。 </span><br>';
        echo $e->getMessage();
    }
return $pdo;
}

?>



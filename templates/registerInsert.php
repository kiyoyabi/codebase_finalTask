<?php
//     DB接続のファイル読み込み
//    require_once "dbConnect.php";

//    戻るボタンの遷移先URL設定
$goBackURL = "/register";
$goLoginURL = "/login";

//    セッションでサーバ上に情報保持させる
session_start();

//    $famName,$famPassをPOSTされる値に設定
$userName = " ";
$userPass = "　";
//    パスワードの暗号化（phpのデフォルト関数）
$hash = password_hash("$userPass", PASSWORD_DEFAULT) . "\n";

//    formに値が入っていない場合のエラー処理
$error = "家族名・パスワード両方とも入力してください";
if (empty($_POST['userName']) && empty($_POST['userPass'])) {
    echo $error;
} elseif (!isset($_POST['userName'])|| !isset($_POST['userPass'])) {
    echo $error;
} else {
    $userName = $_POST['userName'];
    $userPass = $_POST['userPass'];
    echo $userName . "さん、登録完了です";
    echo "<a href = \"<?php echo $goLoginURL?>\">ログイン画面へ</a>";
}

//    DBにつなぐ
$user = 'twitter';
$password = 'twitter';
$dbName = 'Twitter';
$host = 'localhost:8889';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";


try {
//        プリペアドステートメントを作る
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO user(name,password) VALUE (:userName,:userPass)";
    $stm = $pdo->prepare($sql);



//        プレースホルダを作る
    $stm->bindValue(':userName', $userName, PDO::PARAM_STR);
    $stm->bindValue(':userPass', $hash, PDO::PARAM_INT);

//    var_dump($stm);
//    die;


    if($stm->execute()){
        $sql = "SELECT name from User where name {$userName}";
        $stm  = $pdo->prepare("$sql");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    echo "<a href = \"<?php echo $goLoginURL?>\">ログイン画面へ</a>";
} catch (Exception $e) {
    echo '<span class="error">エラーがありました。 </span><br>';
    echo $e->getMessage();
    echo "<a href = \"<?php echo $goBackURL?>\">戻る</a>";
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <title>登録完了</title>
</head>
<body>

</body>
</html>

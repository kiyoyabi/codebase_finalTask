<?php
//     DB接続のファイル読み込み
    require_once "dbConnect.php";

//    戻るボタンの遷移先URL設定
$goBackURL = "/register";
$goLoginURL = "/login";

//    セッションでサーバ上に情報保持させる
//session_start();

//    formに値が入っていない場合のエラー処理
$error = "家族名・パスワード両方とも入力してください";
$error2 = "UserNameがすでに使われている可能性があります。別のUserNameでお試しください";
if (empty($_POST['userName']) && empty($_POST['userPass'])) {
    echo $error;
} elseif (!isset($_POST['userName']) || !isset($_POST['userPass'])) {
    echo $error,$error2;
} else {
    $userName = $_POST['userName'];
    $userPass = $_POST['userPass'];
    echo $userName . "さん、登録完了です";
    echo "<a href = \"<?php echo $goLoginURL?>\">ログイン画面へ</a>";
}

try{
    //    DBにつなぐ
    $user='twitter';
    $password='twitter';
    $dbName='Twitter';
    $host='localhost:8889';
    $dsn="mysql:host={$host};dbname={$dbName};charset=utf8";

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//    getDb();

    $userPass = $_POST['userName'];
    $userPass = $_POST['userPass'];

    //    パスワードの暗号化（phpのデフォルト関数）
    $hash = password_hash("$userPass", PASSWORD_DEFAULT) . "\n";

    $sql="INSERT INTO user(name,password) VALUES (:userName,:userPass)";
    $stm=$pdo->prepare($sql);
    //        プレースホルダに値をバインドする
    $stm->bindValue(':userName', $userName, PDO::PARAM_STR);
    $stm->bindValue(':userPass', $hash, PDO::PARAM_STR);

    //sql文によって正常にレコードが追加されていたら、全てのレコードを表示
    if($stm->execute()){
    $sql="SELECT * FROM user where name = {$userName}";
    $stm=$pdo->prepare($sql);
    $stm->execute();
    $result=$stm->fetchAll(PDO::FETCH_ASSOC);
    }
    }catch (Exception $e){
    echo '<span class="error">エラーがありました。</span>';
    echo $e->getMessage();
}
?>

<!---->
<!--<!DOCTYPE html>-->
<!--<html lang="ja">-->
<!--<head>-->
<!--    <title>登録完了</title>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--</body>-->
<!--</html>-->

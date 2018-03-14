<?php
//     DB接続のファイル読み込み
    require_once "dbConnect.php";

//    セッションでサーバ上に情報保持させる
session_start();
//server側での情報はcookieとしても暗号化されているよ
//$_COOKIE["PHPSESSID"];　or session_id() と　var_dump( ここに入れる　);　で確認できます

$userName = $_POST['userName'];
$userPass = $_POST['userPass'];

//    パスワードの暗号化（phpのデフォルト関数）
$hash = password_hash("{$userPass}", PASSWORD_DEFAULT) . "\n";

//    formに値が入っていない場合のエラー処理
$error = "<span>家族名・パスワード両方とも入力してください</span><br />";
$error2 = "<span>UserNameがすでに使われている可能性があります。<br />別のUserNameでお試しください</span><br />";
if (empty($_POST['userName']) && empty($_POST['userPass'])) {
    echo $error,"<a href=\"/register\">戻る</a>";
} elseif (empty($_POST['userName']) || empty($_POST['userPass'])) {
    echo $error,$error2,"<a href=\"/register\">戻る</a>";
} else {
    $userName = $_POST['userName'];
    $userPass = $_POST['userPass'];
    echo $userName . "さん、登録完了です";
    echo "<a href=/login>ログイン</a>";
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

    $sql = "INSERT INTO user(name,password) VALUES (:userName, :userPass)";
    $stm = $pdo->prepare($sql);


    //        プレースホルダに値をバインドする
    $stm->bindValue(':userName', $userName, PDO::PARAM_STR);
    $stm->bindValue(':userPass', $hash, PDO::PARAM_STR);
    $stm->execute();
//    tryが実行されなかったらエラーを表示
    }catch (Exception $e){
//    echo '<span class="error">エラーがありました。</span>';
//    echo $e->getMessage();
    $pdo = null;
}


<?php
//     DB接続のファイル読み込み
//    require_once "dbConnect.php";

//    戻るボタンの遷移先URL設定
$goBackURL = "/register";
$goLoginURL = "/login";

//    セッションでサーバ上に情報保持させる
session_start();

//    $famName,$famPassをPOSTされる値に設定
$famName = " ";
$famPass = "　";
//    パスワードの暗号化（phpのデフォルト関数）
$hash = password_hash("$famPass", PASSWORD_DEFAULT) . "\n";

//    formに値が入っていない場合のエラー処理
$error = "家族名・パスワード両方とも入力してください";
if (empty($_POST['famName']) && empty($_POST['famPass'])) {
    echo $error;
} elseif (!isset($_POST['famName'])|| !isset($_POST['famPass'])) {
    echo $error;
} else {
    $famName = $_POST['famName'];
    $famPass = $_POST['famPass'];
    echo $famName . "さん、登録完了です";
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

    $sql = "INSERT INTO family(name) VALUE (:famName)";
    $stm = $pdo->prepare($sql);

//        プレースホルダを作る
    $stm->bindValue(':famName', $famName, PDO::PARAM_STR);
    $stm->bindValue(':famPass', $hash, PDO::PARAM_INT);





    if($stm->execute()){

    }




    $result = $stm->fetchAll(PDO::FETCH_ASSOC);




//        if($stm->execute()){
//            $sql = "select count(*) from family where name = '$famPass";
//            $stm = $pdo->prepare($sql);
//            $stm->execute();
//            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['famPass'] = $famPass;
    echo '<script> alert("登録が完了しました。");location.href="home.php"</script>';

//        }
//        else{
//            echo '<span class="error">追加エラーがありました。 </span><br>';
    echo "<a href = \"<?php echo $goLoginURL?>\">ログイン画面へ</a>";
//        }
//        $db = NULL;
} catch (Exception $e) {
    echo '<span class="error">エラーがありました。 </span><br>';
    echo $e->getMessage();
    echo $goBackURL;
}


$sql = "SELECT count(*) from family where name = '$famName'"
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <title>登録完了</title>
</head>
<body>

<a href="<?php echo $goBackURL ?>">戻る</a>
</body>
</html>

<!--//          すでに使用されているnameの場合の処理-->
<!---->
<!--            $stm=$db->prepare($sql);-->
<!--            $stm->execute();-->
<!--            $result=$stm->fetchAll(PDO::FETCH_ASSOC);-->
<!---->
<!---->
<!--            $sql="select count(*) from family where name = '$famName";-->
<!--VALUES(:famName, :famPass)-->
<!---->
<!--//    ここから先にかく-->
<!--//    $famPass=$_POST['famPass'];-->
<!--//    if($sql = "SELECT count({$famPass}) FROM family WHERE passward = {$famPass}"-->
<!--//    {-->
<!--////        DBに値が入っている場合の処理-->
<!--//        if(count($famPass)>0){-->
<!--//-->
<!--//        }else{-->
<!--////        DBに値がなければINSERT INTOする-->
<!--//            $sql = "INSERT INTO family(name,password) VALUES (':famName',':famPass'; )";-->
<!--//            $stm = $pdo->prepare($sql);-->
<!--//        }-->
<!--//    }-->
<!--//    $sql = "INSERT INTO family(name, password) select ':famName',':famPass' from family where NOT SELECT EXISTS (SELECT * FROM family where name = {$famPass})";-->
<!---->
<!--//    INSERT INTO hoge (X, Y) SELECT 'a', 'b' FROM テーブル名 WHERE NOT SELECT EXISTS(SELECT * FROM テーブル名 WHERE カラム名 = '条件')-->
<!---->
<!--//    var_dump($sql);-->
<!--//    die;-->
<!--//-->
<!--//-->

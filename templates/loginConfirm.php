<?php
//DB接続させる
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

//    ここまでが接続

//    tryが実行されなかったらエラーを表示
}catch (Exception $e){
}


////ログインボタンが押された場合１
//if(isset($_POST['login'])) {
//
//    $userName = $_POST['userName'];
//    $userPass = $_POST['userPass'];
//
//    // クエリの実行
//    $sql = "SELECT * FROM user WHERE name ='$userName'";
//    $stm = $pdo->prepare($sql);
//    $stm->execute();
//    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
//    if (!$result) {
//        print('クエリーが失敗しました。');
//        exit();
//    }
//
//    // パスワード(暗号化済み）とユーザーIDの取り出し
//    while ($row = $result) {
//        $hash = $row['userPass'];
//        $userName = $row['userName'];
//    }
//
//    // データベースの切断
//    $pdo = null;
//
//    // ハッシュ化されたパスワードがマッチするかどうかを確認
//    if (password_verify($password, $hash)) {
//        $_SESSION['user'] = $userName;
//        header("Location: /famPhoto/home");
//        exit;
//    } else {
//        echo "メールアドレスとパスワードが一致しません。";
//    }
//}



// ログインボタンが押された場合２
if (isset($_POST["login"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["userName"])) {  // emptyは値が空のとき
        $error1 = 'UserNameが未入力です。';
        echo $error1;
    } else if (empty($_POST["userPass"])) {
        $error2 = 'UserPassが未入力です。';
        echo $error2;
    }

    if (!empty($_POST["userName"]) && !empty($_POST["userPass"])) {
        // 入力したuserNameを格納
        $userName= $_POST["userName"];

        // 2. userNameとuserPassが入力されていたら認証する(ここが謎、sprintf必要？)
//        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
        $dsn="mysql:host={$host};dbname={$dbName};charset=utf8";


        // 3. エラー処理
        try {
//            $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $stm = $pdo->prepare("SELECT * FROM user WHERE name = ?");
            $stm->execute(array($userid));

            $userPass = $_POST["userPass"];

            if ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($password, $row['password'])) {
                    session_regenerate_id(true);

                    // 入力したuserNameのuserPassを取得
                    $userName = $row['userName'];
                    $sql = "SELECT * FROM user WHERE password = {$userPass}";  //入力したIDからユーザー名を取得
                    $stm = $pdo->prepare($sql);
                    foreach ($stm as $row) {
                        $row['userPass'];  // userPass
                    }
                    $_SESSION["userPass"] = $row['userPass'];
                    header("Location: /famPhoto/home/{$userName}");  // メイン画面へ遷移
                    exit();  // 処理終了
                } else {
                    // 認証失敗
                    $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
                }
            } else {
                // 4. 認証成功なら、セッションIDを新規に発行する
                // 該当データなし
                $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
            }
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            //$errorMessage = $sql;
            // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
            // echo $e->getMessage();
        }
    }
}
?>
?>


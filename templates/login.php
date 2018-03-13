<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>FamTwi</title>
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
</head>
<body>
<h1>FamTwi</h1>
<div>ログイン</div>
<form class="login" method="post" action="/login">
    <div>
        <input type="text" class="loginFamName" name="loginFamName">
    </div>
    <div>
        <input type="text" class="loginFamPass" name="loginFamPass">
    </div>
    <div>
        <input type="submit" value="登録" name="login">
    </div>
    <div>
        <?php
        require_once "dbConnect.php";
        session_start();

        // 既にログインしている場合にはメインページに遷移
        if (isset($_SESSION['id'])) {
            header('Location: /home');
            exit;
        }

        // ログインボタンが押されたら
        if (isset($_POST['login'])) {
            if (empty($_POST['loginFamName'])) {
                $error = 'ユーザーIDが未入力です。';
            } else if (empty($_POST['loginFamPass'])) {
                $error = 'パスワードが未入力です。';
            }
        }
//
//         try{
//            $sqlname = 'SELECT COUNT(*) FROM user WHERE `name` = '$username'';
//            $ss = $pdo->query($sqlname);
//            $count = $ss->fetchColumn();
//            $id = strlen($_POST['password']);
//            cheak($id,$count);
//            $stmt = $pdo->prepare('INSERT INTO user (name, password) VALUES (:username, :password)');
//            $pass = password_hash($password, PASSWORD_DEFAULT);
//            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
//            $stmt->bindParam(':password', $pass, PDO::PARAM_STR);
//            $stmt->execute();
//            $_SESSION['USERID'] = $username;
//            echo '<script>
//            alert("登録が完了しました。");
//            location.href="main.php";
//            </script>';
//             } catch(Exception $e){
//            $error = $e->getMessage();
//             }
//             }

         // 3. エラー処理  こっから先は解読必須！！！！！！！！！！！
//        try {
//
//            $db = [];
//
//            $stmt = $db->prepare('SELECT * FROM family WHERE id = ?');
//            $stmt->execute(array($id));
//
//            $password = $_POST["password"];
//
//            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//                if (password_verify($password, $row['password'])) {
//                    session_regenerate_id(true);
//
//                    // 入力したIDのユーザー名を取得
//                    $id = $row['id'];
//                    $sql = "SELECT * FROM family WHERE id = $id";  //入力したIDからユーザー名を取得
//                    $stmt = $pdo->query($sql);
//                    foreach ($stmt as $row) {
//                        $row['name'];  // ユーザー名
//                    }
//                    $_SESSION["NAME"] = $row['name'];
//                    header("Location: Main.php");  // メイン画面へ遷移
//                    exit();  // 処理終了
//                } else {
//                    // 認証失敗
//                    $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
//                }
//            } else {
//                // 4. 認証成功なら、セッションIDを新規に発行する
//                // 該当データなし
//                $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
//            }
//        } catch (PDOException $e) {
//            $errorMessage = 'データベースエラー';
//            //$errorMessage = $sql;
//            // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
//            // echo $e->getMessage();
//        }

        ?>
    </div>
</form>
<a href="/famTwi">戻る</a>
</body>
</html>

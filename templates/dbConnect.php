<?php

//    DB接続の際のglobal変数
$db = getDb();

//Db接続時に使いまわせるグローバル関数を定義
function getDb(){

    try {
    //    echo "Connected Database Success!!";
    }catch(Exception $e) {
        echo '<span class="error">エラーがありました。 </span><br>';
        echo $e->getMessage();
    }
    return $pdo;
}

?>



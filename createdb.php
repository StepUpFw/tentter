<?
    $db = new SQLite3('system/users.db');
    if(!$db){
        die("データベース接続に失敗しました".$error);
    }
    echo"接続成功\n";
    $db->exec('create table users (mail,uid,pass)');
    if(!$db){
        die('クエリーが失敗しました。'.$error);
    }else{
        echo"usersを作成しました\n";
    }
    $db->exec('create table tempusers (mail,uid,pass,key)');
    if(!$db){
        die('クエリーが失敗しました。'.$error);
    }else{
        echo"tempusersを作成しました\n";
    }
    $db->close();
    echo"切断しました\n";
?>

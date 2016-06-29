<?
    session_start();
    $key = $_GET["key"];
    $db = new SQLite3('system/users.db');
    if(!$db){
        die("データベース接続に失敗しました".$error);
    }
    $sql = "SELECT mail,uid,pass,key FROM tempusers";
    $results = $db->query($sql);
    if(!$results){
        die('クエリーが失敗しました1'.$error);
    }
    while($rows = $results->fetchArray()){
        if($rows['key'] == $key){
            $mail = $rows['mail'];
            $uid = $rows['uid'];
            $pass = $rows['pass'];
        }else{
            die("ユーザー登録に失敗しました1");
        }
    }
    $sql = "INSERT INTO users (mail,uid,pass) VALUES ('$mail','$uid','$pass');";
    $results = $db->query($sql);
    if(!$results){
        $db->close();
        die("ユーザー登録に失敗しました2");
    }else{
        $_SESSION['id'] = $uid;
        $db->close();
    }
    header("Location: http://reizou05.xsrv.jp/tentter/login.php");
  	exit();
?>

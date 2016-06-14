<?
    $mail = htmlspecialchars($_POST['regmail']);
    $uid = htmlspecialchars($_POST['reguserid']);
    $pass = htmlspecialchars($_POST['regpass']);
    $pass1 = MD5($pass);
    $pass2 = 'akira'.$pass1.'takebayashi';
    $super_pass = MD5($pass2);
    $key = sha1(uniqid(rand(),1));
    $db = new SQLite3('system/users.db');
    if(!$db){
        die("データベース接続に失敗しました".$error);
    }
    $sql = 'SELECT mail,uid,pass FROM users';
    $results = $db->query($sql);
    if(!$results){
        die('クエリーが失敗しました。1'.$error);
    }
    while($rows = $results->fetchArray(SQLITE3_ASSOC)){
        if($rows['id'] == $uid){
            die("同じIDが登録されています");
        }
    }
    $sql = "INSERT INTO tempusers (mail,uid,pass,key) VALUES ('$mail','$uid','$super_pass','$key');";
    $results = $db->query($sql);
    if(!$results){
        $db->close();
        die('クエリーが失敗しました。2'.$error);
    }
    $db->close();
    $to = $mail;
    $subject = 'メールアドレス認証お願いします';
    $message = 'http://reizou05.xsrv.jp/tentter/confirm.php?key='.$key."\n上のURLをクリックして本登録を完了してください\n";
    $headers = 'From: info@reizou05.com';
    mail($to,$subject,$message,$headers);
    header("Location: http://reizou05.xsrv.jp/tentter/sign.php?i=confirm");
    exit();
?>

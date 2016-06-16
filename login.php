<?
    session_start();
    if(isset($_SESSION['id'])){
        header("Location: http://reizou05.xsrv.jp/tentter/sign.php?i=success");
        exit();
    }else{
        $uid = htmlspecialchars($_POST['userid']);
        $pass = htmlspecialchars($_POST['pass']);
        $pass1 = MD5($pass);
        $pass2 = 'akira'.$pass1.'takebayashi';
        $super_pass = MD5($pass2);
        $db = new SQLite3('system/users.db');
        if(!$db){
            die("データベース接続に失敗しました".$error);
        }
        $sql = 'SELECT mail,uid,pass FROM users';
        $results = $db->query($sql);
        while($rows = $results->fetchArray(SQLITE3_ASSOC)){
            if($rows['uid'] == $uid && $rows['pass'] == $super_pass){
            }
        }
        $db->close();
        header("Location: http://reizou05.xsrv.jp/tentter/sign.php?i=success");
    }
?>

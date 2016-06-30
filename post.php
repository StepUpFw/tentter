<?
    session_start();
    $uid = $_SESSION["id"];
    $tweet = htmlspecialchars($_POST['tweet']);
    $db = new SQLite3('system/tweet.db');
    if(!$db){
        die('データベースに接続出来ませんでした');
    }
    if($tweet == NULL){
        header("Location: http://reizou05.xsrv.jp/tentter/index.php");
        die();
    }
    $results = $db->query("SELECT id,uid,tweet FROM tweet ORDER BY id DESC");
    $rows = $results->fetchArray();
    $id = $rows['id'] + 1;
    $id = str_pad($id,10,0,STR_PAD_LEFT);
    $tid = sha1(uniqid(rand(),1));
    $sql = "INSERT INTO tweet (id,tid,uid,tweet) VALUES ('$id','$tid','$uid','$tweet');";
    $results = $db->query($sql);
    if(!$results){
        die('クエリーが失敗しました。1'.$error);
    }
    $db->close();
    header("Location: http://reizou05.xsrv.jp/tentter/index.php");
?>

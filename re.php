<?
    session_start();
    $muid = $_SESSION["id"];
    $tid = $_GET['tid'];
    $db = new SQLite3('system/tweet.db');
    if(!$db){
        die('データベースに接続出来ませんでした');
    }
    $results = $db->query("SELECT id,tid,uid,tweet FROM tweet ORDER BY id DESC");
    $rows = $results->fetchArray();
    $id = $rows['id'] + 1;
    $id = str_pad($id,10,0,STR_PAD_LEFT);
    $results = $db->query("SELECT id,tid,uid,tweet FROM tweet");
    while($rows = $results->fetchArray()){
        if($rows['tid'] === $tid){
            $tuid = $rows['uid'];
            $tweet = $rows['tweet'];
        }
    }
    if($tid == ""){
        die("無理です");
    }else{
        $twi = "RT" . " from " . $tuid . ":" . $tweet;
        $tid = sha1(uniqid(rand(),1));
        $sql = "INSERT INTO tweet (id,tid,uid,tweet) VALUES ('$id','$tid','$muid','$twi');";
        $results = $db->query($sql);
    }
    $db->close();
    header("Location: http://reizou05.xsrv.jp/tentter/index.php");
?>

<?
    session_start();
    $muid = $_SESSION["id"];
    $tid = $_GET['tid'];
    $db = new SQLite3('system/tweet.db');
    if(!$db){
        die('データベースに接続出来ませんでした');
    }
    $results = $db->query("SELECT id,tid,uid,tweet FROM tweet");
    while($rows = $results->fetchArray()){
        if($rows['tid'] === $tid){
            $id = $rows['id'];
        }
    }
    $results = $db->query("DELETE FROM tweet WHERE id = " . $id);
    $db->close();
    header("Location: http://reizou05.xsrv.jp/tentter/index.php");
?>

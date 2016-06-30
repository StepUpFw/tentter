<?php
    session_start();
    $uid = $_SESSION["id"];
    if(!isset($uid)){
        header("Location: http://reizou05.xsrv.jp/tentter/sign.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>
    <body>
        <div class="main">
            <p class="id"><? print("ようこそ".$uid."さん"); ?></p>
            <p class="logout"><a href="logout.php">ログアウト</a></p>
            <form action="post.php" method="post">
                <textarea name="tweet" rows="4" cols="90%" required></textarea>
                <input type="submit" value="送信">
            </form>
            <table class="timeline">
                <?
                    $db = new SQLite3('system/tweet.db');
                    if(!$db){
                        die('データベースに接続出来ませんでした');
                    }
                    $results = $db->query("SELECT id,tid,uid,tweet FROM tweet ORDER BY id DESC");
                    while($rows = $results->fetchArray()){
                        print("
                        <tr>
                            <td>".$rows['uid']."</td>
                            <td>".$rows['tweet']."</td>
                            <td><a href=". '"re.php?tid='.$rows['tid'].'"' ."><img src=". '"icon/re.png"' ."></a></td>
                            <td><a href=". '"del.php?tid='.$rows['tid'].'"' ."><img src=". '"icon/del.png"' ."></a></td>
                        </tr>
                        ");
                    }
                    $db->close();
                ?>
            </table>
        </div>
    </body>
</html>

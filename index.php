<?php
    session_start();
    $uid = $_SESSION["id"];
    if(!$uid){
        header("Location: http://reizou05.xsrv.jp/tentter/sign.php");
    }else{
        print("ようこそ".$uid."さん");
    }
?>

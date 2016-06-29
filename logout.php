<?
    session_start();
    $_SESSION = array();
    if (isset($_COOKIE["id"])) {
        setcookie("id", '', time() - 1800, '/');
    }
    session_destroy();
    header("Location: http://reizou05.xsrv.jp/tentter/sign.php");
?>

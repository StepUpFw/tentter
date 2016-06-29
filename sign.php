<?php
    session_start();
    $uid = $_SESSION["id"];
    if(isset($uid)){
        header("Location: http://reizou05.xsrv.jp/tentter/index.php");
    }
?>
<form action="login.php" method="POST">
    <h2>Please sign in</h2>
	<label for="id">Account ID</label>
	<input type="text" name="userid" placeholder="ID" required autofocus>
	<label for="pass">Password</label>
	<input type="password" name="pass" placeholder="Password" required>
	<button type="submit">Sign in</button>
</form>
<form action="reg.php" method="POST">
    <h2>Please sign up</h2>
    <label for="id">E-mail</label>
    <input type="email" name="regmail" placeholder="E-mail" required>
	<label for="id">Account ID</label>
	<input type="text" name="reguserid" placeholder="ID" required>
	<label for="pass">Password</label>
	<input type="password" name="regpass" placeholder="Password" required>
	<button type="submit">Sign up</button>
</form>

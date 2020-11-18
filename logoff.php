<?php

	require_once( 'init.php' );

	unset($_SESSION);
	$_SESSION = array();

	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-42000, '/');
	}

	session_destroy();
?>

	<h1>Fazer novamente o login!</h1>
	<script type="text/JavaScript">
		setTimeout("location = 'index.php'",1000);
	</script>
	<a href="index.php">Clique aqui para iniciar novamente</a>



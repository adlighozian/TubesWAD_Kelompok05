<?php

session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('login','',time() - 86400 );

header("Location: login.php");
exit;

?>
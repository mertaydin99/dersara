<?php
	session_start();
	unset($_SESSION['email']);
	unset($_SESSION['type']);
	unset($_SESSION['logged_in']);
	session_destroy();
	return 1;
?>
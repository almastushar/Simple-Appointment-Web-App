<?php

	if (isset($_COOKIE["UserID"]) && isset($_COOKIE["UserType"])) {
		setcookie("UserID", "", time() - 3600);
		setcookie("UserType", "", time() - 3600);
		session_destroy();
		header("Location: $Login");
	}

?>
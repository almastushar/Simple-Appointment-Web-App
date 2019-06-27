<?php

	if (isset($_COOKIE["UserID"]) && isset($_COOKIE["UserType"])) {
		header("Location: $ToCall");
	}

?>
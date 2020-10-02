<?php
	if (isset($_POST["LoginSubmit"])) {
		$UserName = $_POST["UserName"];
		$Password = $_POST["Password"];
		$Password = md5($Password);
		$Q = mysqli_query($DBCON, "SELECT * FROM userlist WHERE UserName = '$UserName' AND Password = '$Password' AND Existence = '1'");
		$NumRows = mysqli_num_rows($Q);
		if ($NumRows == 1) {
			$Row = mysqli_fetch_assoc($Q);
			$UserID = $Row["UserID"];
			$UserType = $Row["UserType"];
			setcookie("UserID", $UserID, time() + (86400 * 365));
			setcookie("UserType", $UserType, time() + (86400 * 365));
			header("Location: $Contacts");
		}
		else{
			header("Location: index.php?ERR=1");
		}
	}
?>
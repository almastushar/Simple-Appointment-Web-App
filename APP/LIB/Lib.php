<?php
	$Site = "https://almashossain.com";
	$AddNumber = "$Site/index.php?p=AddNumber";
	$Contacts = "$Site/index.php?p=Contacts";
	$ToCall = "$Site/index.php?p=ToCall";
	$AddNumber = "$Site/index.php?p=AddNumber";
	$AddReport = "$Site/index.php?p=AddReport";
	$Login = "$Site/index.php?p=login";
	$ActionLogin = "$Site/index.php?p=ActionLogin";
	$Logout = "$Site/index.php?p=logout";


	$PUBLICDIR = "$Site/PUBLIC";


	function BDDT(){
		$date = new DateTime("now", new DateTimeZone('Asia/Dhaka') );
		return $date->format('Y-m-d H:i:s');
	}
	function Info($DBCON, $ContactListID, $Type){
		$Q = mysqli_query($DBCON, "SELECT * FROM contactlist WHERE ContactListID = '$ContactListID'");
		$Row = mysqli_fetch_assoc($Q);
		if ($Type == "PN") {
			return $Row["PhoneNumber"];
		}
		elseif ($Type == "N") {
			return $Row["Name"];
		}
		elseif ($Type == "PQ") {
			return $Row["PrimaryQuery"];
		}
		elseif ($Type == "UID") {
			return $Row["UserID"];
		}
		elseif ($Type == "C") {
			return $Row["Closed"];
		}
		elseif ($Type == "E") {
			return $Row["Existence"];
		}
	}
?>
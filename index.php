<?php
	# START OB
	ob_start();
	# INIT SESSION
	session_start();
	# CAUTION : REQUIRE ROOT DIRECTORY
	require "root.php";
	# REQUIRE DB CONNECTION LINK
	require(APP_ROOT.'/APP/LIB/DB.php');
	# REQUIRE LIB
	require(APP_ROOT.'/APP/LIB/Lib.php');

	# INITIATE ROUTING
	if (isset($_GET["p"])) {
		if (!empty($_GET["p"])) {
			$p = $_GET["p"];
			if ($p == "login") {
				include(APP_ROOT.'/APP/VIEW/login.php');
			}
			elseif ($p == "ActionLogin"){
				include(APP_ROOT.'/APP/VIEW/ActionLogin.php');
			}
			elseif ($p == "Contacts"){
				include(APP_ROOT.'/APP/VIEW/Contacts.php');
			}
			elseif ($p == "ToCall"){
				include(APP_ROOT.'/APP/VIEW/ToCall.php');
			}
			elseif ($p == "AddNumber"){
				include(APP_ROOT.'/APP/VIEW/AddNumber.php');
			}
			elseif ($p == "AddReport"){
				include(APP_ROOT.'/APP/VIEW/AddReport.php');
			}
			else{

			}
		}
		else{
			include(APP_ROOT.'/APP/VIEW/login.php');
		}
	}
	else{
		include(APP_ROOT.'/APP/VIEW/login.php');
	}

	# END OB
	ob_end_flush();
?>
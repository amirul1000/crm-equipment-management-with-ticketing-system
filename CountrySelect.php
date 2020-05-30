<?php
	session_start();
	ob_start();
	include("common/lib.php");
	include("lib/class.db.php");
	include("common/config.php");
	
	/*if(empty($_SESSION['users_id']))
	{
	   Header("Location: ../login");	 
	}*/
	
	$cmd = $_REQUEST['cmd'];
	
	switch($cmd)
	{
		case"home":
		     $_SESSION['country'] = $_REQUEST['country'];
		     Header("Location:home");
             break;
	   default:
	            include("CountrySelect_view.php");			
	}
?>	
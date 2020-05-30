<?php
	session_start();
	ob_start();
	include("../common/lib.php");
	include("../lib/class.db.php");
	include("../common/config.php");
	
	$cmd = $_REQUEST['cmd'];
	
	
	if(!empty($_SESSION['users_id']))
	{
	   Header("Location: ../home");	 
	}
	
	
	switch($cmd)
	{
	
		case "login":		   
			$info["table"]     = "users";
			$info["fields"]   = array("*");
			$info["where"]    = " 1=1 AND email  LIKE BINARY '".clean($_REQUEST["email"])."' AND password  LIKE BINARY '".clean($_REQUEST["password"])."'";			
			//$info["debug"]    = true;
			$res  = $db->select($info);
			if(count($res)>0)
			{
				$_SESSION["users_id"]   = $res[0]["id"];
				$_SESSION["email"]      = $res[0]["email"];
				$_SESSION["first_name"] = $res[0]["first_name"];
				$_SESSION["last_name"]  = $res[0]["last_name"];
				$_SESSION["users_type"]       = $res[0]["users_type"];
				
				//roles
				if(strlen($res[0]["roles"])>0)
				{
				 $arr3  =  explode(",",$res[0]["roles"]); 
				 foreach($arr3 as $key=>$value)
				 {
					 $_SESSION["roles"][trim($value)] = trim($value);
				 }
				}
				
				//left_menu
				if(strlen($res[0]["left_menu"])>0)
				{
				 $arr4  =  explode(",",$res[0]["left_menu"]); 
				 foreach($arr4 as $key=>$value)
				 {
					 $_SESSION["left_menu"][trim($value)] = trim($value);
				 }
				}
				
				
				if($_REQUEST['cookie_signin'] == 'on')
				{
					setcookie('email', $_REQUEST["email"], time() + (86400 * 30), "/"); // 86400 = 1 day
                    setcookie('password', $_REQUEST["password"], time() + (86400 * 30), "/"); // 86400 = 1 day
				}
				else
				{
				  setcookie("email", "", time() - 3600);
                  setcookie("password", "", time() - 3600);
				}
				
				Header("Location: ../crm/dashboard.php");
			}
			else
			{
				$message="Login fail,Please verify your userid or password";
				include("login_editor.php");
			}
			break;
		case "register_view":	
			   include("register_editor.php");
			   break;
		case "register":
				$first_name = trim($_REQUEST["first_name"]);
				$last_name = trim($_REQUEST["last_name"]);
				$email = trim($_REQUEST["email"]);
				$password = trim($_REQUEST["password"]);
				$user_type = trim($_REQUEST["user_type"]);
				
					unset($info);
					unset($data);
				$info["table"] = "users";
				$info["fields"] = array("users.*"); 
				$info["where"]   = "1 AND  email='".$email."'";	
				$res =  $db->select($info);
				
				if(count($res)==0)
				{
					$info['table']    = "users";
					$data['first_name']   = $first_name;
					$data['last_name']   = $last_name;
					$data['email']   = $email;
					$data['password']   = $password;
					$data['user_type']   = 'client';
					$info['data']     =  $data;
					 $db->insert($info);
					 
					$message = "Registration has been completed successfully";	  
					include("login_editor.php");	
				}
				else
				{
				 	$message = "Error-Duplicate username";
					include("register_editor.php");
				}
			   
			   break;
		case "logout":
			session_destroy();
			unset($_SESSION["users_id"]);
			unset($_SESSION["email"]);
			unset($_SESSION["first_name"]);
			unset($_SESSION["last_name"]);
			unset($_SESSION["user_type"]);
	
			Header("Location:../CountrySelect.php");
			break;
		case "forget_editor":
			include("forget_editor.php");
			break;
		case "forget_pass":
		        $info["table"]     = "users";
				$info["fields"]   = array("*");
				$info["where"]    = " 1=1 AND email  LIKE BINARY '".$_REQUEST["email"]."'";
				$res  = $db->select($info);
				if(count($res)>0)
				{
					$first_name    = $res[0]["first_name"];
					$last_name     = $res[0]["last_name"];
					$email         = $res[0]["email"];
					$password      = $res[0]["password"];
					
					$subject = "Recovery Password from crm";
					
					$body = "Dear $first_name $last_name,<br>
							Your Login information is like below:<br> 
							 Email:$email<br> 
							 password:$password<br><br>
							 
							 Thanks,<br>
							 crm Team";
					//send email
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: crm <info@crm.com>' . "\r\n";
						
					mail($_REQUEST["email"], $subject, $body, $headers);
					$message ="An email has been sent to your E-mail address";	
				}
				else
				{
				   $message = "No email is found with this address";	
				}
				include("forget_editor.php");
				break;
		default :
			include("login_editor.php");
	}
	/*
	  check user plan exits
	*/
	function clean($str) {
				$str = @trim($str);
				if(get_magic_quotes_gpc()) {
					$str = stripslashes($str);
				}
				$str = stripslashes($str);
				$str = str_replace("'","",$str);
				$str = str_replace('"',"",$str);
				//$str = str_replace("-","",$str);
				$str = str_replace(";","",$str);
				$str = str_replace("or 1","",$str);
				$str = str_replace("drop","",$str);
				
				return mysql_real_escape_string($str);
		}		
?>
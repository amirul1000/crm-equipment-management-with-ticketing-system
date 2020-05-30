<?php
       session_start();
       include("../common/lib.php");
	   include("../lib/class.db.php");
	   include("../common/config.php");
	   
	    if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/");
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "users";
				$data['email']   = $_REQUEST['email'];
                $data['password']   = $_REQUEST['password'];
                $data['title']   = $_REQUEST['title'];
                $data['first_name']   = $_REQUEST['first_name'];
                $data['last_name']   = $_REQUEST['last_name'];
                $data['company']   = $_REQUEST['company'];
                $data['address']   = $_REQUEST['address'];
                $data['city']   = $_REQUEST['city'];
                $data['state']   = $_REQUEST['state'];
                $data['zip']   = $_REQUEST['zip'];
                $data['country_id']   = $_REQUEST['country_id'];
                $data['created_at']   = $_REQUEST['created_at'];
                $data['updated_at']   = $_REQUEST['updated_at'];
                $data['users_type']   = $_REQUEST['users_type'];
				if(isset($_REQUEST['left_menu']))
				{
				 foreach($_REQUEST['left_menu'] as $eachvalue)
				 {
				   $arr_value2[]  = $eachvalue; 
				 }
				  $data['left_menu']   = implode(", ",$arr_value2);
				}
               if(isset($_REQUEST['roles']))
				{
				 foreach($_REQUEST['roles'] as $eachvalue)
				 {
				   $arr_value3[]  = $eachvalue; 
				 }
				  $data['roles']   = implode(", ",$arr_value3);
				}
                $data['status']   = $_REQUEST['status'];
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $db->insert($info);
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				}
				$_SESSION['message'] = "Data has been saved successfully";  
				include("users_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "users";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$email    = $res[0]['email'];
					$password    = $res[0]['password'];
					$title    = $res[0]['title'];
					$first_name    = $res[0]['first_name'];
					$last_name    = $res[0]['last_name'];
					$company    = $res[0]['company'];
					$address    = $res[0]['address'];
					$city    = $res[0]['city'];
					$state    = $res[0]['state'];
					$zip    = $res[0]['zip'];
					$country_id    = $res[0]['country_id'];
					$created_at    = $res[0]['created_at'];
					$updated_at    = $res[0]['updated_at'];
					$users_type    = $res[0]['users_type'];
					$left_menu  = $res[0]['left_menu'];
					$roles    = $res[0]['roles'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("users_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "users";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				$_SESSION['message'] = "Data has been deleted successfully";  
				include("users_list.php");						   
				break; 
		case "delete_all":
		          foreach($_REQUEST['chk'] as $key=>$value)
				  {
					$Id               = $value; 
					  
					$info['table']    = "users";
					$info['where']    = "id='$Id'";
					
					if($Id)
					{
						$db->delete($info);
					}
					$_SESSION['message'] = "Data has been deleted successfully";  
				  }
		        Header("Location: users.php");					   
				break; 							   
         case "list" :    	 
			  if(!empty($_REQUEST['page'])&&$_SESSION["search"]=="yes")
				{
				  $_SESSION["search"]="yes";
				}
				else
				{
				   $_SESSION["search"]="no";
					unset($_SESSION["search"]);
					unset($_SESSION['field_name']);
					unset($_SESSION["field_value"]); 
				}
				include("users_list.php");
				break; 
        case "search_users":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("users_list.php");
				break;  								   
						
	     default :    
		       include("users_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'users'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>

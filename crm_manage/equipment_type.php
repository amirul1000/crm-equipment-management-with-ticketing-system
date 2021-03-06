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
				$info['table']    = "equipment_type";
				$data['equip_type_name']   = $_REQUEST['equip_type_name'];
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
				include("equipment_type_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "equipment_type";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$equip_type_name    = $res[0]['equip_type_name'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("equipment_type_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "equipment_type";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				$_SESSION['message'] = "Data has been deleted successfully";  
				include("equipment_type_list.php");						   
				break; 
		case "delete_all":
		          foreach($_REQUEST['chk'] as $key=>$value)
				  {
					$Id               = $value; 
					  
					$info['table']    = "equipment_type";
					$info['where']    = "id='$Id'";
					
					if($Id)
					{
						$db->delete($info);
					}
					$_SESSION['message'] = "Data has been deleted successfully";  
				  }
		        Header("Location: equipment_type.php");					   
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
				include("equipment_type_list.php");
				break; 
        case "search_equipment_type":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("equipment_type_list.php");
				break;  								   
						
	     default :    
		       include("equipment_type_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'equipment_type'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>

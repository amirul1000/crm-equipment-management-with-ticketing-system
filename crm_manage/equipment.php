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
				$info['table']    = "equipment";
				$data['equipmentid']   = $_REQUEST['equipmentid'];
                $data['site']   = $_REQUEST['site'];
                $data['department']   = $_REQUEST['department'];
                $data['equipment_name']   = $_REQUEST['equipment_name'];
                $data['equipment_type']   = $_REQUEST['equipment_type'];
                     
				if(strlen($_FILES['file_equpment_info']['name'])>0 && $_FILES['file_equpment_info']['size']>0)
				{
					
					if(!file_exists("../equipment_images"))
					{ 
					   mkdir("../equipment_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_equpment_info']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_equpment_info']['name'])));
					}
					$filePath="../equipment_images/".$file;
					move_uploaded_file($_FILES['file_equpment_info']['tmp_name'],$filePath);
					$data['file_equpment_info']="equipment_images/".trim($file);
				}
                $data['notes']   = $_REQUEST['notes'];
                $data['create_by_user_id']   = $_REQUEST['create_by_user_id'];
                $data['date_created']   = $_REQUEST['date_created'];
                $data['date_updated']   = $_REQUEST['date_updated'];
                
				
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
				
				include("equipment_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "equipment";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$equipmentid    = $res[0]['equipmentid'];
					$site    = $res[0]['site'];
					$department    = $res[0]['department'];
					$equipment_name    = $res[0]['equipment_name'];
					$equipment_type    = $res[0]['equipment_type'];
					$file_equpment_info    = $res[0]['file_equpment_info'];
					$notes    = $res[0]['notes'];
					$create_by_user_id    = $res[0]['create_by_user_id'];
					$date_created    = $res[0]['date_created'];
					$date_updated    = $res[0]['date_updated'];
					
				 }
						   
				include("equipment_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "equipment";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("equipment_list.php");						   
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
				include("equipment_list.php");
				break; 
        case "search_equipment":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("equipment_list.php");
				break;  								   
						
	     default :    
		       include("equipment_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'equipment'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>

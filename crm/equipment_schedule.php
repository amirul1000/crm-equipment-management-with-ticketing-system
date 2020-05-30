<?php
	session_start();
	ob_start();
	include("../common/lib.php");
	include("../lib/class.db.php");
	include("../common/config.php");
	
	if(empty($_SESSION['users_id']))
	{
	   Header("Location: ../login");	 
	}
	
	$cmd = $_REQUEST['cmd'];
	
	switch($cmd)
	{
		case 'add': 
				$info['table']    = "schedule";
				if(empty($_REQUEST['id']))
				{
                	$data['ticket_no'] = getMaxId($db);
				}
				$data['site']   = $_REQUEST['site'];
                $data['department']   = $_REQUEST['department'];
                $data['equipment_name']   = $_REQUEST['equipment_name'];
                $data['equipment_type']   = $_REQUEST['equipment_type'];
                $data['date_from']   = $_REQUEST['date_from'];
                //$data['time_from_min']   = $_REQUEST['time_from_min'];
                //$data['time_from_sec']   = $_REQUEST['time_from_sec'];
                $data['date_to']   = $_REQUEST['date_to'];
                //$data['time_to_min']   = $_REQUEST['time_to_min'];
                //$data['time_to_sec']   = $_REQUEST['time_to_sec'];
                $data['duration_option']   = implode(",",$_REQUEST['duration_option']);
				$data['duration']   = get_time_to_days(strtotime($_REQUEST['date_to'])-strtotime($_REQUEST['date_from']));
                $data['notes']   = $_REQUEST['notes'];
				$data['assigned_to_users_id']   = $_REQUEST['assigned_to_users_id'];
                $data['create_by_user_id']   = $_SESSION['users_id'];
				if(empty($_REQUEST['id']))
				{
                	$data['date_open']   = date("Y-m-d H:i:s");
				}
				if($_REQUEST['ticket_status']=='close')
				{
                	$data['date_closed']   = date("Y-m-d H:i:s");
				}
                if(empty($_REQUEST['id']))
				{
                	$data['date_created']   = date("Y-m-d H:i:s");
				}
				else
				{
                	$data['date_updated']   = date("Y-m-d H:i:s");
				}
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
				Header("Location:equipment_schedule.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "schedule";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$site    = $res[0]['site'];
					$department    = $res[0]['department'];
					$equipment_name    = $res[0]['equipment_name'];
					$equipment_type    = $res[0]['equipment_type'];
					$date_from    = $res[0]['date_from'];
					$time_from_min    = $res[0]['time_from_min'];
					$time_from_sec    = $res[0]['time_from_sec'];
					$date_to    = $res[0]['date_to'];
					$time_to_min    = $res[0]['time_to_min'];
					$time_to_sec    = $res[0]['time_to_sec'];
					$duration_option    = $res[0]['duration_option'];
					$duration    = $res[0]['duration'];
					$notes    = $res[0]['notes'];
					$assigned_to_users_id = $res[0]['assigned_to_users_id'];
					$create_by_user_id    = $res[0]['create_by_user_id'];
					$date_created    = $res[0]['date_created'];
					$date_updated    = $res[0]['date_updated'];
				 }	   
				include("equipment_schedule_view.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "schedule";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				$_SESSION['message'] = "Data has been deleted successfully";  
				Header("Location:equipment_schedule.php");								   
				break; 
		case "delete_all":
		        foreach($_REQUEST['chk'] as $key=>$value)
				  {
					$Id               = $value;
					
					$info['table']    = "schedule";
					$info['where']    = "id='$Id'";
					
					if($Id)
					{
						$db->delete($info);
					}
					$_SESSION['message'] = "Data has been deleted successfully";  
				  }
				Header("Location: equipment_schedule.php");					   
				break; 
				
       	case "get_department":
				$info["table"] = "equipment";
				$info["fields"] = array("distinct(equipment.department) department"); 
				$info["where"]   = "1 AND site='".$_REQUEST['site']."' ORDER BY department ASC";
				$arr =  $db->select($info);
	            echo json_encode($arr);
	   		   break;	
	   case "get_equipment_type":
				$info["table"] = "equipment";
				$info["fields"] = array("distinct(equipment.equipment_type) equipment_type"); 
				$info["where"]   = "1 AND site='".$_REQUEST['site']."' AND department='".$_REQUEST['department']."'  ORDER BY equipment_type ASC";
				$arr =  $db->select($info);
	            echo json_encode($arr);
	   		   break;
	   case "get_equipment":
				$info["table"] = "equipment";
				$info["fields"] = array("equipment.*"); 
				$info["where"]   = "1 AND site='".$_REQUEST['site']."' AND 
									  department='".$_REQUEST['department']."' AND 
									  equipment_type='".$_REQUEST['equipment_type']."'  ORDER BY equipment_name ASC";
				$arr =  $db->select($info);
	            echo json_encode($arr);
	   		   break;
      /* case "json":
				if(!empty($_REQUEST['date_from']))
				{
					$whrstr .= " AND  schedule.date_from='".$_REQUEST['date_from']."'";
				}
				
				$info["table"] = "schedule";
				$info["fields"] = array("id,
										 site,
										 department,
										 equipment_name,
										 equipment_type,
										 CONCAT(date_from,' ',time_from_min,':',time_from_sec) date_from,
										 CONCAT(date_to,' ',time_to_min,':',time_to_sec) date_to,
										 duration,
										 notes,
										 date_created
										"); 
				$info["where"]   = "1 $whrstr ORDER BY schedule.id DESC";
				$arr =  $db->select($info);
				foreach($arr as $each)
				{
				  foreach($each as $key=>$value)
				  {
					  $data_arr[] = $value;
				  }
				   $data[] = $data_arr;
				   unset($data_arr);
				}
				$aaData = array("data"=>$data);
				
				echo json_encode($aaData);
	        break; */
	   case "print":
		             // get the HTML
					    ob_start();
					    include(dirname(__FILE__).'/equipment_schedule_print_tpl.php');
					    $html = ob_get_clean();
						
			         	include("../mpdf60/mpdf.php");					
						$mpdf=new mPDF('','A4'); 
						
						//$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
						//$mpdf->mirrorMargins = true;

                       $mpdf->SetDisplayMode('fullpage');
						//==============================================================
						$mpdf->autoScriptToLang = true;
						$mpdf->baseScript = 1;	// Use values in classes/ucdn.php  1 = LATIN
						$mpdf->autoVietnamese = true;
						$mpdf->autoArabic = true;
						
						$mpdf->autoLangToFont = true;
						
						$mpdf->setAutoBottomMargin = 'stretch'; 
						
						/* This works almost exactly the same as using autoLangToFont:
							$stylesheet = file_get_contents('../lang2fonts.css');
							$mpdf->WriteHTML($stylesheet,1);
						*/
						$stylesheet = file_get_contents('../mpdf60/lang2fonts.css');
						$mpdf->WriteHTML($stylesheet,1);
						
						$mpdf->WriteHTML($html);
						//$mpdf->AddPage();
						////////////////////////////////////////////////////////////////						
						$mpdf->Output();
						//$mpdf->Output( $filePath,'S');
						exit;		  
			     
			    break;
	   case "show_perpage":
		            $_SESSION["rowsPerPage3"] = $_REQUEST['rowsPerPage'];
					if($_SESSION["rowsPerPage3"]==10)
					{
					  unset($_SESSION["rowsPerPage3"]); 	
					}
		            Header("Location: equipment_schedule.php");	   
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
				include("equipment_schedule_view.php");
				break; 
        case "search_schedule":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("equipment_schedule_view.php");
				break;  								   
								
	   default:
	            include("equipment_schedule_view.php");			
	}
//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'schedule'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 
 /*
*get time to days
*/
function  get_time_to_days($ttime)
{

  $day    = floor($ttime/(24*60*60));
  $ttime  = $ttime%(24*60*60);

  $hour   = floor($ttime/(60*60));
  $ttime  = $ttime%(60*60);

  $min   = floor($ttime/60);
  $sec   = $ttime%60;

  if($day==1)
  {
    $day = " 1 day ";
  }
  else if($day>1)
  {
    $day = $day ." days ";
  }
  else
  {
    $day = "";
  }

  return  $day. $hour.":".$min.":".$sec;
}	 
?>	
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
	    case "get_department":
				$info["table"] = "equipment";
				$info["fields"] = array("equipment.*"); 
				$info["where"]   = "1 AND site='".$_REQUEST['site']."'";
				$arr =  $db->select($info);
	            echo json_encode($arr);
	   		   break;	
	   case "get_equipment_type":
				$info["table"] = "equipment";
				$info["fields"] = array("equipment.*"); 
				$info["where"]   = "1 AND site='".$_REQUEST['site']."' AND department='".$_REQUEST['department']."'";
				$arr =  $db->select($info);
	            echo json_encode($arr);
	   		   break;
	   case "get_equipment":
				$info["table"] = "equipment";
				$info["fields"] = array("equipment.*"); 
				$info["where"]   = "1 AND site='".$_REQUEST['site']."' AND 
									  department='".$_REQUEST['department']."' AND 
									  equipment_type='".$_REQUEST['equipment_type']."'";
				$arr =  $db->select($info);
	            echo json_encode($arr);
	   		   break;
	   case "process_equipment":
	            $info["table"] = "equipment";
				$info["fields"] = array("equipment.*"); 
				$info["where"]   = "1 AND site='".$_REQUEST['site']."' AND 
									  department='".$_REQUEST['department']."' AND 
									  equipment_type='".$_REQUEST['equipment_type']."' AND
									  equipment_name='".$_REQUEST['equipment_name']."'";
				$arr =  $db->select($info);
	            echo json_encode($arr);
	   		   break;    		   			   	
       case "json":
				if(!empty($_REQUEST['report_site']))
				{
					$whrstr .= " AND  ticket.site='".$_REQUEST['report_site']."'";
				}
				if(!empty($_REQUEST['report_department']))
				{
					$whrstr .= " AND  ticket.department='".$_REQUEST['report_department']."'";
				}
				if(!empty($_REQUEST['report_equipment_type']))
				{
					$whrstr .= " AND  ticket.equipment_type='".$_REQUEST['report_equipment_type']."'";
				}
				if(!empty($_REQUEST['report_equipment_name']))
				{
					$whrstr .= " AND  ticket.equipment_name='".$_REQUEST['report_equipment_name']."'";
				}
				
				if(!empty($_REQUEST['report_status']))
				{
					$whrstr .= " AND  ticket.status='".$_REQUEST['report_status']."'";
				}
				
				if(!empty($_REQUEST['report_priority']))
				{
					$whrstr .= " AND  ticket.priority='".$_REQUEST['report_priority']."'";
				}
				if(!empty($_REQUEST['report_ticket_status']))
				{
					$whrstr .= " AND  ticket.ticket_status='".$_REQUEST['report_ticket_status']."'";
				}
				if(!empty($_REQUEST['report_assigned_to_users_id']))
				{
					$whrstr .= " AND  ticket.assigned_to_users_id='".$_REQUEST['report_assigned_to_users_id']."'";
				}
				if(!empty($_REQUEST['report_date']) )
				{
					$whrstr .= " AND  ticket.date_open BETWEEN '".$_REQUEST['report_date']."' AND '".$_REQUEST['report_date']."'";
				}
				
				$info["table"] = "ticket LEFT OUTER JOIN users ON(ticket.assigned_to_users_id=users.id)";
				$info["fields"] = array("ticket.id",
										"ticket.ticket_no",
										"ticket.date_open",
										"ticket.department",
										"ticket.equipment_name",
										"CONCAT(users.first_name,' ',users.last_name) assigned_to",
										"ticket.date_closed",
										"ticket.status"
										); 
				$info["where"]   = "1 $whrstr ORDER BY ticket.id DESC";
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
	           break;  
	   default:
	            include("dashboard_view.php");			
	}
?>	
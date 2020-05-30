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
	  	   	
       case "json":
				if(!empty($_REQUEST['report_site']))
				{
					$whrstr .= " AND  site='".$_REQUEST['report_site']."'";
				}
				
				
				if(!empty($_REQUEST['table']))
				{
					$table = $_REQUEST['table'];
				}
				
				if($table=="ticket")
				{
					if(!empty($_REQUEST['report_date']) )
					{
						$whrstr .= " AND  date_open BETWEEN '".$_REQUEST['report_date']."' AND '".$_REQUEST['report_date']."'";
					}
				
					
					
					$info["table"] = "$table LEFT OUTER JOIN users ON($table.assigned_to_users_id=users.id)"; 
					$info["fields"] = array("$table.id",
											"ticket_no",
											"date_open",
											"department",
											"equipment_name",
											"CONCAT(users.first_name,' ',users.last_name) assigned_to",
											"$table.status",
											"TO_DAYS( NOW( ) ) - TO_DAYS( date_open ) days_open"
											); 
				   $info["where"]   = "1 $whrstr AND ticket_status='Open' ORDER BY $table.date_open ASC";							
				}
				else if($table=="schedule")
				{
					
				   if(!empty($_REQUEST['report_date']) )
					{
						$whrstr .= " AND  date_open BETWEEN '".$_REQUEST['report_date']."' AND '".$_REQUEST['report_date']."'";
					}	
					else
					{
						$whrstr .= " AND CURDATE()<=date_to ";
					}
					
				  $info["table"] = "$table LEFT OUTER JOIN users ON($table.assigned_to_users_id=users.id)"; 
				  $info["fields"] = array("$table.id",
											"ticket_no",
											"date_open",
											"department",
											"equipment_name",
											"CONCAT(users.first_name,' ',users.last_name) create_by",
											"NULL",
											"0"
											); 	
	              $info["where"]   = "1 $whrstr  ORDER BY $table.id DESC";										
				}
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
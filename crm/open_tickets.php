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
				$info['table']    = "ticket";
				if(empty($_REQUEST['id']))
				{
					$data['ticket_no']      =  getMaxId($db);
				}
				$data['site']      =  $_REQUEST['site'];
                $data['department']   = $_REQUEST['department'];
                $data['equipment_name']   = $_REQUEST['equipment_name'];
                $data['equipment_type']   = $_REQUEST['equipment_type'];				
                $data['status']   = $_REQUEST['status'];
                $data['priority']   = $_REQUEST['priority'];
                $data['summary']   = $_REQUEST['summary'];
                $data['ticket_status']   = $_REQUEST['ticket_status'];
                $data['assigned_to_users_id']   = $_REQUEST['assigned_to_users_id'];
                $data['assigned_by_users_id']   = $_SESSION['assigned_by_users_id'];
				if($_REQUEST['ticket_status']=='Open')
				{
                	$data['date_open']   = date("Y-m-d H:i:s");
				}
				if($_REQUEST['ticket_status']=='Close')
				{
                	$data['date_closed']   = date("Y-m-d H:i:s");
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
				Header("Location:open_tickets.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					  unset($info);
					$info['table']    = "ticket";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$ticket_no    = $res[0]['ticket_no'];
					$site      =  $res[0]['site'];
					$department   = $res[0]['department'];
					$equipment_name   = $res[0]['equipment_name'];
					$equipment_type   = $res[0]['equipment_type'];			
					$status    = $res[0]['status'];
					$priority    = $res[0]['priority'];
					$summary    = $res[0]['summary'];
					$ticket_status    = $res[0]['ticket_status'];
					$assigned_to_users_id    = $res[0]['assigned_to_users_id'];
					$assigned_by_users_id    = $res[0]['assigned_by_users_id'];
					$date_open    = $res[0]['date_open'];
					$date_closed    = $res[0]['date_closed'];
					
					 /* unset($info);
					$info['table']    = "equipment";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$equipment_id;
					$res  =  $db->select($info);
					
					$site    = $res[0]['site'];
					$department    = $res[0]['department'];
					$equipment_name    = $res[0]['equipment_name'];
					$equipment_type    = $res[0]['equipment_type'];*/
					
					
				 }
						   
				include("open_tickets_view.php");						  
				break;   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "ticket";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				$_SESSION['message'] = "Data has been deleted successfully";  
				Header("Location:open_tickets.php");					   
				break; 
		case "delete_all":
		          foreach($_REQUEST['chk'] as $key=>$value)
				  {
					$Id               = $value;
				
					$info['table']    = "ticket";
					$info['where']    = "id='$Id'";
					
					if($Id)
					{
						$db->delete($info);
					}
					$_SESSION['message'] = "Data has been deleted successfully";  
				  }
		        Header("Location: open_tickets.php");					   
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
				include("open_tickets_view.php");
				break; 
        case "search_ticket":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("open_tickets_view.php");
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
									  equipment_type='".$_REQUEST['equipment_type']."' ORDER BY equipment_name ASC";
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
       /*case "json":
				if(!empty($_REQUEST['site']))
				{
					$whrstr .= " AND  ticket.site='".$_REQUEST['site']."'";
				}
				if(!empty($_REQUEST['department']))
				{
					$whrstr .= " AND  ticket.department='".$_REQUEST['department']."'";
				}
				if(!empty($_REQUEST['equipment_type']))
				{
					$whrstr .= " AND  ticket.equipment_type='".$_REQUEST['equipment_type']."'";
				}
				if(!empty($_REQUEST['equipment_name']))
				{
					$whrstr .= " AND  ticket.equipment_name='".$_REQUEST['equipment_name']."'";
				}
				
				$info["table"] = "ticket LEFT OUTER JOIN users ON(ticket.assigned_to_users_id=users.id)";
				$info["fields"] = array("ticket.id",
										"ticket.ticket_no",
										"ticket.date_open",
										"ticket.priority",
										"ticket.ticket_status",
										"ticket.summary",
										"ticket.site",
										"ticket.department",
										"ticket.equipment_type",
										"ticket.equipment_name",
										"CONCAT(users.first_name,' ',users.last_name) assigned_to",
										"ticket.date_closed"
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
	   
	           break;*/
	    case "download_attachment":
					$Id               = $_REQUEST['id'];
					$files_to_zip = array();
					if( !empty($Id ))
					{
						
							 unset($info);
						$info['table']    = "ticket";
						$info['fields']   = array("*");   	   
						$info['where']    =  "id=".$Id;
					   
						$res  =  $db->select($info);
					   
						$Id        = $res[0]['id'];  
						$equipment_id    = $res[0]['equipment_id'];
						
						
						$info['table']    = "equipment";
						$info['fields']   = array("*");
						$info['where']    =  "id=".$equipment_id;
						$res  =  $db->select($info);
							
						
						$file_equpment_info    = '../'.$res[0]['file_equpment_info'];
						if(file_exists($file_equpment_info)&&is_file($file_equpment_info))
						{
							$files_to_zip[] = $file_equpment_info;
						}
						
							//registration more challen
					  unset($info);
					$info['table']    = "equipment_attach";
					$info['fields']   = array("*");   	   
					$info['where'] = "equipment_id='".$equipment_id."'";
					$res2  =  $db->select($info);
					for($i=0;$i<count($res2);$i++)
					{
					    $attach    = '../'.$res2[$i]['attach'];
						if(file_exists($attach)&&is_file($attach))
						{
							$files_to_zip[] = $attach;
						} 
					}
					
					//if true, good; if false, zip creation failed
					$zip_name = '../zip/download_'.$Id.'.zip';
					$result = create_zip($files_to_zip,$zip_name,true);
					}
					//Download
					$path = $zip_name;
					header("Content-type: application/octet-stream");
					header("Content-disposition: attachment; filename=".basename($path));
					header("Content-Transfer-Encoding: binary");
					header("Content-Length: ".filesize("$path"));
					readfile($path);
					break;								   
	   case "print":
		             // get the HTML
					    ob_start();
					    include(dirname(__FILE__).'/open_tickets_print_tpl.php');
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
	    case "download":
		         set_time_limit(10);

				require_once "../php_writeexcel-0.3.0/class.writeexcel_workbook.inc.php";
				require_once "../php_writeexcel-0.3.0/class.writeexcel_worksheet.inc.php";
				
				$fname = tempnam("/tmp", "download.xls");
				$workbook = &new writeexcel_workbook($fname);
				$worksheet =& $workbook->addworksheet();
				
				# Set the column width for columns 1, 2, 3 and 4
				$worksheet->set_column(0, 3, 15);
				
				# Create a format for the column headings
				$header =& $workbook->addformat();
				$header->set_bold();
				$header->set_size(12);
				$header->set_color('black');
				
				# Create a format for the stock price
				$f_price =& $workbook->addformat();
				$f_price->set_align('left');
				$f_price->set_num_format('$0.00');
				
				# Create a format for the stock volume
				$f_volume =& $workbook->addformat();
				$f_volume->set_align('left');
				$f_volume->set_num_format('#,##0');
				
				# Create a format for the price change. This is an example of a conditional
				# format. The number is formatted as a percentage. If it is positive it is
				# formatted in green, if it is negative it is formatted in red and if it is
				# zero it is formatted as the default font colour (in this case black).
				# Note: the [Green] format produces an unappealing lime green. Try
				# [Color 10] instead for a dark green.
				#
				$f_change =& $workbook->addformat();
				$f_change->set_align('left');
				$f_change->set_num_format('[Green]0.0%;[Red]-0.0%;0.0%');
				
				if(isset($_REQUEST['month']) && isset($_REQUEST['year']))
				{
				  $start    = $_REQUEST['year'].'-'.$_REQUEST['month'].'-1'; 
				  $end_day  = cal_days_in_month(CAL_GREGORIAN,$_REQUEST['month'],$_REQUEST['year']);
				  $end      = $_REQUEST['year'].'-'.$_REQUEST['month'].'-'.$end_day; 	
				  $whrstr  .= "AND ticket.date_open BETWEEN '$start'  AND '$end'"; 
				}
				
				
				$info["table"] = "ticket LEFT OUTER JOIN users ON(ticket.assigned_to_users_id=users.id)";
				$info["fields"] = array("ticket.id",
										"ticket.ticket_no",
										"ticket.date_open",
										"ticket.priority",
										"ticket.ticket_status",
										"ticket.summary",
										"ticket.site",
										"ticket.department",
										"ticket.equipment_type",
										"ticket.equipment_name",
										"CONCAT(users.first_name,' ',users.last_name) assigned_to",
										"ticket.date_closed"
										); 
				$info["where"]   = "1 $whrstr ORDER BY id DESC";
				$arr =  $db->select($info);
				
				# Write out the data
				
				$worksheet->write(0, 0, 'Ticket no', $header);
				$worksheet->write(0, 1, 'Date open',   $header);
				$worksheet->write(0, 2, 'Priority',  $header);
				$worksheet->write(0, 3, 'Ticket status',  $header);
				$worksheet->write(0, 4, 'Summary',  $header);
				$worksheet->write(0, 5, 'Site',  $header);
				$worksheet->write(0, 6, 'Department',  $header);
				$worksheet->write(0, 7, 'Equipment type',  $header);
				$worksheet->write(0, 8, 'Equipment name',  $header);
				$worksheet->write(0, 9, 'Assigned to',  $header);
				$worksheet->write(0, 10, 'Date closed',  $header);
				
				
				$k = 0;
				
				for($i=0;$i<count($arr);$i++)
				{
					$k = $k+1;
					$worksheet->write($k, 0, $arr[$i]['ticket_no']);
					$worksheet->write($k, 1, $arr[$i]['date_open']);
					$worksheet->write($k, 2, $arr[$i]['priority']);
					$worksheet->write($k, 3, $arr[$i]['ticket_status']);
					$worksheet->write($k, 4, $arr[$i]['summary']);
					$worksheet->write($k, 5, $arr[$i]['site']);
                    $worksheet->write($k, 6, $arr[$i]['department']);
                    $worksheet->write($k, 7, $arr[$i]['equipment_type']);
                    $worksheet->write($k, 8, $arr[$i]['equipment_name']);
                    $worksheet->write($k, 9, $arr[$i]['assigned_to']);
                    $worksheet->write($k, 10, $arr[$i]['date_closed']);
                   
					
				}
				
				$workbook->close();
				
				header("Content-Type: application/x-msexcel; name=\"equipment.xls\"");
				header("Content-Disposition: inline; filename=\"equipment.xls\"");
				$fh=fopen($fname, "rb");
				fpassthru($fh);
				unlink($fname);
		 
		        break;	
	   case "report":
	            set_time_limit(10);

				require_once "../php_writeexcel-0.3.0/class.writeexcel_workbook.inc.php";
				require_once "../php_writeexcel-0.3.0/class.writeexcel_worksheet.inc.php";
				
				$fname = tempnam("/tmp", "download.xls");
				$workbook = &new writeexcel_workbook($fname);
				$worksheet =& $workbook->addworksheet();
				
				# Set the column width for columns 1, 2, 3 and 4
				$worksheet->set_column(0, 3, 15);
				
				# Create a format for the column headings
				$header =& $workbook->addformat();
				$header->set_bold();
				$header->set_size(12);
				$header->set_color('black');
				
				# Create a format for the stock price
				$f_price =& $workbook->addformat();
				$f_price->set_align('left');
				$f_price->set_num_format('$0.00');
				
				# Create a format for the stock volume
				$f_volume =& $workbook->addformat();
				$f_volume->set_align('left');
				$f_volume->set_num_format('#,##0');
				
				# Create a format for the price change. This is an example of a conditional
				# format. The number is formatted as a percentage. If it is positive it is
				# formatted in green, if it is negative it is formatted in red and if it is
				# zero it is formatted as the default font colour (in this case black).
				# Note: the [Green] format produces an unappealing lime green. Try
				# [Color 10] instead for a dark green.
				#
				$f_change =& $workbook->addformat();
				$f_change->set_align('left');
				$f_change->set_num_format('[Green]0.0%;[Red]-0.0%;0.0%');
				
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
				if(!(empty($_REQUEST['report_date_from']) && empty($_REQUEST['report_date_to'])) )
				{
					$whrstr .= " AND  ticket.date_open BETWEEN '".$_REQUEST['report_date_from']."' AND '".$_REQUEST['report_date_to']."'";
				}
				$info["table"] = "ticket LEFT OUTER JOIN users ON(ticket.assigned_to_users_id=users.id)";
				$info["fields"] = array("ticket.id",
										"ticket.ticket_no",
										"ticket.date_open",
										"ticket.priority",
										"ticket.ticket_status",
										"ticket.summary",
										"ticket.site",
										"ticket.department",
										"ticket.equipment_type",
										"ticket.equipment_name",
										"CONCAT(users.first_name,' ',users.last_name) assigned_to",
										"ticket.date_closed"
										); 
				$info["where"]   = "1 $whrstr ORDER BY id DESC";
				$arr =  $db->select($info);
				# Write out the data
				
				$worksheet->write(0, 0, 'Ticket no', $header);
				$worksheet->write(0, 1, 'Date open',   $header);
				$worksheet->write(0, 2, 'Priority',  $header);
				$worksheet->write(0, 3, 'Ticket status',  $header);
				$worksheet->write(0, 4, 'Summary',  $header);
				$worksheet->write(0, 5, 'Site',  $header);
				$worksheet->write(0, 6, 'Department',  $header);
				$worksheet->write(0, 7, 'Equipment type',  $header);
				$worksheet->write(0, 8, 'Equipment name',  $header);
				$worksheet->write(0, 9, 'Assigned to',  $header);
				$worksheet->write(0, 10, 'Date closed',  $header);
				
				
				$k = 0;
				
				for($i=0;$i<count($arr);$i++)
				{
					$k = $k+1;
					$worksheet->write($k, 0, $arr[$i]['ticket_no']);
					$worksheet->write($k, 1, $arr[$i]['date_open']);
					$worksheet->write($k, 2, $arr[$i]['priority']);
					$worksheet->write($k, 3, $arr[$i]['ticket_status']);
					$worksheet->write($k, 4, $arr[$i]['summary']);
					$worksheet->write($k, 5, $arr[$i]['site']);
                    $worksheet->write($k, 6, $arr[$i]['department']);
                    $worksheet->write($k, 7, $arr[$i]['equipment_type']);
                    $worksheet->write($k, 8, $arr[$i]['equipment_name']);
                    $worksheet->write($k, 9, $arr[$i]['assigned_to']);
                    $worksheet->write($k, 10, $arr[$i]['date_closed']);
                   
					
				}
				
				$workbook->close();
				
				header("Content-Type: application/x-msexcel; name=\"equipment.xls\"");
				header("Content-Disposition: inline; filename=\"equipment.xls\"");
				$fh=fopen($fname, "rb");
				fpassthru($fh);
				unlink($fname);
	   
	   		   break;
		case "show_perpage":
		            $_SESSION["rowsPerPage2"] = $_REQUEST['rowsPerPage'];
					if($_SESSION["rowsPerPage2"]==10)
					{
					  unset($_SESSION["rowsPerPage2"]); 	
					}
		            Header("Location: open_tickets.php");	   
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
				include("open_tickets_view.php");
				break; 
        case "search_ticket":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("open_tickets_view.php");
				break;  									   					   
	   default:
	            $ticket_no = getMaxId($db); 
	            include("open_tickets_view.php");			
	}
 function getMaxId($db)
 {	  
    $sql    = "SHOW TABLE STATUS LIKE 'ticket'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 }
/* creates a compressed zip file */
function create_zip($files = array(),$destination = '',$overwrite = false) {
 	//if the zip file already exists and overwrite is false, return false
 	if(file_exists($destination) && !$overwrite) {
 		return false;
 	}
 	//vars
 	$valid_files = array();
 	//if files were passed in...
 	if(is_array($files)) {
 		//cycle through each file
 		foreach($files as $file) {
 			//make sure the file exists
 			if(file_exists($file)) {
 				$valid_files[] = $file;
 			}
 		}
 	}
 	//if we have good files...
 	if(count($valid_files)) {
 		//create the archive
 		$zip = new ZipArchive();
 		if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
 			return false;
 		}
 		//add the files
 		foreach($valid_files as $file) {
 			$file_name = basename($file);
 			$userfile_extn = explode(".", strtolower($file));
 			$ext = $userfile_extn[count($userfile_extn)-1];
 			$local = $file_name.'.'.$ext;
 			$zip->addFile($file,$local);
 		}
 
 		//debug
 		//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
 
 		//close the zip -- done!
 		$zip->close();
 
 		//check to make sure the file exists
 		return file_exists($destination);
 	}
 	else
 	{
 		return false;
 	}
 }	   	 	
?>	
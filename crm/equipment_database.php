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
				$info['table']    = "equipment";
				if(empty($_REQUEST['id']))
				{
					$data['equipmentid']   = getMaxId($db);
				}
				$data['site']   = $_REQUEST['site'];
                $data['department']   =  !empty($_REQUEST['department'])?$_REQUEST['department']:$_REQUEST['department_other'];
                $data['equipment_name']   = $_REQUEST['equipment_name'];
                $data['equipment_type']   = !empty($_REQUEST['equipment_type'])?$_REQUEST['equipment_type']:$_REQUEST['equipment_type_other'];
				if(strlen($_FILES['file_equpment_info']['name'])>0 && $_FILES['file_equpment_info']['size']>0)
				{
					
					if(!file_exists("../equipment_images"))
					{ 
					   mkdir("../equipment_images",0755);	
					}
					if(empty($Id))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_equpment_info']['name'])));
					}
					else
					{
					  $file=trim($Id)."_".str_replace(" ","_",strtolower(trim($_FILES['file_equpment_info']['name'])));
					}
					$filePath="../equipment_images/".$file;
					move_uploaded_file($_FILES['file_equpment_info']['tmp_name'],$filePath);
					$data['file_equpment_info']="equipment_images/".trim($file);
				} 
				
				$data['notes']   = $_REQUEST['notes'];
				$data['create_by_user_id'] = $_SESSION['users_id'];
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
					 $Id = $db->lastInsert(true);
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				}
				
				if(!empty($_REQUEST['department_other']))
				{
					add_department($db,$_REQUEST['department_other']);
				}
				if(!empty($_REQUEST['equipment_type_other']))
				{
					add_equipment_type($db,$_REQUEST['equipment_type_other']);
				}
				save_submitted_more_files($db,$Id);
			   
			    $_SESSION['message'] = "Data has been saved successfully";  
				Header("Location: equipment_database.php");						   
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
					$file_attach1    = $res[0]['file_attach1'];
					$file_attach2    = $res[0]['file_attach2'];
					$notes           = $res[0]['notes'];
					$date_created    = $res[0]['date_created'];
					$date_updated    = $res[0]['date_updated'];
					
				 }
						   
				include("equipment_database_view.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				//delete file
				 unset($info);
				$info['table']    = "equipment";
				$info['fields']   = array("*");   	   
				$info['where'] = "id='".$Id."'";
				$res2  =  $db->select($info);
				 
				 $file_equpment_info    = '../'.$res2[0]['file_equpment_info'];
				  unlink($file_equpment_info);
				
				//delete data
				  unset($info);
				$info['table']    = "equipment";
				$info['where']    = "id='$Id'";
				if($Id)
				{
					$db->delete($info);
					
					//delete file
					  unset($info);
					$info['table']    = "equipment_attach";
					$info['fields']   = array("*");   	   
					$info['where'] = "equipment_id='".$Id."'";
					$res2  =  $db->select($info);
					for($i=0;$i<count($res2);$i++)
					{
					    $attach    = '../'.$res2[$i]['attach'];
						unlink($attach);
						
						//delete data 
						 unset($info);
						$info['table']    = "equipment_attach";
				        $info['where']    = "equipment_id='$Id'";
					    $db->delete($info);
					}
				}
				$_SESSION['message'] = "Data has been deleted successfully";  
				Header("Location: equipment_database.php");					   
				break; 
		case "delete_all":
		          foreach($_REQUEST['chk'] as $key=>$value)
				  {
					  $Id               = $value;
				
					//delete file
					 unset($info);
					$info['table']    = "equipment";
					$info['fields']   = array("*");   	   
					$info['where'] = "id='".$Id."'";
					$res2  =  $db->select($info);
					 
					 $file_equpment_info    = '../'.$res2[0]['file_equpment_info'];
					  unlink($file_equpment_info);
					
					//delete data
					  unset($info);
					$info['table']    = "equipment";
					$info['where']    = "id='$Id'";
					if($Id)
					{
						$db->delete($info);
						
						//delete file
						  unset($info);
						$info['table']    = "equipment_attach";
						$info['fields']   = array("*");   	   
						$info['where'] = "equipment_id='".$Id."'";
						$res2  =  $db->select($info);
						for($i=0;$i<count($res2);$i++)
						{
							$attach    = '../'.$res2[$i]['attach'];
							unlink($attach);
							
							//delete data 
							 unset($info);
							$info['table']    = "equipment_attach";
							$info['where']    = "equipment_id='$Id'";
							$db->delete($info);
						}
					}
					$_SESSION['message'] = "Data has been deleted successfully";  
				  }
		        Header("Location: equipment_database.php");					   
				break; 
		case "delete_individual":
		         $Id               = $_REQUEST['id'];
				 
		         if($_REQUEST['type']=="stand_alone")
				 {
					 //delete file
					 unset($info);
					$info['table']    = "equipment";
					$info['fields']   = array("*");   	   
					$info['where'] = "id='".$Id."'";
					$res2  =  $db->select($info);
					 
					 $file_equpment_info    = '../'.$res2[0]['file_equpment_info'];
					  unlink($file_equpment_info); 
					 ////////////////////////////////
					  unset($info);
					 $info['table']    = "equipment";
					 $data['file_equpment_info']="";
					 $info['data']     =  $data;
					 $info['where'] = "id=".$Id;
					 $db->update($info);
					 ////////////////////////////////
					  
				 }
				 if($_REQUEST['type']=="attach")
				 {
					//delete file
					  unset($info);
					$info['table']    = "equipment_attach";
					$info['fields']   = array("*");   	   
					$info['where'] = "id='".$_REQUEST['attach_id']."' AND equipment_id='".$Id."'";
					$res2  =  $db->select($info);
					
					$attach    = '../'.$res2[0]['attach'];
					unlink($attach);
					
					//delete data 
					 unset($info);
					$info['table']    = "equipment_attach";
					$info['where']    = "id='".$_REQUEST['attach_id']."' AND equipment_id='".$Id."'";
					$db->delete($info);
					
				 }
				 
		        Header("Location: equipment_database.php?cmd=edit&id=".$Id);	
		        break;	
		case "download_individual":
					$path = '../'.$_REQUEST['file'];
					//Download
					header("Content-type: application/octet-stream");
					header("Content-disposition: attachment; filename=".basename($path));
					header("Content-Transfer-Encoding: binary");
					header("Content-Length: ".filesize("$path"));
					readfile($path);
					break;			
		/*case "json":
				$info["table"] = "equipment";
				$info["fields"] = array("id","equipmentid","site","department","equipment_name","equipment_type","file_equpment_info"); 
				$info["where"]   = "1 ORDER BY id DESC LIMIT 1000";
				$arr =  $db->select($info);
				foreach($arr as $key1=>$each)
				{
				  foreach($each as $key=>$value)
				  {
					  /////////////////
					  if($key=="file_equpment_info")
					  {
						$file_downlaod = $value;  
						$value = '<a href="equipment_database.php?cmd=download_individual&file='.$file_downlaod.'">'.basename($value).'</a>';	
						
							 unset($info);
						$info['table']    = "equipment_attach";
						$info['fields']   = array("*");   	   
						$info['where'] = "equipment_id='".$arr[$key1]['id']."'";
						$res2  =  $db->select($info);
						for($i=0;$i<count($res2);$i++)
						{
							$file_downlaod = $res2[$i]['attach'];
						    $value .= ' <a href="equipment_database.php?cmd=download_individual&file='.$file_downlaod.'">'.basename($res2[$i]['attach']).'</a>';	
						}
					  }
					  ///////////////////////
					  
					  $data_arr[] = $value;
				  }
				   $data[] = $data_arr;
				   unset($data_arr);
				}
				$aaData = array("data"=>$data);
				
		        echo json_encode($aaData);
			    break;*/
		case "print":
		             // get the HTML
					    ob_start();
					    include(dirname(__FILE__).'/equipment_database_print_tpl.php');
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
				
				
				$info["table"] = "equipment";
				$info["fields"] = array("id","equipmentid","site","department","equipment_name","equipment_type","file_equpment_info"); 
				$info["where"]   = "1 ORDER BY id DESC";
				$arr =  $db->select($info);
				
				# Write out the data
				
				$worksheet->write(0, 0, 'Equipment ID', $header);
				$worksheet->write(0, 1, 'Site',   $header);
				$worksheet->write(0, 2, 'Department',  $header);
				$worksheet->write(0, 3, 'Equipment_name',  $header);
				$worksheet->write(0, 4, 'Equipment_type',  $header);
				$worksheet->write(0, 5, 'File equpment info',  $header);
				
				$k = 0;
				
				for($i=0;$i<count($arr);$i++)
				{
					$k = $k+1;
					$worksheet->write($k, 0, $arr[$i]['equipmentid']);
					$worksheet->write($k, 1, $arr[$i]['site']);
					$worksheet->write($k, 2, $arr[$i]['department']);
					$worksheet->write($k, 3, $arr[$i]['equipment_name']);
					$worksheet->write($k, 4, $arr[$i]['equipment_type']);
					$worksheet->write($k, 5, $_SERVER['HTTP_HOST'].'/'.$arr[$i]['file_equpment_info']);
					
					     unset($info);
					$info['table']    = "equipment_attach";
					$info['fields']   = array("*");   	   
					$info['where'] = "equipment_id='".$arr[$i]['id']."'";
					$res2  =  $db->select($info);
					 
					for($j=0;$j<count($res2);$j++)
					{   
						$k = $k+1;
						$worksheet->write($k, 5, $_SERVER['HTTP_HOST'].'/'.$res2[$j]['attach']);
					}
				}
				
				$workbook->close();
				
				header("Content-Type: application/x-msexcel; name=\"equipment.xls\"");
				header("Content-Disposition: inline; filename=\"equipment.xls\"");
				$fh=fopen($fname, "rb");
				fpassthru($fh);
				unlink($fname);
		 
		        break;
		 case "download_attachment":
					$Id               = $_REQUEST['id'];
					$files_to_zip = array();
					if( !empty($Id ))
					{
						$info['table']    = "equipment";
						$info['fields']   = array("*");
						$info['where']    =  "id=".$Id;
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
					$info['where'] = "equipment_id='".$Id."'";
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
		 case "show_perpage":
		            $_SESSION["rowsPerPage1"] = $_REQUEST['rowsPerPage'];
					if($_SESSION["rowsPerPage1"]==10)
					{
					  unset($_SESSION["rowsPerPage1"]); 	
					}
		            Header("Location: equipment_database.php");	   
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
				include("equipment_database_view.php");
				break; 
        case "search_equipment":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("equipment_database_view.php");
				break;  								   
						
	      default:
	            include("equipment_database_view.php");			
	}

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'equipment'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 
 
function add_department($db,$department_other)
{
	$info['table']    = "department";
	$data['dept_name']   = $department_other;
	$data['status']   = 'active';
	$info['data']     =  $data;
	$db->insert($info);
}
				
function  add_equipment_type($db,$equipment_type_other)
{
	$info['table']    = "equipment_type";
	$data['equip_type_name']   = $equipment_type_other;
	$data['status']   = 'active';
	$info['data']     =  $data;
	$db->insert($info);
}
					
 function save_submitted_more_files($db,$Id)
 {
	  //save add more chalan 
	  for($i=0;$i<=count($_FILES['file_attach']);$i++)
	  {
		 // echo $_FILES[$arrData[$i]['bank_challen_no']]['size'];
		if(strlen($_FILES['file_attach']['name'][$i])>0 && $_FILES['file_attach']['size'][$i]>0)
		{   
				unset($info);
				unset($data);
		   $info['table'] = "equipment_attach";
		   $data['equipment_id'] = $Id;
		
			if(!file_exists("../equipment_attach"))
			{ 
			   mkdir("../equipment_attach",0755);	
			}
			
			$file = trim($Id)."_".str_replace(" ","_",strtolower(trim($_FILES['file_attach']['name'][$i])));
			
			$filePath="../equipment_attach/".$file;
			move_uploaded_file($_FILES['file_attach']['tmp_name'][$i],$filePath);
			$data['attach']="equipment_attach/".trim($file);
			$info['data'] = $data;
			$info['debug'] = true;
		    $db->insert($info);
			
		 }  
		  
	  }
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
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>Digital Connect</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../libs/assets/font-awesome/css/font-awesome.css" type="text/css" />
  <link rel="stylesheet" href="../libs/jquery/waves/dist/waves.css" type="text/css" />
  <link rel="stylesheet" href="../styles/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="../libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../styles/font.css" type="text/css" />
  <link rel="stylesheet" href="../styles/app.css" type="text/css" />
  
  <!--<link rel="stylesheet" href="../datepicker/jquery-ui.css">
  <script src="../datepicker/jquery-1.10.2.js"></script>
  <script src="../datepicker/jquery-ui.js"></script>-->
 <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>-->
  
  
   <script src="../js/jquery-1.12.3.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" href="../DataTables-1.10.12/media/css/jquery.dataTables.min.css" type="text/css" />

  

</head>

<body>

<div class="app">
	
    
    
    <?php 
	    include "../includes/nav.php"; 
	?>
    
    <!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="box">
            <!-- Content Navbar -->
            <div class="navbar md-whiteframe-z1 no-radius blue">
                <!-- Open side - Naviation on mobile -->
                <a md-ink-ripple  data-toggle="modal" data-target="#aside" class="navbar-item pull-left visible-xs visible-sm"><i class="mdi-navigation-menu i-24"></i></a>
                <!-- / -->
                <!-- Page title - Bind to $state's title -->
                <div class="navbar-item pull-left h4">Live Data Feed</div>
                <!-- / -->
                
                  <?php
					   include("../includes/crmNav.php");
				   ?>
                <div class="logo pull-right pull-up"><img src="../images/1.png" alt="U" style="height:60px;width: auto;"></div>
            </div>
            
            <div class="box-row">
                <div class="box-cell">
                    <div class="box-inner padding">                             
                        <div class="row">
                            <?php
							  if(isset($_SESSION['message']))
							  {
							?>
                              <div class="col-md-12  panel panel-card">
                                <div align="center" class="alert-success">
                            <?php	  
								  echo  $_SESSION['message'];
								  unset($_SESSION['message']);
							?>
                               </div>
                              </div>
                            <?php	  
							  }
							  
							?>
                            <!--<div class="col-md-12">
                                    <div  align="center">
                                        <?php
									      // include("../includes/crmNav.php");
									    ?>
                                   </div>                                                                   
                                           
                            </div>--><!--End of Column1--> 
                            
                            <div class="col-md-12  panel panel-card">
                                      <fieldset>
                                            <legend><h3>Add Equipment</h3></legend>
                                              <form method="post" action="" enctype="multipart/form-data">
                                              <div class="col-md-12">
                                               <div class="col-md-4">
                                                  <!--<div class="form-group">
                                                      <label class="label">Equipment ID</label>
                                                      <input type="text" name="equipmentid"  value="<?=$equipmentid?>" readonly="readonly">
                                                  </div>--> 
                                                  <div class="form-group">
                                                     <label class="label">Site</label>
                                                      <?php
                                                          $info["table"] = "site";
                                                          $info["fields"] = array("site.*"); 
                                                          $info["where"]   = "1   ORDER BY site_name ASC";
                                                          $arr =  $db->select($info);
                                                      ?> 
                                                      <select name="site" id="site" class="form-control-static" required>
                                                         <option value="">Select..</option>
                                                         <?php
                                                          for($i=0;$i<count($arr);$i++)
                                                            {
                                                         ?>
                                                           <option value="<?=$arr[$i]['site_name']?>" <?php if($arr[$i]['site_name']==$site){ echo "selected";} ?> ><?=$arr[$i]['site_name']?></option>
                                                         <?php
                                                            }
                                                         ?> 													
                                                      </select>
                                                      <?php
                                                          $info["table"] = " department";
                                                          $info["fields"] = array("department.*"); 
                                                          $info["where"]   = "1   ORDER BY dept_name ASC";
                                                          $arr =  $db->select($info);
                                                      ?> 
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="label">Department</label>
                                                      <select name="department" id="department" class="form-control-static">
                                                          <option value="">Select..</option>
                                                         <?php
                                                          for($i=0;$i<count($arr);$i++)
                                                            {
                                                         ?>
                                                           <option value="<?=$arr[$i]['dept_name']?>"  <?php if($arr[$i]['dept_name']==$department){ echo "selected";} ?>  ><?=$arr[$i]['dept_name']?></option>
                                                         <?php
                                                            }
                                                         ?> 				
                                                      </select>
                                                     Or 
                                                          <?php
														  /*$count = 0;
                                                          for($i=0;$i<count($arr);$i++)
                                                            {
																if($arr[$i]['dept_name']!=$department){
																	$count++;
																}
                                                            }
															if($count==count($arr)){
																	$department_other = $department;
																}*/
                                                         ?> 		
                                                     
                                                     <input type="text" name="department_other" class="form-control-static" value="<?php //$department_other?>">
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="label">Equipment</label>
                                                      <input type="text" name="equipment_name" class="form-control-static"  value="<?=$equipment_name?>" required>
                                                  </div>
                                                  <div class="form-group">
                                                       <?php
                                                          $info["table"] = " equipment_type";
                                                          $info["fields"] = array("equipment_type.*"); 
                                                          $info["where"]   = "1   ORDER BY equip_type_name ASC";
                                                          $arr =  $db->select($info);
                                                      ?> 
                                                      <label class="label">Equipment type</label>
                                                      <select name="equipment_type" id="equipment_type" class="form-control-static">
                                                           <option value="">Select..</option>
                                                         <?php
                                                          for($i=0;$i<count($arr);$i++)
                                                            {
                                                         ?>
                                                           <option value="<?=$arr[$i]['equip_type_name']?>"   <?php if($arr[$i]['equip_type_name']==$equipment_type){ echo "selected";} ?>  ><?=$arr[$i]['equip_type_name']?></option>
                                                         <?php
                                                            }
                                                         ?> 				
                                                      </select>
                                                     Or 
                                                         <?php
														  /*$count = 0;
                                                          for($i=0;$i<count($arr);$i++)
                                                            {
																if($arr[$i]['equip_type_name']!=$equipment_type){
																	$count++;
																}
                                                            }
															if($count==count($arr)){
																	$equipment_type_other = $equipment_type;
																}*/
                                                         ?> 		
                                                     <input type="text" name="equipment_type_other" class="form-control-static" value="<?php //$equipment_type_other?>">
                                                  </div>
                                                  <div class="form-group">
                                                     <label class="label">Notes</label> <br>
                                                     <textarea name="notes"  id="notes" style="width:100%;height:100px;"><?=$notes?></textarea>
                                                  </div>
                                               </div>
                                             
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                    <label class="label">Equipment info</label> 
                                                       <input type="file" name="file_equpment_info"  class="form-control" style="width:300px;">
                                                       <?php
													   //delete file
                                                        if($_REQUEST['cmd']=="edit")
														{
															 unset($info);
															$info['table']    = "equipment";
															$info['fields']   = array("*");   	   
															$info['where'] = "id='".$Id."'";															
															$res2  =  $db->select($info);
														 
															$file_equpment_info    = '../'.$res2[0]['file_equpment_info'];
															$base_name = basename($file_equpment_info);
														  if(is_file($file_equpment_info)&&file_exists($file_equpment_info))
														  {
													   ?>
                                                          <?=$base_name?><br><a href="equipment_database.php?cmd=delete_individual&id=<?=$Id?>&type=stand_alone" class="md-btn md-raised m-b btn-fw pink-300 waves-effect">Delete</a>
                                                       <?php	  	   
														  }
														}
													 ?>
                                                  </div>
                                                   <div class="form-group">
                                                        <div class="input_fields_wrap">
                                                            <div style="display:none;">
                                                            
                                                            <input type="file" name="file_attach[]" class="form-control" style="width:300px;"></div>
                                                            <?php
															  //delete file
															  unset($info);
															$info['table']    = "equipment_attach";
															$info['fields']   = array("*");   	   
															$info['where'] = "equipment_id='".$Id."'";
															$res2  =  $db->select($info);
															for($i=0;$i<count($res2);$i++)
															{
																 $attach    = '../'.$res2[$i]['attach'];
																 $base_name = basename($attach);
																 if(is_file($attach)&&file_exists($attach))
														           {
																?>
                                                                <div><input type="file" name="file_attach[]"/ class="form-control"  style="width:300px;"><a href="#" class="remove_field"><img src="../images/cross.png" width="50px"></a></div>
                                                                <?=$base_name?><br><a href="equipment_database.php?cmd=delete_individual&id=<?=$Id?>&attach_id=<?=$res2[$i]['id']?>&type=attach" class="md-btn md-raised m-b btn-fw pink-300 waves-effect">Delete</a>
																<?php
																   }
															}
															?>
                                                            <script>
															  $(document).ready(function() {
																var max_fields      = 10; //maximum input boxes allowed
																var wrapper         = $(".input_fields_wrap"); //Fields wrapper
																var add_button      = $(".add_field_button"); //Add button ID
																
																var x = 1; //initlal text box count
																$(add_button).click(function(e){ //on add input button click
																	e.preventDefault();
																	if(x < max_fields){ //max input box allowed
																		x++; //text box increment
																		$(wrapper).append('<div><input type="file" name="file_attach[]"/ class="form-control"  style="width:300px;"><a href="#" class="remove_field"><img src="../images/cross.png" width="50px"></a></div>'); //add input box
																	}
																});
																
																$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
																	e.preventDefault(); $(this).parent('div').remove(); x--;
																})
															});
															</script>
                                                        </div>
                                                   
                                                        <button class="add_field_button md-btn md-raised m-b btn-fw brown-200 waves-effect">Add More Files</button>
                                                    </div> 
                                                   
                                               </div>
                                             </div>
                                             <div class="col-md-12">
                                               <div class="col-md-6"> 
                                                 <div class="form-group">
                                                  <?php
                                                    if($_REQUEST['cmd']=="edit"){
                                                   ?>
                                                    <input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
                                                   <?php
                                                    }
                                                   ?>
                                                   <input type="hidden" name="cmd" value="add">
                                                   <input type="submit" value="Submit" class="md-btn md-raised m-b btn-fw green-700 waves-effect">
                                                </div> 
                                              </div>  
                                             </div>                                              
                                            </form>
                                       </fieldset>
                            </div>
                               <!--End of Column2--> 
                            <div class="col-md-12">
                            
                              
                            
                               <div class="panel panel-default">
                                <div class="panel-heading" align="right">
                                  <a href="equipment_database.php?cmd=print">
                                    <img src="../images/printer.png" style="width:25px;">
                                  </a>
                                  <a href="equipment_database.php?cmd=download">
                                    <img src="../images/download.gif" style="width:25px;">
                                  </a>
                                </div>
                                <div class="table-responsive">
                                  <!------------------------------------> 
                                  <script language="javascript">
								     function checkAll()
									 {
										 $("#chk_all").change(function () {
												$("input:checkbox.check").prop('checked', $(this).prop("checked"));
											});
									 }
									 
									 function set_action(value)
									 {
									   if(value=='delete_all')
									   {
										   val = confirm("Selected records will be deleted permanently,Are you sure to delete those items?");
										   if(val == true)
										   {
											  $("#delete_all_form").append('<input type="hidden" name="cmd" value="delete_all">');
											  $("#delete_all_form").submit();
										   }
									   }
									   if(value=='print_all')
									   {
										  $("#delete_all_form").append('<input type="hidden" name="cmd" value="print" />');
										  $("#delete_all_form").submit();
									   }
									 }
									 
									 function setrowsPerPage(value)
									 {
										window.location.href = 'equipment_database.php?cmd=show_perpage&rowsPerPage='+value; 
									 }
								  </script>  
                                     <table class="table">
                                                     <tr>
                                                            <td align="center" valign="top">
                                                              <form name="search_frm" id="search_frm" method="post">
                                                                <div class="portlet-body">
                                                                 <div class="table-responsive">	
                                                                    <table class="table">
                                                                          <TR>
                                                                            <td width="70%" align="left">
                                                                               Show<select name="rowsPerPage" id="rowsPerPage"  class="form-control-static" onChange="setrowsPerPage(this.value);">
                                                                                  <option value="10" <?php if($_SESSION["rowsPerPage1"]==10){ echo "selected";}?>>10</option>
                                                                                  <option value="20" <?php if($_SESSION["rowsPerPage1"]==20){ echo "selected";}?>>20</option>
                                                                                  <option value="50" <?php if($_SESSION["rowsPerPage1"]==50){ echo "selected";}?>>50</option>
                                                                                  <option value="100" <?php if($_SESSION["rowsPerPage1"]==100){ echo "selected";}?>>100</option>
                                                                                  <option value="500" <?php if($_SESSION["rowsPerPage1"]==500){ echo "selected";}?>>500</option>
                                                                               </select>Entries
                                                                            
                                                                            </td>
                                                                            <TD  nowrap="nowrap">
                                                                              <?php
                                                                                  $hash    =  getTableFieldsName("equipment");
                                                                                  $hash    = array_diff($hash,array("id"));
                                                                              ?>
                                                                              Search Key:
                                                                              <select   name="field_name" id="field_name"  class="form-control-static">
                                                                                <option value="">--Select--</option>
                                                                                <?php
                                                                                foreach($hash as $key=>$value)
                                                                                {
                                                                                ?>
                                                                                <option value="<?=$key?>" <?php if($_SESSION['field_name']==$key) echo "selected"; ?>><?=str_replace("_"," ",$value)?></option>
                                                                                <?php
                                                                                }
                                                                              ?>
                                                                              </select>
                                                                            </TD>
                                                                            <TD  nowrap="nowrap" align="right"><label for="searchbar"><img src="../images/icon_searchbox.png" alt="Search"></label>
                                                                               <input type="text"    name="field_value" id="field_value" value="<?=$_SESSION["field_value"]?>" class="form-control-static"></TD>
                                                                            <td nowrap="nowrap" align="right">
                                                                              <input type="hidden" name="cmd" id="cmd" value="search_equipment" >
                                                                              <input type="submit" name="btn_submit" id="btn_submit"  value="Search" class="md-btn md-raised m-b btn-fw green-700 waves-effect has-value" />
                                                                            </td>
                                                                          </TR>
                                                                        </table>
                                                                </div>
                                                                </div>
                                                              </form>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                       <td> 
                                                         <div class="portlet-body">
                                                          <div class="table-responsive">	
                                                              <table class="table">
                                                                <thead>
                                                                    <tr  bgcolor="#ABCAE0">
                                                                        <td  align="center">
                                                                              <input type="checkbox" name="chk_all"  id="chk_all"  onclick="checkAll();">
                                                                        </td>
                                                                        <th>Equipment ID</th>
                                                                        <th>Site</th>
                                                                        <th>Department</th>
                                                                        <th>Equipment Type</th>
                                                                        <th>Equipment Name</th>
                                                                        <th>Attachments</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                             <?php
                                                                    
                                                                    if($_SESSION["search"]=="yes")
                                                                      {
																		if(!empty($_SESSION['field_name']))
																		{  
                                                                        	$whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";
																		}
																		else
																		{
																	        $whrstr = " AND 1";		
																		}
                                                                      }
                                                                      else
                                                                      {
                                                                        $whrstr = "";
                                                                      }
                                                             
                                                                    $rowsPerPage = isset($_SESSION["rowsPerPage1"])?$_SESSION["rowsPerPage1"]:10;
                                                                    $pageNum = 1;
                                                                    if(isset($_REQUEST['page']))
                                                                    {
                                                                        $pageNum = $_REQUEST['page'];
                                                                    }
                                                                    $offset = ($pageNum - 1) * $rowsPerPage;  
                                                             
                                                             
                                                                                  
                                                                    $info["table"] = "equipment";
                                                                    $info["fields"] = array("equipment.*"); 
                                                                    $info["where"]   = "1   $whrstr ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
                                                                                        
                                                                    
                                                                    $arr =  $db->select($info);
                                                                    
                                                                    for($i=0;$i<count($arr);$i++)
                                                                    {
                                                                    
                                                                       $rowColor;
                                                            
                                                                        if($i % 2 == 0)
                                                                        {
                                                                            
                                                                            $row="#C8C8C8";
                                                                        }
                                                                        else
                                                                        {
                                                                            
                                                                            $row="#FFFFFF";
                                                                        }
                                                                    
                                                             ?>
                                                                <tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
                                                                  <td align="center">
                                                                     <?php
																	    if($i==0)
																		{
																	 ?>
                                                                     <form name="delete_all_form" id="delete_all_form" action="" method="post">
                                                                     <?php		
																		}
																	 ?>
                                                                     <input type="checkbox" name="chk[]" value="<?=$arr[$i]['id']?>" class="check">
                                                                      <?php
																	    if($i==count($arr)-1)
																		{
																	 ?>                                                                     
                                                                     </form>
                                                                     <?php		
																		}
																	 ?>
                                                                  
                                                                  </td>
                                                                  <td><?=$arr[$i]['equipmentid']?></td>
                                                                  <td><?=$arr[$i]['site']?></td>
                                                                  <td><?=$arr[$i]['department']?></td>
                                                                  <td><?=$arr[$i]['equipment_type']?></td>
                                                                  <td><?=$arr[$i]['equipment_name']?></td>
                                                                  <td>
																        <?php
																		      
																			  $file_downlaod =  $arr[$i]['file_equpment_info'];  
																			$files = '<a href="equipment_database.php?cmd=download_individual&file='.$file_downlaod.'">'.basename($file_downlaod).'</a>';	
																			
																				 unset($info);
																			$info['table']    = "equipment_attach";
																			$info['fields']   = array("*");   	   
																			$info['where'] = "equipment_id='".$arr[$i]['id']."'";
																			$res2  =  $db->select($info);
																			for($j=0;$j<count($res2);$j++)
																			{
																				$file_downlaod = $res2[$j]['attach'];
																				$files .= ' <a href="equipment_database.php?cmd=download_individual&file='.$file_downlaod.'">'.basename($file_downlaod).'</a>';	
																			}
																		
																		  echo $files; 
																		?>
                                                                  </td>
                                                                  <td nowrap >
                                                                      <a href="equipment_database.php?cmd=edit&id=<?=$arr[$i]['id']?>"  class="btn default btn-xs purple"><i class="fa fa-edit"></i>Edit</a>
                                                                      <a href="equipment_database.php?cmd=delete&id=<?=$arr[$i]['id']?>" class="btn btn-sm red filter-cancel"  onClick=" return confirm('Are you sure to delete this item ?');"><i class="fa fa-times"></i>Delete</a> 
                                                                      <a href="equipment_database.php?cmd=print&id=<?=$arr[$i]['id']?>"  class="btn default btn-xs blue"><i class="fa fa-print"></i>Print</a>
                                                                      <a href="equipment_database.php?cmd=download_attachment&id=<?=$arr[$i]['id']?>"  class="btn default btn-xs blue"><i class="fa fa-download"></i>Download attach</a>
                                                                 </td>
                                                            
                                                                </tr>
                                                            <?php
                                                                      }
                                                            ?>
                                                            <tr>
                                                                <td  align="center">
                                                                    <select name="select_action"  id="select_action"  class="form-control-static" onChange="set_action(this.value);">
                                                                       <option value="">Seelct</option>
                                                                       <option value="delete_all">Delete All</option>
                                                                       <option value="print_all">Print All</option>
                                                                    </select>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                               <td colspan="10" align="center">
                                                                   <style>
                                                                    #navlist li
                                                                    {
                                                                        float:left;
                                                                        display: inline;
                                                                        list-style-type: none;
                                                                        padding-right: 20px;
                                                                    }
                                                                   </style>
                                                                  <?php              
                                                                          unset($info);
                                                        
                                                                           $info["table"] = "equipment";
                                                                           $info["fields"] = array("count(*) as total_rows"); 
                                                                           $info["where"]   = "1  $whrstr ORDER BY id DESC";
                                                                          
                                                                           $res  = $db->select($info);  
                                                        
                                                                                    
                                                                            $numrows = $res[0]['total_rows'];
                                                                            $maxPage = ceil($numrows/$rowsPerPage);
                                                                            $self = 'equipment_database.php?cmd=list';
                                                                            $nav  = '';
                                                                            
                                                                            $start    = ceil($pageNum/5)*5-5+1;
                                                                            $end      = ceil($pageNum/5)*5;
                                                                            
                                                                            if($maxPage<$end)
                                                                            {
                                                                              $end  = $maxPage;
                                                                            }
                                                                            
                                                                            for($page = $start; $page <= $end; $page++)
                                                                            //for($page = 1; $page <= $maxPage; $page++)
                                                                            {
                                                                                if ($page == $pageNum)
                                                                                {
                                                                                    $nav .= "<li>$page</li>"; 
                                                                                }
                                                                                else
                                                                                {
                                                                                    $nav .= "<li><a href=\"$self&&page=$page\" class=\"nav\">$page</a></li>";
                                                                                } 
                                                                            }
                                                                            if ($pageNum > 1)
                                                                            {
                                                                                $page  = $pageNum - 1;
                                                                                $prev  = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Prev]</a></li>";
                                                                        
                                                                               $first = "<li><a href=\"$self&&page=1\" class=\"nav\">[First Page]</a></li>";
                                                                            } 
                                                                            else
                                                                            {
                                                                                $prev  = '<li>&nbsp;</li>'; 
                                                                                $first = '<li>&nbsp;</li>'; 
                                                                            }
                                                                        
                                                                            if ($pageNum < $maxPage)
                                                                            {
                                                                                $page = $pageNum + 1;
                                                                                $next = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Next]</a></li>";
                                                                        
                                                                                $last = "<li><a href=\"$self&&page=$maxPage\" class=\"nav\">[Last Page]</a></li>";
                                                                            } 
                                                                            else
                                                                            {
                                                                                $next = '<li>&nbsp;</li>'; 
                                                                                $last = '<li>&nbsp;</li>'; 
                                                                            }
                                                                            
                                                                            if($numrows>1)
                                                                            {
                                                                              echo '<ul id="navlist">';
                                                                               echo $first . $prev . $nav . $next . $last;
                                                                              echo '</ul>';
                                                                            }
                                                                        ?>     
                                                               </td>
                                                            </tr>                                                            
                                                            </table>
                                                            </div>
                                                         </div>				
                                                    </td>
                                                    </tr>
                                                    </table>
                                          
                                  <!------------------------------------>     
                                       
                                    
                                </div>
                              </div>
                          
                            </div>
                               <!--End of Column3--> 
                               
                              
                        </div>
                    </div>
                </div>
            </div>             
        </div>
    </div><!--/Content-->    
</div> 
<!-- <script>
			$( ".datepicker" ).datepicker({
				dateFormat: "yy-mm-dd", 
				changeYear: true,
				changeMonth: true,
				showOn: 'button',
				buttonText: 'Show Date',
				buttonImageOnly: true,
				buttonImage: '../images/calendar.gif',
			});
 </script>-->
<script>
	$('#date_from').datepicker({
		
	});
  </script>

<!--<script src="../libs/jquery/jquery/dist/jquery.js"></script>-->
<script src="../libs/jquery/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../libs/jquery/waves/dist/waves.js"></script>

<script src="../scripts/ui-load.js"></script>
<script src="../scripts/ui-jp.config.js"></script>
<script src="../scripts/ui-jp.js"></script>
<script src="../scripts/ui-nav.js"></script>
<script src="../scripts/ui-toggle.js"></script>
<script src="../scripts/ui-form.js"></script>
<script src="../scripts/ui-waves.js"></script>
<script src="../scripts/ui-client.js"></script>
<script src="../scripts/iFrame.js"></script>


</body>

</html>















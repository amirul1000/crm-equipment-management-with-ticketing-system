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
  
  <link rel="stylesheet" href="../datepicker/jquery-ui.css">
  <script src="../datepicker/jquery-1.10.2.js"></script>
  <script src="../datepicker/jquery-ui.js"></script>

  <script src="../datepicker/addons/jquery-ui-sliderAccess.js"></script>
  <link rel="stylesheet" href="../datepicker/addons/jquery-ui-timepicker-addon.css">
  <script src="../datepicker/addons/jquery-ui-timepicker-addon.js"></script>
  
  
  <!--<script src="../js/jquery-1.12.3.js"></script>-->
 <!--<script src="../js/jquery.dataTables.min.js"></script>
 <link rel="stylesheet" href="../DataTables-1.10.12/media/css/jquery.dataTables.min.css" type="text/css" />-->
 
  <script language="javascript">
    ////////////////////////////////////Drop Down//////////////////////////////
	///////////////////////////////////////////////////////////////////////////
    /*
     get Department
	*/
	function fillDepartment(site)
	{
		objselect = document.getElementById("department");
		objselect.options.length = 0;
		$("#spinner1").html('<img src="../images/indicator.gif" alt="Wait" />');
		$.ajax({  
		  method : "POST",
		  url    : 'equipment_schedule.php',
		  data   : {
					   cmd  : 'get_department',
					   site :  site
		           } ,
		  success: function(data) {
				  var obj = eval(data); 
				  objselect.add(new Option('Select..',''), null);
				  for(var i=0;i<obj.length;i++)
				  {
					objselect.add(new Option(obj[i].department,obj[i].department), null);
				  }
				 $("#spinner1").html('');
			  }
			});
	}
	 /*
     get Equipment type
	*/
	function fillEquipmenttype(department)
	{
		objselect = document.getElementById("equipment_type");
		objselect.options.length = 0;
		$("#spinner2").html('<img src="../images/indicator.gif" alt="Wait" />');
		$.ajax({  
		  method : "POST",
		  url    : 'equipment_schedule.php',
		  data   : {
					   cmd  : 'get_equipment_type',
					   site :  $("#site").val(),
					   department :  department
		           } ,
		  success: function(data) {
				  var obj = eval(data); 
				  objselect.add(new Option('Select..',''), null);
				  for(var i=0;i<obj.length;i++)
				  {
					objselect.add(new Option(obj[i].equipment_type,obj[i].equipment_type), null);
				  }
				 $("#spinner2").html('');
			  }
			});
	} 
	 /*
     get Equipment
	*/
	function fillEquipment(equipment_type)
	{
		objselect = document.getElementById("equipment_name");
		objselect.options.length = 0;
		$("#spinner3").html('<img src="../images/indicator.gif" alt="Wait" />');
		$.ajax({  
		  method : "POST",
		  url    : 'equipment_schedule.php',
		  data   : {
					   cmd            : 'get_equipment',
					   site           :  $("#site").val(),
					   department     :  $("#department").val(),
					   equipment_type :  equipment_type
		           } ,
		  success: function(data) {
				  var obj = eval(data); 
				  objselect.add(new Option('Select..',''), null);
				  for(var i=0;i<obj.length;i++)
				  {
					objselect.add(new Option(obj[i].equipment_name,obj[i].equipment_name), null);
				  }
				 $("#spinner3").html('');
			  }
			});
	} 
	/////////////////////////////////////Load data table////////////////////
	////////////////////////////////////////////////////////////////////////
	function reload_load_table()
	   {	
			location.href = 'equipment_schedule.php?cmd=search_schedule&field_name=date_from&field_value='+$("#datepicker").val();
			
	   }
	//////////////////////////////////////////////////////////////////////////
	function set_duration()
	{
	  date_from = $("#date_from").val();
	  date_to   = $("#date_to").val();	
	  
	  if(date_from.length == 0 || date_to.length == 0 )
	   {
		   return;
	   }
	  
	    var from = new Date(date_from);
	    var to = new Date(date_to);
		var sec_num = (to - from) / 1000;
	
		var days    = Math.floor(sec_num / (3600 * 24));
		var hours   = Math.floor((sec_num - (days * (3600 * 24)))/3600);
		var minutes = Math.floor((sec_num - (days * (3600 * 24)) - (hours * 3600)) / 60);
		var seconds = Math.floor(sec_num - (days * (3600 * 24)) - (hours * 3600) - (minutes * 60));
	
		if (hours   < 10) {hours   = "0"+hours;}
		if (minutes < 10) {minutes = "0"+minutes;}
		if (seconds < 10) {seconds = "0"+seconds;}
	    if(days==1)
		{
		  str = " day";	 
		}
		else if(days>1)
		{
		 str = " days";	 	
		}
		else
		{
		 str = "";	 	
		}
		duration =   days+''+str+':'+ hours+':'+minutes+':'+seconds;
	 
	    $("#duration").html(duration);
	}
  </script>
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
                              <div class="col-md-12  panel panel-card alert-success">
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
                            
                            <div class="col-md-12">
                            <form action="" method="post">
                            <div class="col-lg-6 col-md-6"  style="z-index:1000;">
                                  <div class="row no-gutter">   
                                
                                        
                                        <div class="card">
                                            
                                            
                                            <div class="card-body">
                                                <div class="p-md">          
                                                    
                                                    <fieldset>
                                                    <legend>Reservation Options</legend>
                                                     
                                                     <div class="col-md-12">
                                                     <div class="col-lg-3 col-md-3">
                                                            <b>Equipment</b>     
                                                            <div class="form-group">
                                                                <label class="label">Site</label> <br>
                                                                <?php
                                                                $info["table"] = "site";
                                                                $info["fields"] = array("site.*"); 
                                                                $info["where"]   = "1   ORDER BY site_name ASC";
                                                                $arr =  $db->select($info);
                                                                ?> 
                                                                <select name="site" id="site" class="form-control-static" onChange="fillDepartment(this.value);" required>
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
                                                            <div id="spinner1"></div>
                                                            </div>  
                                                            <div class="form-group">
                                                                <?php
                                                                $info["table"] = "department";
                                                                $info["fields"] = array("department.*"); 
                                                                $info["where"]   = "1   ORDER BY dept_name ASC";
                                                                $arr =  $db->select($info);
                                                                ?> 
                                                                <label class="label">Department</label> <br>
                                                                <select name="department"  id="department" class="form-control-static" onChange="fillEquipmenttype(this.value);" required>
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
                                                            <div id="spinner2"></div>
                                                            </div>  
                                                            <div class="form-group">
                                                                <?php
                                                                $info["table"] = " equipment_type";
                                                                $info["fields"] = array("equipment_type.*"); 
                                                                $info["where"]   = "1   ORDER BY equip_type_name ASC";
                                                                $arr =  $db->select($info);
                                                                ?> 
                                                                <label class="label">Equipment type</label> <br>
                                                                <select name="equipment_type" id="equipment_type" class="form-control-static" onChange="fillEquipment(this.value);" required>
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
                                                            <div id="spinner3"></div>
                                                            </div> 
                                                            <div class="form-group">
                                                                <?php
                                                                $info["table"] = "equipment";
                                                                $info["fields"] = array("equipment.*"); 
                                                                $info["where"]   = "1   ORDER BY equipment_name ASC";
                                                                $arr =  $db->select($info);
                                                                ?> 
                                                                <label class="label">Equipment</label> <br>
                                                                <select name="equipment_name" id="equipment_name" class="form-control-static" required>
                                                                <option value="">Select..</option>
                                                                <?php
                                                                for($i=0;$i<count($arr);$i++)
                                                                {
                                                                ?>
                                                                <option value="<?=$arr[$i]['equipment_name']?>"   <?php if($arr[$i]['equipment_name']==$equipment_name){ echo "selected";} ?>  ><?=$arr[$i]['equipment_name']?></option>
                                                                <?php
                                                                }
                                                                ?> 				
                                                                </select>
                                                    </div> 
                                                    </div>
                                                    
                                                     <div class="col-lg-3 col-md-3">
                                                                              <b>Assign</b>                                               
                                                                              <div class="form-group">   
                                                                                    <label class="label">Assign To</label><br>
                                                                                    <?php
                                                                                    $info['table']    = "users";
                                                                                    $info['fields']   = array("*");   	   
                                                                                    $info['where']    =  "1=1 ORDER BY first_name,last_name ASC";
                                                                                    $resusers  =  $db->select($info);
                                                                                    ?>
                                                                                    <select  name="assigned_to_users_id" id="assigned_to_users_id"   class="form-control-static">
                                                                                    <option value="">Select..</option>
                                                                                    <?php
                                                                                    foreach($resusers as $key=>$each)
                                                                                    { 
                                                                                    ?>
                                                                                    <option value="<?=$resusers[$key]['id']?>" <?php if($resusers[$key]['id']==$assigned_to_users_id){ echo "selected"; }?>><?=$resusers[$key]['first_name']?> <?=$resusers[$key]['last_name']?></option>
                                                                                    <?php
                                                                                    }
                                                                                    ?> 
                                                                                    </select> 
                                                                              </div> 
                                                                            </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="form-group">
                                                    Select Date From
                                                    <input type="text" name="date_from" id="date_from"  value="<?=$date_from?>" class="datepicker2" placeholder="Date" onBlur="set_duration();" required>
                                                    To<input type="text" name="date_to" id="date_to"  value="<?=$date_to?>"  class="datepicker2" placeholder="Date" onBlur="set_duration();" required>
                                                      <div id="duration" style="float:right;"><?=$duration?></div>
                                                    </div> 
                                                    <div class="form-group">
                                                    <?php
                                                    $arr_data = explode(",",$duration_option);
                                                    ?>
                                                    All Day <input type="checkbox" name="duration_option[]" value="All Day" <?php if($arr_data[0]=='All Day'){echo "checked";}?>>
                                                    Repeat <input type="checkbox" name="duration_option[]" value="Repeat" <?php if($arr_data[1]=='Repeat'){echo "checked";}?>> <br>
                                                    <label class="label">Notes</label> <br>
                                                    <textarea name="notes"  id="notes" style="width:90%;height:100px;"><?=$notes?></textarea>
                                                    </div>
                                                    <br>
                                                    <input type="hidden" name="cmd" value="add">
                                                    <input type="hidden" name="id" value="<?=$Id?>">
                                                    <input type="submit" value="Submit" class="md-btn md-raised m-b btn-fw green-700 waves-effect has-value">
                                                    </fieldset>         
                                                                
                                                     
                                                            
                                                </div>
                                            </div>
                                        </div><!--End of Card 1.1-->
                                        
                                                           
                                </div>                        
                            </div><!--End of Column1--> 
                                       
                            <div class="col-lg-6 col-md-6"  style="z-index:1000;">
                                <div class="row no-gutter">

                                    
                                        <div class="card">
                                            
                                            <div class="card-body">
                                                <div class="p-md" align="center" style="height:605px;">   
                                                  
                                                       <h3>Click on Date to load that day reservation in the Table</h3><br>
                                                       <div id="datepicker" class="datepicker"></div>
                                                       <div id="spinner8"></div>             
                                                          
                                                </div>
                                            </div>
                                        </div><!--End of Card 2.1-->
                                                                    
                                   
                                </div> 
                            </div><!--End of Column2-->
                             </form>                     
                            
                           </div> 
                            
                            
                            <!--End of Column2--> 
                            <div class="col-md-12">
                             <br><br><br>
                            </div>
                            <div class="col-md-12  panel panel-card">
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
										window.location.href = 'equipment_schedule.php?cmd=show_perpage&rowsPerPage='+value; 
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
                                                        <td width="70%">
                                                             Show<select name="rowsPerPage" id="rowsPerPage"  class="form-control-static" onChange="setrowsPerPage(this.value);">
                                                                  <option value="10" <?php if($_SESSION["rowsPerPage3"]==10){ echo "selected";}?>>10</option>
                                                                  <option value="20" <?php if($_SESSION["rowsPerPage3"]==20){ echo "selected";}?>>20</option>
                                                                  <option value="50" <?php if($_SESSION["rowsPerPage3"]==50){ echo "selected";}?>>50</option>
                                                                  <option value="100" <?php if($_SESSION["rowsPerPage3"]==100){ echo "selected";}?>>100</option>
                                                                  <option value="500" <?php if($_SESSION["rowsPerPage3"]==500){ echo "selected";}?>>500</option>
                                                               </select>Entries
                                                        </td>
                                                        <TD  nowrap="nowrap">
                                                          <?php
                                                              $hash    =  getTableFieldsName("schedule");
                                                              $hash    = array_diff($hash,array("id"));
                                                          ?>
                                                          Search Key:
                                                          <select   name="field_name" id="field_name"  class="form-control-static">
                                                            <option value="">Select..</option>
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
                                                           <input type="text"    name="field_value" id="field_value" value="<?=$_SESSION["field_value"]?>"  class="form-control-static"></TD>
                                                        <td nowrap="nowrap" align="right">
                                                          <input type="hidden" name="cmd" id="cmd" value="search_schedule" >
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
                                                <tr bgcolor="#ABCAE0">
                                                    <td  align="center">
                                                          <input type="checkbox" name="chk_all"  id="chk_all"  onclick="checkAll();">
                                                    </td>
                                                    <th>Site</th>
                                                    <th>Department</th>
                                                    <th>Equipment name</th>
                                                    <th>Equipment type</th>
                                                    <th>Date from</th>
                                                    <th>Date to</th>
                                                    <th>Duration</th>
                                                    <th>Notes</th>
                                                    <th>Date created</th>
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
                                         
                                                $rowsPerPage = isset($_SESSION["rowsPerPage3"])?$_SESSION["rowsPerPage3"]:10;
                                                $pageNum = 1;
                                                if(isset($_REQUEST['page']))
                                                {
                                                    $pageNum = $_REQUEST['page'];
                                                }
                                                $offset = ($pageNum - 1) * $rowsPerPage;  
                                         
                                         
                                                              
                                                $info["table"] = "schedule";
                                                $info["fields"] = array("schedule.*"); 
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
                                              <td><?=$arr[$i]['site']?></td>
                                              <td><?=$arr[$i]['department']?></td>
                                              <td><?=$arr[$i]['equipment_name']?></td>
                                              <td><?=$arr[$i]['equipment_type']?></td>
                                              <td><?=$arr[$i]['date_from']?> </td>
                                              <td><?=$arr[$i]['date_to']?></td>
                                              <td>
											       <?=$arr[$i]['duration']?> 
                                              </td>
                                              <td><?=$arr[$i]['notes']?></td>
                                              <td><?=$arr[$i]['date_created']?></td>
                                              <td nowrap >
                                                  <a href="equipment_schedule.php?cmd=edit&id=<?=$arr[$i]['id']?>"  class="btn default btn-xs purple"><i class="fa fa-edit"></i>Edit</a>
                                                  <a href="equipment_schedule.php?cmd=delete&id=<?=$arr[$i]['id']?>" class="btn btn-sm red filter-cancel"  onClick=" return confirm('Are you sure to delete this item ?');"><i class="fa fa-times"></i>Delete</a> 
                                                  <a href="equipment_schedule.php?cmd=print&id=<?=$arr[$i]['id']?>"  class="btn default btn-xs blue"><i class="fa fa-print"></i>Print</a>
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
                                    
                                                       $info["table"] = "schedule";
                                                       $info["fields"] = array("count(*) as total_rows"); 
                                                       $info["where"]   = "1  $whrstr ORDER BY id DESC";
                                                      
                                                       $res  = $db->select($info);  
                                    
                                                                
                                                        $numrows = $res[0]['total_rows'];
                                                        $maxPage = ceil($numrows/$rowsPerPage);
                                                        $self = 'equipment_schedule.php?cmd=list';
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
                               <!--End of Column3--> 
                                
                        </div>
                    </div>
                </div>
            </div>             
        </div>
    </div><!--/Content-->    
</div>   
  <style>
       /*.ui-widget {
		   width:450px; 
	 }*/
    .datepicker .ui-widget {
		   width:700px; 
		   height:300px;
	 }
	 .ui-widget-header{
	  background:none;   
   }
  </style>
  
 <script>
			$( ".datepicker" ).datepicker({
				dateFormat: "yy-mm-dd", 
				changeYear: true,
				changeMonth: true,
				showOn: 'button',
				buttonText: 'Show Date',
				buttonImageOnly: true,
				buttonImage: '../images/calendar.gif',
				onSelect: function (date) {
					   reload_load_table();
					},
			});
			//$( ".datepicker" ).datepicker('setDate', <?=$_SESSION['field_value']?>);
			
			$( ".datepicker2" ).datetimepicker({
				dateFormat: 'yy-mm-dd',
				timeFormat: 'HH:mm:ss',
				changeYear: true,
				changeMonth: true,
				showOn: 'button',
				buttonText: 'Show Date',
				buttonImageOnly: true,
				buttonImage: '../images/calendar.gif',
				onSelect: function (date) {
					   $("#date_from").focus();
	                   $("#date_to").focus();	
					},
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















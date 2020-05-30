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
  
  
  <!--<script src="../js/jquery-1.12.3.js"></script>-->
 <script src="../js/jquery.dataTables.min.js"></script>
 <link rel="stylesheet" href="../DataTables-1.10.12/media/css/jquery.dataTables.min.css" type="text/css" />
  
  
  <script language="javascript">
   	/////////////////////////////////////Load data table////////////////////
	////////////////////////////////////////////////////////////////////////
	function load_table()
	   {
			var table = $('#dashboard_ticket_table').DataTable( {
				"ajax": {
							'type': 'POST',
							'url':  "dashboard.php?cmd=json",
							'data': {
									 report_site           : $("#report_site").val(),
									 report_department     : $("#report_department").val(),
									 report_equipment_type : $("#report_equipment_type").val(),
									 report_equipment_name : $("#report_equipment_name").val(),
									 report_status    : $("#report_status").val(),   
									 report_priority    : $("#report_priority").val(),   
									 report_ticket_status    : $("#report_ticket_status").val(),   
									 report_assigned_to_users_id    : $("#report_assigned_to_users_id").val(), 
									 report_date    : $("#datepicker").val(),
								  }
				       },
				"columnDefs": [ {
					"targets": -1,
					"data": null,
					"defaultContent":  "<button name=\"details\" class=\"md-btn md-raised m-b btn-fw indigo-300 waves-effect\">Details</button> "
				},
				{
					"targets": [ 0 ],
					"visible": false,
					"searchable": false
				}, ],
				"language": {
					  "emptyTable": "No data available in table"
					}
			} );
			
			$('#dashboard_ticket_table tbody').on( 'click', 'button', function () {
				cmd = $(this).attr('name');
				var data = table.row( $(this).parents('tr') ).data();
				id   =  data[0] ;
				action(cmd,id);
			} );
			
			$(".dataTables_empty").html("No data available in table");
	  }
	
	function action(cmd,id)
	{
		if(cmd == "details")
		{
		   window.location.href = 'dashboard.php?cmd='+cmd+'&id='+id;	
		}
	}
	
	$(document).ready(function() {
		
	   load_table();
	
	} );
	//////////////////////////////////////////////////////////////////////////
  
  
  
	///////////////////////////////Report////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////
	 /*
     get Department
	*/
	function reportFillDepartment(site)
	{
		objselect = document.getElementById("report_department");
		objselect.options.length = 0;
		$("#spinner5").html('<img src="../images/indicator.gif" alt="Wait" />');
		$.ajax({  
		  method : "POST",
		  url    : 'open_tickets.php',
		  data   : {
					   cmd  : 'get_department',
					   site :  site
		           } ,
		  success: function(data) {
				  var obj = eval(data); 
				  objselect.add(new Option('--All--',''), null);
				  for(var i=0;i<obj.length;i++)
				  {
					objselect.add(new Option(obj[i].department,obj[i].department), null);
				  }
				 $("#spinner5").html('');
			  }
			});
	}
	 /*
     get Equipment type
	*/
	function reportFillEquipmenttype(department)
	{
		objselect = document.getElementById("report_equipment_type");
		objselect.options.length = 0;
		$("#spinner6").html('<img src="../images/indicator.gif" alt="Wait" />');
		$.ajax({  
		  method : "POST",
		  url    : 'open_tickets.php',
		  data   : {
					   cmd  : 'get_equipment_type',
					   site :  $("#report_site").val(),
					   department :  department
		           } ,
		  success: function(data) {
				  var obj = eval(data); 
				  objselect.add(new Option('--All--',''), null);
				  for(var i=0;i<obj.length;i++)
				  {
					objselect.add(new Option(obj[i].equipment_type,obj[i].equipment_type), null);
				  }
				 $("#spinner6").html('');
			  }
			});
	} 
	 /*
     get Equipment
	*/
	function reportFillEquipment(equipment_type)
	{
		objselect = document.getElementById("report_equipment_name");
		objselect.options.length = 0;
		$("#spinner7").html('<img src="../images/indicator.gif" alt="Wait" />');
		$.ajax({  
		  method : "POST",
		  url    : 'open_tickets.php',
		  data   : {
					   cmd            : 'get_equipment',
					   site           :  $("#report_site").val(),
					   department     :  $("#report_department").val(),
					   equipment_type :  equipment_type
		           } ,
		  success: function(data) {
				  var obj = eval(data); 
				  objselect.add(new Option('--All--',''), null);
				  for(var i=0;i<obj.length;i++)
				  {
					objselect.add(new Option(obj[i].equipment_name,obj[i].equipment_name), null);
				  }
				 $("#spinner7").html('');
			  }
			});
	} 
	/////////////////////////////////////////////////////////////////////////////		
  
  function reload_load_table()
  {
	  $("#spinner8").html('<img src="../images/indicator.gif" alt="Wait" />'); 
	  
	  var oTable = $('#dashboard_ticket_table').dataTable();
	  oTable.fnDestroy();
	  load_table();
	  
	  $("#spinner8").html('');  
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
                <span  style="align:middle;position:relative;top:20px;" align="center">
                     <!--<span style="align:middle;position:relative;top:20px;">-->
                      <?php
                           include("../includes/crmNav.php");
                       ?>
                     <!--</span>-->
                 </span>
                <div class="logo pull-right pull-up"><img src="../images/1.png" alt="U" style="height:60px;width: auto;"></div>
            </div>
            
            <div class="box-row">
                <div class="box-cell">
                    <div class="box-inner padding">                             
                        <div class="row">
                        
                              
                            <!--<div class="col-md-12">
                                    <div  align="center">
                                       <?php
									      // include("../includes/crmNav.php");
									   ?>
                                   </div>                                                                   
                                           
                            </div>--><!--End of Column1--> 
                            
                            <div class="col-md-12  panel panel-card">
                                 <!--<form action="" method="post">-->
                                 
                                      
                                       <fieldset>
                                            <legend>Search</legend>
                                            <div class="col-md-12">
                                               <div class="col-md-6 panel panel-card">
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
                                                        <select name="report_site" id="report_site" onChange="reportFillDepartment(this.value);">
                                                        <option value="">--All--</option>
                                                        <?php
                                                        for($i=0;$i<count($arr);$i++)
                                                        {
                                                        ?>
                                                        <option value="<?=$arr[$i]['site_name']?>" <?php if($arr[$i]['site_name']==$_REQUEST['report_site']){ echo "selected";} ?> ><?=$arr[$i]['site_name']?></option>
                                                        <?php
                                                        }
                                                        ?> 													
                                                        </select>
                                                    <div id="spinner5"></div>
                                                    </div>  
                                                    <div class="form-group">
                                                        <?php
                                                        $info["table"] = "department";
                                                        $info["fields"] = array("department.*"); 
                                                        $info["where"]   = "1   ORDER BY dept_name ASC";
                                                        $arr =  $db->select($info);
                                                        ?> 
                                                        <label class="label">Department</label> <br>
                                                        <select name="report_department"  id="report_department" onChange="reportFillEquipmenttype(this.value);">
                                                        <option value="">--All--</option>
                                                        <?php
                                                        for($i=0;$i<count($arr);$i++)
                                                        {
                                                        ?>
                                                        <option value="<?=$arr[$i]['dept_name']?>"  <?php if($arr[$i]['dept_name']==$_REQUEST['report_department']){ echo "selected";} ?>  ><?=$arr[$i]['dept_name']?></option>
                                                        <?php
                                                        }
														
													 	$count = 0;
													    for($i=0;$i<count($arr);$i++)
														{
															if($arr[$i]['dept_name']!=$department){
																$count++;
															}
														}
														if($count==count($arr)){
														?>
                                                        <option value="<?=$_REQUEST['report_department']?>"  selected><?=$_REQUEST['report_department']?></option>
                                                        <?php	
														}
														?> 				
                                                        </select>
                                                    <div id="spinner6"></div>
                                                    </div>  
                                                    <div class="form-group">
                                                        <?php
                                                        $info["table"] = " equipment_type";
                                                        $info["fields"] = array("equipment_type.*"); 
                                                        $info["where"]   = "1   ORDER BY equip_type_name ASC";
                                                        $arr =  $db->select($info);
                                                        ?> 
                                                        <label class="label">Equipment type</label> <br>
                                                        <select name="report_equipment_type" id="report_equipment_type" onChange="reportFillEquipment(this.value);">
                                                        <option value="">--All--</option>
                                                        <?php
                                                        for($i=0;$i<count($arr);$i++)
                                                        {
                                                        ?>
                                                        <option value="<?=$arr[$i]['equip_type_name']?>"   <?php if($arr[$i]['equip_type_name']==$_REQUEST['report_equipment_type']){ echo "selected";} ?>  ><?=$arr[$i]['equip_type_name']?></option>
                                                        <?php
                                                        }
                                                        ?> 
                                                        <?php
														  $count = 0;
                                                          for($i=0;$i<count($arr);$i++)
                                                            {
																if($arr[$i]['equip_type_name']!=$equipment_type){
																	$count++;
																}
                                                            }
															if($count==count($arr)){
														?>
                                                        <option value="<?=$_REQUEST['report_equipment_type']?>"  selected><?=$_REQUEST['report_equipment_type']?></option>
                                                        <?php	
														}
														?> 		
                                                        </select>
                                                    <div id="spinner7"></div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <?php
                                                        $info["table"] = "equipment";
                                                        $info["fields"] = array("equipment.*"); 
                                                        $info["where"]   = "1   ORDER BY equipment_name ASC";
                                                        $arr =  $db->select($info);
                                                        ?> 
                                                        <label class="label">Equipment</label> <br>
                                                        <select name="report_equipment_name" id="report_equipment_name">
                                                        <option value="">--All--</option>
                                                        <?php
                                                        for($i=0;$i<count($arr);$i++)
                                                        {
                                                        ?>
                                                        <option value="<?=$arr[$i]['equipment_name']?>"   <?php if($arr[$i]['equipment_name']==$_REQUEST['report_equipment_name']){ echo "selected";} ?>  ><?=$arr[$i]['equipment_name']?></option>
                                                        <?php
                                                        }
                                                        ?> 				
                                                        </select>
                                                    </div> 
                                                </div> 
                                                <div class="col-lg-3 col-md-3"> 
                                                    <b>Status</b>
                                                    <div class="form-group">
                                                        <label class="label">Status</label><br>
                                                        <?php
                                                        $enumticket = getEnumFieldValues('ticket','status');
                                                        ?>
                                                        <select  name="report_status" id="report_status"   class="textbox">
                                                        <option value="">--All--</option>
                                                        <?php
                                                        foreach($enumticket as $key=>$value)
                                                        { 
                                                        ?>
                                                        <option value="<?=$value?>" <?php if($value==$_REQUEST['report_status']){ echo "selected"; }?>><?=$value?></option>
                                                        <?php
                                                        }
                                                        ?> 
                                                        </select>
                                                    </div>                      
                                                    <div class="form-group">                  
                                                        <label class="label">Priority</label><br>
                                                        <?php
                                                        $enumticket = getEnumFieldValues('ticket','priority');
                                                        ?>
                                                        <select  name="report_priority" id="report_priority"   class="textbox">
                                                        <option value="">--All--</option>
                                                        <?php
                                                        foreach($enumticket as $key=>$value)
                                                        { 
                                                        ?>
                                                        <option value="<?=$value?>" <?php if($value==$_REQUEST['report_priority']){ echo "selected"; }?>><?=$value?></option>
                                                        <?php
                                                        }
                                                        ?> 
                                                        </select>
                                                    </div> 
                                                    <div class="form-group"> 
                                                        <label class="label">Ticket Status</label><br>
                                                        <?php
                                                        $enumticket = getEnumFieldValues('ticket','ticket_status');
                                                        ?>
                                                        <select  name="report_ticket_status" id="report_ticket_status"   class="textbox">
                                                        <option value="">--All--</option>
                                                        <?php
                                                        foreach($enumticket as $key=>$value)
                                                        { 
                                                        ?>
                                                        <option value="<?=$value?>" <?php if($value==$_REQUEST['report_ticket_status']){ echo "selected"; }?>><?=$value?></option>
                                                        <?php
                                                        }
                                                        ?> 
                                                        </select>
                                                    </div> 
                                                    
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                  <b>Assigned</b>                                               
                                                  <div class="form-group">   
                                                        <label class="label">Assigned To Users</label><br>
                                                        <?php
                                                        $info['table']    = "users";
                                                        $info['fields']   = array("*");   	   
                                                        $info['where']    =  "1=1 ORDER BY id DESC";
                                                        $resusers  =  $db->select($info);
                                                        ?>
                                                        <select  name="report_assigned_to_users_id" id="report_assigned_to_users_id"   class="textbox">
                                                        <option value="">--All--</option>
                                                        <?php
                                                        foreach($resusers as $key=>$each)
                                                        { 
                                                        ?>
                                                        <option value="<?=$resusers[$key]['id']?>" <?php if($resusers[$key]['id']==$_REQUEST['report_assigned_to_users_id']){ echo "selected"; }?>><?=$resusers[$key]['first_name']?> <?=$resusers[$key]['last_name']?></option>
                                                        <?php
                                                        }
                                                        ?> 
                                                        </select> 
                                                  </div> 
                                                </div> 
                                                </div>    
                                                <div class="col-md-6 panel panel-card">                      
                                                    <div class="col-lg-4 col-md-4">
                                                       <div class="form-group">
                                                          <div id="datepicker" name="datepicker" class="datepicker"></div>
                                                       </div>
                                                    </div>
                                                </div>     
                                            </div> 
                                           
                                            <div class="col-md-12">                                                 
                                                 <input type="hidden" name="cmd" value="search" onClick="load_table();">
                                                 <input type="submit" value="Search" class="md-btn md-raised m-b btn-fw green-700 waves-effect has-value" onClick="reload_load_table();">
                                                  <br>
                                                 <div id="spinner8"></div>
                                            </div>
                                      </fieldset> 
                                      
                                 
                                <!--</form>  -->
                            </div>
                               <!--End of Column2--> 
                            <div class="col-md-12 ">
                             <br><br><br>
                            </div>
                            <div class="col-md-12  panel panel-card">
                                      
                                 <div class="col-lg-12 col-md-12" align="center">
                                   <div class="row no-gutter">
                                    
                                       <div class="table-responsive">
                                         <table id="dashboard_ticket_table" class="table table-striped b-t b-b" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th  style="width:20%">Ticket #</th>
                                                    <th  style="width:25%">Date Opened</th>
                                                    <th  style="width:25%">Department</th>
                                                    <th  style="width:15%">Equipment</th>
                                                    <th  style="width:15%">Assigned to</th>
                                                    <th  style="width:15%">Date Closed</th>
                                                    <th  style="width:15%">Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th> 
                                                    <th  style="width:20%">Ticket #</th>
                                                    <th  style="width:25%">Date Opened</th>
                                                    <th  style="width:25%">Department</th>
                                                    <th  style="width:15%">Equipment</th>
                                                    <th  style="width:15%">Assigned to</th>
                                                    <th  style="width:15%">Date Closed</th>
                                                    <th  style="width:15%">Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                       
                                        </div>
                                      
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
  <style>
     .ui-widget {
		   width:600px; 
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
				buttonImage: '../../images/calendar.gif',
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















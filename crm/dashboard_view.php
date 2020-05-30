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
 
 <style>
   .ui-widget-header{
	  background:none;   
   }
 </style>  
  
  <script language="javascript">
   	/////////////////////////////////////Load data table////////////////////
	////////////////////////////////////////////////////////////////////////
	dateClickd = 0;
	function load_table(dateClickd)
	   {
		   if(dateClickd==1)
		   {
			 report_date = $("#datepicker").val(); 
		   } 
		   else
		   {
			 report_date = '' ;
		   }
		   
		   
		   $("#spinner").html('<img src="../images/hidden_progress_bar.gif" alt="Wait" />'); 
		   
		   if($("#ticket_type_ticket").is(':checked')){
     			table ="ticket";
			} 
			else if($("#ticket_type_schedule").is(':checked')){
				table ="schedule";
			}
			
			var table = $('#dashboard_ticket_table').DataTable( {
				"ajax": {
							'type': 'POST',
							'url':  "dashboard.php?cmd=json",
							'data': {
									 report_site  : $("#report_site").val(),
									 table        : table, 
									 report_date  : report_date,
								  }
				       },
				"columnDefs": [
				{
					"targets": [ 0 ],
					"visible": false,
					"searchable": false
				}, ],
				"language": {
					  "emptyTable": "No data available in table"
					}
			} );
			
			
			
		  $(".dataTables_empty").html("No data available in table");
			
		  $("#spinner").html('');  
	  }
	
	
	$(document).ready(function() {
		
	   load_table(dateClickd);
	
	} );
	//////////////////////////////////////////////////////////////////////////
  
  
  
  function reload_load_table(dateClickd)
  {
	  var oTable = $('#dashboard_ticket_table').dataTable();
	  oTable.fnDestroy();
	  load_table(dateClickd);
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
                        
                              
                            <!--<div class="col-md-12">
                                    <div  align="center">
                                       <?php
									      // include("../includes/crmNav.php");
									   ?>
                                   </div>                                                                   
                                           
                            </div>--><!--End of Column1--> 
                            
                            
                               <!--End of Column2--> 
                           
                            <div class="col-md-12  panel panel-card">
                                    <div class="col-lg-4 col-md-4">
                                         <div class="form-group">                                             
                                             <label><b>Current Day's Equipment Schedule</b></label> <input type="radio" name="ticket_type"  id="ticket_type_schedule" class="radio-inline" onclick="reload_load_table(0);">
                                             <label><b>Open Tickets</b></label> <input type="radio" name="ticket_type"  id="ticket_type_ticket" checked="checked" class="radio-inline"  onclick="reload_load_table(0);">
                                          </div>
                                         
                                          <div class="form-group">
                                            <label><b>Site</b></label>
                                            <?php
                                            $info["table"] = "site";
                                            $info["fields"] = array("site.*"); 
                                            $info["where"]   = "1   ORDER BY site_name ASC";
                                            $arr =  $db->select($info);
                                            ?> 
                                            <select name="report_site" id="report_site" class="form-control-static" onChange="reload_load_table(0);">
                                            <option value="">--All Site--</option>
                                            <?php
                                            for($i=0;$i<count($arr);$i++)
                                            {
                                            ?>
                                            <option value="<?=$arr[$i]['site_name']?>" <?php if($arr[$i]['site_name']==$_REQUEST['report_site']){ echo "selected";} ?> ><?=$arr[$i]['site_name']?></option>
                                            <?php
                                            }
                                            ?> 													
                                            </select>
                                        </div>  
                                       <div class="form-group">           
                                          <div id="datepicker" name="datepicker" class="datepicker"></div>
                                       </div>
                                       <div class="form-group"> 
                                         <div id="spinner" style="display:block;"></div>
                                       </div>
                                    </div>
                                 
                                      <div class="col-lg-8 col-md-8">                                      
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
                                                    <th  style="width:15%">Status</th>
                                                    <th  style="width:15%">Days Open</th>
                                                </tr>
                                            </thead>
                                            <!--<tfoot>
                                                <tr>
                                                    <th>ID</th> 
                                                    <th  style="width:20%">Ticket #</th>
                                                    <th  style="width:25%">Date Opened</th>
                                                    <th  style="width:25%">Department</th>
                                                    <th  style="width:15%">Equipment</th>
                                                    <th  style="width:15%">Assigned to</th>
                                                    <th  style="width:15%">Status</th>
                                                    <th  style="width:15%">Days Open</th>
                                                </tr>
                                            </tfoot>-->
                                        </table>
                                       
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
		   width:450px; 
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
				onSelect: function (date) {
						reload_load_table(1);
					}
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















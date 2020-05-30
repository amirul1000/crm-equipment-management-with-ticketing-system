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
                <div class="logo pull-right pull-up"><img src="../images/1.png" alt="U" style="height:60px;width: auto;"></div>
            </div>
            
            <div class="box-row">
                <div class="box-cell">
                    <div class="box-inner padding">                             
                        <div class="row">
                        
                        

                          
                           <div class="panel panel-card">
                            <div class="panel-heading"><h3>Users type</h3></div>
                            <div class="panel-body">
                            </div>
                            &nbsp;&nbsp;&nbsp;<a href="users_type.php?cmd=list" class="btn green">List</a> 
                                <table class="table">
                                     <tr>
                                      <td>  
        
                                         <form name="frm_users_type" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
                                          <div class="portlet-body">
                                           <div class="table-responsive">	
                                            <table class="table">
                                                 <tr>
                                                     <td>Name</td>
                                                     <td>
                                                        <input type="text" name="name" id="name"  value="<?=$name?>"   class="form-control-static">
                                                     </td>
                                                 </tr>
                                                 <tr> 
                                                     <td align="right"></td>
                                                     <td>
                                                        <input type="hidden" name="cmd" value="add">
                                                        <input type="hidden" name="id" value="<?=$Id?>">			
                                                        <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="button_blue">
                                                     </td>     
                                                 </tr>
                                                </table>
                                                </div>
                                                </div>
                                        </form>
                                      </td>
                                     </tr>
                                </table>
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












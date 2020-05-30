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
                            <div class="panel-heading"><h3>Users</h3></div>
                            <div class="panel-body">
                            </div>	
                            &nbsp;&nbsp;&nbsp;<a href="users.php?cmd=list" class="btn green">List</a>
	                <table class="table">
							 <tr>
							  <td>  

								 <form name="frm_users" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
						 <td>Email</td>
						 <td>
						    <input type="text" name="email" id="email"  value="<?=$email?>"   class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Password</td>
						 <td>
						    <input type="text" name="password" id="password"  value="<?=$password?>"   class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Title</td>
						 <td>
						    <input type="text" name="title" id="title"  value="<?=$title?>"   class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>First Name</td>
						 <td>
						    <input type="text" name="first_name" id="first_name"  value="<?=$first_name?>"   class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Last Name</td>
						 <td>
						    <input type="text" name="last_name" id="last_name"  value="<?=$last_name?>"   class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Company</td>
						 <td>
						    <input type="text" name="company" id="company"  value="<?=$company?>"   class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Address</td>
						 <td>
						    <input type="text" name="address" id="address"  value="<?=$address?>"   class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>City</td>
						 <td>
						    <input type="text" name="city" id="city"  value="<?=$city?>"   class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>State</td>
						 <td>
						    <input type="text" name="state" id="state"  value="<?=$state?>"   class="form-control-static">
						 </td>
				     </tr><tr>
						 <td>Zip</td>
						 <td>
						    <input type="text" name="zip" id="zip"  value="<?=$zip?>"   class="form-control-static">
						 </td>
				     </tr>
                     <tr>
							 <td>Country</td>
							 <td><?php
							$info['table']    = "country";
							$info['fields']   = array("*");   	   
							$info['where']    =  "1=1 ORDER BY id DESC";
							$rescountry  =  $db->select($info);
						?>
						<select  name="country_id" id="country_id"     class="form-control-static">
							<option value="">--Select--</option>
							<?php
							   foreach($rescountry as $key=>$each)
							   { 
							?>
							  <option value="<?=$rescountry[$key]['id']?>" <?php if($rescountry[$key]['id']==$country_id){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
							<?php
							 }
							?> 
						</select></td>
					  </tr>
                      <tr>
						 <td>Created At</td>
						 <td>
						    <input type="text" name="created_at" id="created_at"  value="<?=$created_at?>" class="datepicker">
						 </td>
				     </tr><tr>
						 <td>Updated At</td>
						 <td>
						    <input type="text" name="updated_at" id="updated_at"  value="<?=$updated_at?>" class="datepicker">
						 </td>
				     </tr>
                     <tr>
		           		 <td>User Type</td>
				   		 <td>
						    <?php
							     unset($info);
								$info["table"] = "users_type";
								$info["fields"] = array("users_type.*"); 
								$info["where"]   = "1 ORDER BY name ASC";
								$res2 =  $db->select($info);
							?>
							<select  name="users_type" id="users_type" class="form-control-static">
							<?php
							  for($j=0;$j<count($res2);$j++)
                               {
							?>
							  <option value="<?=$res2[$j]['name']?>" <?php if($res2[$j]['name']==$users_type){ echo "selected"; }?>><?=$res2[$j]['name']?></option>
							 <?php
							   }
							?> 
							</select>
                            </td>
				     </tr>
                 
                      <tr>
		           		 <td>Left Menu</td>
				   		 <td>[PRESS  CNTRL + SELECT OPTION]<br />
						      <?php
							     $arr3  =  explode(",",$left_menu); 
							      
						         unset($info);
								$info["table"] = "left_menu";
								$info["fields"] = array("left_menu.*"); 
								$info["where"]   = "1  ORDER BY name ASC";
								$arr2 =  $db->select($info);
						  	  ?>
                                <select name="left_menu[]" size="10"  class="form-control-static" multiple="multiple"> 
                              <?php	
								for($j=0;$j<count($arr2);$j++)
                                {   
								    $selected ="";
								    foreach($arr3 as $key=>$value)
									{
									   if($arr2[$j]['name']==trim($value))
									   {
										   $selected = 'selected="selected"';
										   break;
									   }
									} 
							   ?>
                                 <?=$arr2[$j]['name']?>
                                 <option value="<?=$arr2[$j]['name']?>" <?=$selected?> /><?=$arr2[$j]['name']?></option>
								<?php
                                 }
                                ?> 
                                </select>
                              
                            </td>
				   </tr>
                    <tr>
						 <td valign="top">Roles</td>
						<td>[PRESS  CNTRL + SELECT OPTION]<br />
						      <?php
							     $arr3  =  explode(",",$roles); 
							      
						         unset($info);
								$info["table"] = "roles";
								$info["fields"] = array("roles.*"); 
								$info["where"]   = "1  ORDER BY name ASC";
								$arr2 =  $db->select($info);
						  	  ?>
                                <select name="roles[]" size="10" class="form-control-static" multiple="multiple"> 
                              <?php	
								for($j=0;$j<count($arr2);$j++)
                                {   
								    $selected ="";
								    foreach($arr3 as $key=>$value)
									{
									   if($arr2[$j]['name']==trim($value))
									   {
										   $selected = 'selected="selected"';
										   break;
									   }
									} 
							   ?>
                                 <?=$arr2[$j]['name']?>
                                 <option value="<?=$arr2[$j]['name']?>" <?=$selected?> /><?=$arr2[$j]['name']?></option>
								<?php
                                 }
                                ?> 
                                </select>
                              
                            </td>
				     </tr>
                     <tr>
		           		 <td>Status</td>
				   		 <td><?php
	$enumusers = getEnumFieldValues('users','status');
?>
<select  name="status" id="status"     class="form-control-static">
<?php
   foreach($enumusers as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$status){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select></td>
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
				buttonImage: '../images/calendar.gif',
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










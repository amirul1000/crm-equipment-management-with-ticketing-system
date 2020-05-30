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
                         
                          <div class="panel panel-card">
                            <div class="panel-heading"><h3/>Left Menu</h3></div>
                            <div class="panel-body">
                            </div>
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
											  $("#delete_all_form").submit();
										   }
									   }
									 }
								  </script>       
                                  
                            &nbsp;&nbsp;&nbsp;<a href="left_menu.php?cmd=edit" class="btn green">Add a Left Menu</a>
                <table class="table">
                 <tr>
						<td align="center" valign="top">
						  <form name="search_frm" id="search_frm" method="post">
							<div class="portlet-body">
					         <div class="table-responsive">	
				                <table class="table">
									  <TR>
                                        <td width="70%"></td>
										<TD  nowrap="nowrap">
										  <?php
											  $hash    =  getTableFieldsName("left_menu");
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
										   <input type="text"    name="field_value" id="field_value" value="<?=$_SESSION["field_value"]?>"   class="form-control-static"></TD>
										<td nowrap="nowrap" align="right">
										  <input type="hidden" name="cmd" id="cmd" value="search_left_menu" >
										  <input type="submit" name="btn_submit" id="btn_submit"  value="Search" class="button" />
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
							<tr bgcolor="#ABCAE0">
                                <td  align="center">
                                      <input type="checkbox" name="chk_all"  id="chk_all"  onclick="checkAll();">
                                </td>
								<td>Name</td>			  
								<td>Action</td>
							</tr>
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
						 
								$rowsPerPage = 10;
								$pageNum = 1;
								if(isset($_REQUEST['page']))
								{
									$pageNum = $_REQUEST['page'];
								}
								$offset = ($pageNum - 1) * $rowsPerPage;  
						 
						 
											  
								$info["table"] = "left_menu";
								$info["fields"] = array("left_menu.*"); 
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
                                 <input type="hidden" name="cmd" value="delete_all">
                                 </form>
                                 <?php		
                                    }
                                 ?>
                              </td>
                              <td><?=$arr[$i]['name']?></td>			  
							  <td nowrap >
								  <a href="left_menu.php?cmd=edit&id=<?=$arr[$i]['id']?>"  class="btn default btn-xs purple"><i class="fa fa-edit"></i>Edit</a>
								  <a href="left_menu.php?cmd=delete&id=<?=$arr[$i]['id']?>" class="btn btn-sm red filter-cancel"  onClick=" return confirm('Are you sure to delete this item ?');"><i class="fa fa-times"></i>Delete</a> 
							 </td>
						
							</tr>
						<?php
								  }
						?>
						<tr>
                            <td  align="center">
                                <select name="select_action"  id="select_action"   class="form-control-static"  onChange="set_action(this.value);">
                                   <option value="">Seelct</option>
                                   <option value="delete_all">Delete All</option>
                                </select>
                            </td>
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
					
									   $info["table"] = "left_menu";
									   $info["fields"] = array("count(*) as total_rows"); 
									   $info["where"]   = "1  $whrstr ORDER BY id DESC";
									  
									   $res  = $db->select($info);  
					
												
										$numrows = $res[0]['total_rows'];
										$maxPage = ceil($numrows/$rowsPerPage);
										$self = 'left_menu.php?cmd=list';
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














<?php
  $b_name_file = basename($_SERVER['SCRIPT_FILENAME']);
  $b_name_arr  = explode(".",$b_name_file);
  $b_name      = $b_name_arr[0];
?>
<script language="javascript">
  $( document ).ready(function() {
	  
	   var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	   boxElement = document.getElementById("header_id");
	   boxElement.style.left = Math.floor(w /5) + 'px';
	  // boxElement.style.display = 'block';
   });
   $(window).resize(function(){
       var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	   boxElement = document.getElementById("header_id");
	   boxElement.style.left = Math.floor(w /5) + 'px';
   });
</script>
    <span id="header_id" style="align:middle;position:relative;top:10px;left:350px;">
        <a href="../crm/dashboard.php" class="md-btn md-flat m-b btn-fw   text-primary  waves-effect" <?php if($b_name!="dashboard"){ ?> style="color:#FFF;" <?php } ?>>Dashboard</a> 
        <a href="../crm/open_tickets.php?cmd=list" class="md-btn md-flat m-b btn-fw   text-primary  waves-effect" <?php if($b_name!="open_tickets"){ ?> style="color:#FFF;"<?php } ?>>Open Tickets</a> 
        <a href="../crm/equipment_schedule.php?cmd=list" class="md-btn md-flat m-b btn-fw    text-primary  waves-effect" <?php if($b_name!="equipment_schedule"){ ?> style="color:#FFF;"<?php } ?>>Equepment Schedule</a> 
        <a href="../crm/equipment_database.php?cmd=list" class="md-btn md-flat m-b btn-fw   text-primary  waves-effect"  <?php if($b_name!="equipment_database"){ ?> style="color:#FFF;"<?php } ?>>Equepment Database</a> 
    </span>
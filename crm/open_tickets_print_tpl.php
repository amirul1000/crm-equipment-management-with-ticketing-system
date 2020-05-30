<!--mpdf
<htmlpagefooter name="myfooter" >				
<hr>	
<table cellspacing="3" cellpadding="3" width="100%">
<tr>
  <td align="left" width="33%" valign="top">   
      <img src="../images/logo.png" style="height:40px;">
  </td>
  <td align="center" width="33%" valign="top">   
      {PAGENO} of {nb}
  </td>
  <td align="right" width="33%" valign="top">   
  </td>
</tr>
</table>

</htmlpagefooter>

<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->

  <table cellspacing="1" cellpadding="1" width="100%">
   <tr>
      <td  width="33%" valign="top" align="left"> 
         <div style="float:left;top:50px;">
          <img src="../images/logo.png" style="height:80px;">
         </div>
      </td>   
      <td width="33%" valign="top" align="center">
            <h3>Open ticket</h3>
      </td>
      <td width="33%" valign="top" align="right">
           <?=date("M j , Y H:i:s",strtotime(date("Y-m-d H:i:s")))?>
      </td>
    </tr>
  </table>  

<table cellspacing="1" cellpadding="1" width="100%">
        <tr bgcolor="#ABCAE0">
        <td>Ticket no</td>
        <td>Date open</td>
        <td>Priority</td>
        <td>Ticket status</td>
        <td>Summary</td>
        <td>Site</td>
        <td>Department</td>
        <td>Equipment type</td>
        <td>Equipment name</td>
        <td>Assigned to</td>
        <td>Date closed</td>
        </tr>
     <?php
			if(isset($_REQUEST['id']))
			{
			 $whrstr .= "AND ticket.id='".$_REQUEST['id']."'";   
			}
			
			
			if(isset($_REQUEST['month']) && isset($_REQUEST['year']))
			{
			  $start    = $_REQUEST['year'].'-'.$_REQUEST['month'].'-1'; 
			  $end_day  = cal_days_in_month(CAL_GREGORIAN,$_REQUEST['month'],$_REQUEST['year']);
			  $end      = $_REQUEST['year'].'-'.$_REQUEST['month'].'-'.$end_day; 	
			  $whrstr  .= "AND ticket.date_open BETWEEN '$start'  AND '$end'"; 
			}
			
			foreach($_REQUEST['chk'] as $key=>$value)
			{
			   $id_arr[] = $value;
			}
			
			if(count($id_arr)>0)
			{
				$id_list = implode(",",$id_arr);   
				$whrstr .= " AND ticket.id in (".$id_list.")";    
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
        <tr bgcolor="<?=$row?>">
          <td valign="top"><?=$arr[$i]['ticket_no']?></td>
          <td valign="top"><?=$arr[$i]['date_open']?></td>
          <td valign="top"><?=$arr[$i]['priority']?></td>
          <td valign="top"><?=$arr[$i]['ticket_status']?></td>
          <td valign="top"><?=$arr[$i]['summary']?></td>
          <td valign="top"><?=$arr[$i]['site']?></td>
          <td valign="top"><?=$arr[$i]['department']?></td>
          <td valign="top"><?=$arr[$i]['equipment_type']?></td>
          <td valign="top"><?=$arr[$i]['equipment_name']?></td>
          <td valign="top"><?=$arr[$i]['assigned_to']?></td>
          <td valign="top"><?=$arr[$i]['date_closed']?></td>
        </tr>
    <?php
              }
    ?>
    
    </table>
  
    
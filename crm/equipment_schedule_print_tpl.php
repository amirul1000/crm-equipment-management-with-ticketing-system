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
            <h3>Equipment Schedule</h3>
      </td>
      <td width="33%" valign="top" align="right">
           <?=date("M j , Y H:i:s",strtotime(date("Y-m-d H:i:s")))?>
      </td>
    </tr>
</table>  

<table cellspacing="1" cellpadding="1" width="100%">
    <thead>
        <tr bgcolor="#ABCAE0">
            <th>Site</th>
            <th>Department</th>
            <th>Equipment name</th>
            <th>Equipment type</th>
            <th>Date from</th>
            <th>Date to</th>
            <th>Duration</th>
            <th>Notes</th>
            <th>Date created</th>
        </tr>  
    </thead>  
    <?php
         if(isset($_REQUEST['id']))
		   {
			 $whrstr .= "AND id='".$_REQUEST['id']."'";   
		   }
		  
		  foreach($_REQUEST['chk'] as $key=>$value)
		  {
			 $id_arr[] = $value;
		  }
		 
		  if(count($id_arr)>0)
		  {
			$id_list = implode(",",$id_arr);   
			$whrstr .= " AND id in (".$id_list.")";    
		  }
                      
        $info["table"] = "schedule";
        $info["fields"] = array("schedule.*"); 
        $info["where"]   = "1   $whrstr ORDER BY id DESC";
                            
        
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
      
      <td valign="top"><?=$arr[$i]['site']?></td>
      <td valign="top"><?=$arr[$i]['department']?></td>
      <td valign="top"><?=$arr[$i]['equipment_name']?></td>
      <td valign="top"><?=$arr[$i]['equipment_type']?></td>
      <td valign="top"><?=$arr[$i]['date_from']?> </td>
      <td valign="top"><?=$arr[$i]['date_to']?></td>
      <td valign="top">
           <?=$arr[$i]['duration']?> 
      </td>
      <td valign="top"><?=$arr[$i]['notes']?></td>
      <td valign="top"><?=$arr[$i]['date_created']?></td>
      
    </tr>
    <?php
          }
    ?>
</table>
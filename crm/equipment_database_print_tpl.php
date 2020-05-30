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
            <h3>Equipment Database</h3>
      </td>
      <td width="33%" valign="top" align="right">
           <?=date("M j , Y H:i:s",strtotime(date("Y-m-d H:i:s")))?>
      </td>
    </tr>
  </table>  


  <table cellspacing="1" cellpadding="1" width="100%">
    <tr bgcolor="#ABCAE0">
    <td>Equipment ID</td>
    <td>Site</td>
    <td>Department</td>
    <td>Equipment Name</td>
    <td>Equipment Type</td>
    <td>File Equpment Info</td>
    <td>Date Created</td>
    <td>Date Updated</td>
    </tr>
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
      
        $info["table"] = "equipment";
        $info["fields"] = array("equipment.*"); 
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
      <td valign="top"><?=$arr[$i]['equipmentid']?></td>
      <td valign="top"><?=$arr[$i]['site']?></td>
      <td valign="top"><?=$arr[$i]['department']?></td>
      <td valign="top"><?=$arr[$i]['equipment_name']?></td>
      <td valign="top"><?=$arr[$i]['equipment_type']?></td>
      <td valign="top">
          <?php 
               echo $_SERVER['HTTP_HOST'].'/'.$arr[$i]['file_equpment_info'];
                   
                   unset($info);
                $info['table']    = "equipment_attach";
                $info['fields']   = array("*");   	   
                $info['where'] = "equipment_id='".$arr[$i]['id']."'";
                $res2  =  $db->select($info);
                if(count($res2)>0)
                {
                    echo "<br>";
                }
                for($j=0;$j<count($res2);$j++)
                {  
                    echo $_SERVER['HTTP_HOST'].'/'.$res2[$j]['attach'];
                    echo "<br>";
                }
       
          ?>
      </td>
      <td valign="top"><?=$arr[$i]['date_created']?></td>
      <td valign="top"><?=$arr[$i]['date_updated']?></td>
    </tr>
<?php
          }
?>

</table>
                
      
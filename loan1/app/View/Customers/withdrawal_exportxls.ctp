<STYLE type="text/css">
	.tableTd {
	   	border-width: 0.5pt; 
		border: solid;
		text-align: center;
	}
	.tableTdContent{
		border-width: 0.5pt; 
		border: solid;
		text-align: center;
	}
	#titles{
		font-weight: bolder;
		text-align: center;
	}
   
</STYLE>
<table><!--
	<tr>
		<td><b>Export To Excel Sample<b></td>
	</tr>
	<tr>
		<td><b>Date:</b></td>
		<td><?php echo date("F j, Y, g:i a"); ?></td>
	</tr>
	<tr>
		<td><b>Number of Rows:</b></td>
		<td style="text-align:left"><?php echo count($rows);?></td>
	</tr>-->
	
		<tr id="titles">
			
                        <td class="tableTd"><b>Name</b></td>
			<td class="tableTd"><b>Address</b></td>
			<td class="tableTd"><b>Amount</b></td>
			<td class="tableTd"><b>Deposit</b></td>
                        <td class="tableTd"><b>Withdrawal</b></td>
			<td class="tableTd"><b>Items</b></td>
			<td class="tableTd"><b>Signature</b></td>
			
		</tr>		
		<?php foreach($rows as $row):
                 $cret= $row['Customer']['created'];
    //pr($cret);die;
    $date1= date('d-m-Y',strtotime($cret));
      $cret1= $row['Customer']['created'];
         $date2= date('d-m-Y',strtotime($cret1));         
                
                
			echo '<tr>';
			
                        echo '<td class="tableTdContent">'.$row['Customer']['name'].'</td>';
			echo '<td class="tableTdContent">'.$row['Customer']['address'].'</td>';
			echo '<td class="tableTdContent">' .'Rs.'  .$row['Customer']['amount'].'</td>';
			echo '<td class="tableTdContent">'?><?php echo $date1;?><?php            '</td>';
                        echo '<td class="tableTdContent">'?><?php echo $date2;?><?php            '</td>';
			echo '<td class="tableTdContent">' ?>  <?php  
                      
        $sam='';
        foreach($row['Item'] as $ran){ 
      $sam .= $ran['name'].','; 
        } 
       echo rtrim($sam,',');?></td><?php
                        
                        
			
			echo '</tr>';
			endforeach;
		?>
</table>

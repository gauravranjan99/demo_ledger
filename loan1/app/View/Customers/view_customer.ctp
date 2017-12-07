
<script>
function goBack()
  {
  window.history.back()
  }
</script>
<center><b><u>Details Of Customer You Selected</u></b></center><br/><br/>
<?php echo $this->Html->link('Click here for Payments Details',array('controller'=>'Customers','action'=>'pay',$post['Customer']['id']),array('style'=>'float:right;text-decoration:none;color:green'));?>
   
<b style="color: grey"> Customer ID:</b> <?php echo $post['Customer']['id']; ?><br><br>
<b style="color: grey">Name:</b> <?php $name= $post['Customer']['name'];
echo ucwords($name);

?><br><br>
<b style="color: grey">Address:</b> <?php echo $post['Customer']['address']; ?><br><br>
<b style="color: grey">Item:</b>

<?php
 $sam='';
        foreach($post['Item'] as $ran){
         $www=$ran['weight'];
        
         $sam .= $ran['name'] .'(' .$ran['weight'] .'gm)'  .'&nbsp;'  .','; 
       } 
         echo rtrim($sam,',');
         ?>
<br><br>
<b style="color: grey">Total Amount:</b> Rs. <?php

echo base64_decode($total);
 ?><br><br>
 
<b style="color: grey">Total Payment:</b>

 <?php
        foreach($sum as $ran){
         $www=$ran[0];
        if(empty($www['total_sum'])){
         echo "No Payments";
        }
        else{
        echo "Rs." .$www['total_sum'];}
         
       } 
        
        
         ?><br><br>

<b style="color: grey">Deposit:</b><?php $dep_date= $post['Customer']['created'];
                 $depdate= date('d-m-Y h:i:s',strtotime($dep_date));


?>
&nbsp;&nbsp;<?php echo $depdate; ?><br><br>
<b style="color: red">Remaining Balance:</b>Rs
<?php
$amt=base64_decode($total);
$tot=$www['total_sum'];
$rem=$amt-$tot;
echo $rem;
?>

</table>
<br><br>
<center>
<input type="button" value="Back" onclick="goBack()" class="classname">
</center>

<script>
function goBack()
  {
  window.history.back()
  }
</script>

<center>
<h3 style="color: red">PAYMENTS OF CUSTOMERS</h3>

    <?php echo $this->Form->create('Customer',array('controller'=>'customer','action'=>'pay')); ?>
    <table>
    <tr><td></td><td><?php echo $this->Form->input('Customer.id', array('type' => 'hidden'));?></td>

</tr>   
        <tr>
            <td>Add Payment</td>
             <td><?php echo $this->Form->input('Payment.pay',array('label'=>false,'autocomplete'=>'off')); ?></td>
        </tr>
    </table>
            <?php echo $this->Form->input('Submit',array('type'=>'submit','label'=>false,'div'=>false,'class'=>'myButton'));?>
             <?php echo $this->Form->end();?>
</center>

<br>
<?php 
if(empty($result)) {
    ?>
<h3 style="color: #FF4D49">No Payments By Customer</h3>
<?php } else { ?>
Name:
<b style="color: #614051"><?php $name= $result[0]['Customer']['name'];
echo ucwords($name);
?></b>
<table border="1">
<tr>
<th>Payment</th>
<th>Date</th>
</tr>

<?php
$sum='';
foreach($result as $a){
    $tot=$a['Payment']['pay'];
    $sum =$sum+$tot;
   $cret= $a['Payment']['created'];
    $date1= date('d-m-Y',strtotime($cret));
    ?>
    
<tr>

<td style="text-align: center;width: 150px;">Rs.<?php echo $a['Payment']['pay']; ?></td>
<td style="text-align: center;width: 150px;"><?php echo $date1; ?></td>

</tr>
<?php } ?>
<tr><td colspan="2" style="text-align: center"><b>Total:</b>&nbsp;<?php echo "Rs." .$sum; ?></td></tr>
</table>

<?php } ?><br><br><br><br>
<center>
<input type="button" value="Back" onclick="goBack()" class="classname"></center>

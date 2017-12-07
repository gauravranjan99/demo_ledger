
<center>
<?php echo $this->Form->create('Customer',array('type'=>'get','action'=>'search'));?>
<table>
<tr>
<td>Search Customers</td>
<td><?php echo $this->Form->input('Customer.searchfield',array('label'=>false,'div'=>false,'type'=>'text'));?></td>
<td>
    <?php echo $this->Form->input('Customer.select',array('type'=>'select','label'=>false,'options'=>array('Id','Name','Address','Amount'),'empty'=>'---select---'));?>

</td>
<td><?php echo $this->Form->input('Search',array('type'=>'submit','label'=>false,'class'=>'myButton'));?></td></tr>
<?php 
if(isset($_GET) && !empty($_GET['searchfield']))
	{

?>
<?php
if(empty($abc)) { ?>
<h3 style="color: red">there are no Customers</h3>
<?php } else { ?>
<table border="1">
<tr>

<th>Name</th>
<th>Address</th>
<th>Amount</th>
<th>Interset Rate</th>
<th>Created</th>
<th>Item</th>
<th>Months</th>
<th>Total Amount</th>
<th>Action</th>
</tr>
<?php 
foreach($abc as $a){
   $cret= $a['Customer']['created'];
    $date1= date('d-m-Y h:i:s',strtotime($cret));
    ?>
<tr>

<td style="text-align: center"><?php echo $a['Customer']['name']; ?></td>
<td style="text-align: center"><?php echo $a['Customer']['address']; ?></td>
<td style="text-align: left">Rs.<?php echo $a['Customer']['amount']; ?></td>
<td style="text-align: center"><?php echo $a['Customer']['interset_rate'].'%'; ?></td>
<td style="text-align: center"><?php echo $date1; ?></td>
<td style="text-align: center"><?php 
        $sam='';
        foreach($a['Item'] as $ran){ ?>
        <?php $sam .= $ran['name'].','; ?>
        <?php } ?>
        <?php echo rtrim($sam,',');?>
</td>
<td style="text-align: center"><?php
            $date1 = $a['Customer']['created'];
            $exp = explode(' ',$date1);
           $curdate1=date('Y');
            $curdate2=date('m');
                $datey = date('Y',strtotime($exp[0]));
                $datem = date('m',strtotime($exp[0]));
                $monthno1 = ($datey * 12) + $datem;
                $monthno2 = ($curdate1 * 12) + $curdate2;
                $months= ($monthno2 - $monthno1) + 1;
                  echo  $months;   
               
    ?>
</td>
<td style="text-align: left"><?php
    $p=$a['Customer']['amount'];
    $r=$a['Customer']['interset_rate'];
    $t=$months;
    $i=$p*$r*$t/100;
    $total = $p+$i;
    echo "Rs.".$total;
    ?>
</td>
<td style="text-align: center">
<?php echo  $this->Html->link('view',array('controller'=>'Customers','action'=>'view_customer',$a['Customer']['id'])); ?> &nbsp;

&nbsp;
<?php echo  $this->Html->link('delete',array('controller'=>'Customers','action'=>'delete',$a['Customer']['id']),array('confirm'=>'really want to delete this Customer ?')); ?> </td>

</tr>

<?php } ?>

</table>


<?php } }



	//}
	//else
	//{
	//$val='';
	//}
//echo $this->Form->input('Customer.searchfield',array('label'=>false,'div'=>false,'type'=>'text'));?>
</td>

<td>
<?php //echo $this->Form->input('Search',array('type'=>'submit','label'=>false,'class'=>'myButton'));?>

<?php echo $this->Form->end();?>
</td>
</tr>
</table><br><br>

 



</center>
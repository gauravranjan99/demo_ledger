
<center>
<?php echo $this->Form->create('Customer',array('type'=>'get','action'=>'view'));?>
<table>
<tr>
<td>Search Customers</td>
<td><?php echo $this->Form->input('Customer.searchfield',array('label'=>false,'div'=>false,'type'=>'text'));?></td>
<td>
    <?php echo $this->Form->input('Customer.select',array('type'=>'select','label'=>false,'options'=>array('Id','Name','Address','Amount'),'empty'=>'---select---'));?>

</td>
<td><?php echo $this->Form->input('Search',array('type'=>'submit','label'=>false,'class'=>'myButton'));?></td></tr>
</table><?php echo $this->Form->end();?>
</center>
<?php echo $this->Html->link($this->Html->image('download.jpg',array('height'=>'35px','width'=>'50px')),array('controller'=>'Customers','action'=>'customer_exportxls'),array('escape'=>false,'title'=>'Download CSV file','style'=>'float:right'));?>
<br><br>
<?php
if(empty($abc)) { ?>
<h3 style="color: red">There are no Customers</h3>
<?php } else { ?>
<table border="1">
<tr>
<th>Name</th>
<th>Address</th>
<th>Amount</th>
<th>Interset Rate</th>
<th>Deposited</th>
<th>Item</th>
<th>Place</th>
<th>Months</th>
<th>Total Amount</th>
<th>Action</th>
</tr>
<?php 
foreach($abc as $a){
   $cret= $a['Customer']['created'];
    $date1= date('d-m-Y',strtotime($cret));
    ?>
<tr style="height: 32px;">
<td style="text-align: center"><?php $name= $a['Customer']['name'];
if(strlen($name)>5){
echo substr($name,0, 6) .'...' ;}
else{
	echo $name;
}
?></td>
<td style="text-align: center;"><?php $addr= $a['Customer']['address'];
if(strlen($addr)>10){
echo substr($addr,0, 12) .'...' ;}
else{
	echo $addr;
}

?></td>
<td style="text-align: left">Rs.<?php echo $a['Customer']['amount']; ?></td>
<td style="text-align: center;width:80px;height: 30px"><?php echo $a['Customer']['interset_rate'].'%'; ?></td>
<td style="text-align: center;width: 165px;height: 30px"><?php echo $date1; ?></td>
<td style="text-align:left">
<?php 
        //$sam='';
       // foreach($a['Item'] as $ran){ ?>
        <?php// $sam .= $ran['name'].','; ?>
        <?php //} ?>
        <?php
	
	//echo rtrim($sam,',');?>


	<?php $sam='';
        foreach($a['Item'] as $ran){
		?>
        <?php $sam = $ran['name']; ?>
        <?php } ?>
        <?php
	if(strlen($sam)>4){
echo substr($sam,0, 7) .'...' ;}
else{
	echo $sam;
}?>
	
</td>
<td style="text-align: center"><?php echo strtoupper($a['Customer']['place']); ?></td>
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
<?php echo $this->Html->link($this->Html->image('View_details.jpg',array('height'=>'20px','width'=>'30px')),array('controller'=>'Customers','action'=>'view_customer',$a['Customer']['id'],base64_encode($total)),array('escape'=>false,'title'=>'view customers Details'));?>&nbsp;

<?php echo $this->Html->link($this->Html->image('edit.png',array('height'=>'20px','width'=>'25px')),array('controller'=>'Customers','action'=>'pay',$a['Customer']['id']),array('escape'=>false,'title'=>'Payments'));?>&nbsp;

<?php echo $this->Html->link($this->Html->image('delete.jpg',array('height'=>'25px','width'=>'30px')),array('controller'=>'Customers','action'=>'delete',$a['Customer']['id']),array('escape'=>false,'confirm'=>'really want to delete this Customer ?','title'=>'delete customers'));?>
 </td>
</tr>
<?php } ?>
</table>

<?php } ?>
<br><br>
       <div><center>
<?php
	echo $this->paginator->prev('Previous',array('class'=>'PrevPg'),null,array('class'=>'PrevPg Disabled PgLk'));
	echo "&nbsp";
	echo $this->paginator->numbers();
	echo "&nbsp";
	echo $this->paginator->next('Next',array('class'=>'NextPg'),null,array('class'=>'NextPg Disabled PgLk'));
?>
    </center>
    
  </div>  


<?php echo $this->Form->create('Customer',array('type'=>'get','controller'=>'customers','action'=>'withdrawal') );?>
<center><table>
<tr class="row">
<td>Search Customers</td>
<td><?php 
if(isset($_GET) && !empty($_GET['searchfield']))
	{
		$val=$_GET['searchfield'];
	}
	else
	{
	$val='';	
	}
echo $this->Form->input('Customer.searchfield',array('label'=>false,'div'=>false,'type'=>'text','value'=>$val));

?>
</td>

<td><?php echo $this->Form->input('Customer.select', array('label'=>false,
    'options' => array('Id','Name','Address','Amount'),
    'empty' => '--Select--'
)); ?></td>

<td><?php echo $this->Form->input('Search',array('type'=>'submit','label'=>false,'class'=>'myButton'));?>

</td>
</tr>
</table></center>
 <?php echo $this->Form->end();?>
 
 <?php echo $this->Html->link($this->Html->image('download.jpg',array('height'=>'35px','width'=>'50px')),array('controller'=>'Customers','action'=>'withdrawal_exportxls'),array('escape'=>false,'title'=>'Download CSV file','style'=>'float:right'));?>
<br><br>    
<?php
if(empty($abc)) { ?>
<p style='color:red;font-size:20px;'>There are no Customers</p>
<?php } else { ?>
<table border="1">
<tr>
<th>Id</th>
<th>Name</th>
<th>Address</th>
<th>Amount</th>
<th>Interset Rate</th>
<th>Created</th>
<th>Item</th>
<th>Months</th>
<th>Total Amount</th>
<th>Withdrawal</th>
<th>Action</th>
</tr>
<?php 
foreach($abc as $a){
   $cret= $a['Customer']['created'];
    $date1= date('d-m-Y',strtotime($cret));
    $cret1= $a['Customer']['modified'];
    $date2= date('d-m-Y',strtotime($cret1));
    
    ?>
<tr>
<td style="text-align: center"><?php echo $a['Customer']['id']; ?></td>
<td style="text-align: center"><?php echo $a['Customer']['name']; ?></td>
<td style="text-align: center"><?php echo $a['Customer']['address']; ?></td>
<td style="text-align: left">Rs.<?php echo $a['Customer']['amount']; ?></td>
<td style="text-align: center"><?php echo $a['Customer']['interset_rate'].'%'; ?></td>
<td style="text-align: center;width:90px;"><?php echo $date1; ?></td>
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

<td style="text-align: left;width:90px;">
    
   <?php echo $date2; ?> 
</td>
<td><?php echo $this->Html->link($this->Html->image('View_details.jpg',array('height'=>'20px','width'=>'30px')),array('controller'=>'Customers','action'=>'withdrawal_pay',$a['Customer']['id']),array('escape'=>false,'title'=>'view customers Details'));?>&nbsp;</td>
</tr>
<?php } ?>
</table>

<?php } ?>

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


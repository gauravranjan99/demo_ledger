<center>
<?php echo $this->Form->create('Customer',array('type'=>'get','action'=>'recent_add'));?>
<table>
<script>
jQuery(function() {
jQuery( "#datepicker" ).datepicker({dateFormat: 'dd-mm-yy'});
});
</script>
 
 <script>
jQuery(function() {
jQuery( "#datepicker1" ).datepicker({dateFormat: 'dd-mm-yy'});
});
</script>

<tr><td>
<?php echo $this->Form->input('Customer.to',array('type'=>'text','id'=>'datepicker','div'=>false,'label'=>'To'));?></td>
<td><?php echo $this->Form->input('Customer.from',array('type'=>'text','id'=>'datepicker1','div'=>false,'label'=>'From'));?></td>
<td>
<?php echo $this->Form->input('Search',array('type'=>'submit','label'=>false,'class'=>'myButton'));?>
</td>
</tr>
</table><?php echo $this->Form->end();?>
</center>

<br>
<center>
<?php
if(empty($result)) { ?>
<h4 style="color: #FF4D49">No Customers Added Today</h4>
<?php } else { ?>
<table border="1">
<tr>

<th>Name</th>
<th>Address</th>
<th>Amount</th>
<th>Interset Rate</th>
<th>Created</th>
<th>Item</th>
<th>Action</th>
</tr>
<?php 
foreach($result as $a){
   $cret= $a['Customer']['created'];
    $date1= date('d-m-Y',strtotime($cret));
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
    
<td style="text-align: center">
<?php echo $this->Html->link($this->Html->image('View_details.jpg',array('height'=>'20px','width'=>'30px')),array('controller'=>'Customers','action'=>'recent_add_view',$a['Customer']['id']),array('escape'=>false,'title'=>'view customers Details'));?>
</td>
</tr>
<?php } ?>
</table>
<?php } ?>
</center>
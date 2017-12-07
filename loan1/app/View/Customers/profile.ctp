<br><br><center>
    <?php echo $this->Form->create('User');?>
<fieldset style="width: 500px">
<legend>Change Your Password</legend>
<table border="0" bordercolor="#336699" style="background-color:778899" cellpadding="3" cellspacing="3">
<tr>
    <td style="width:170px">Old Password<em style="color: red">*</em></td>
    <td><?php echo $this->Form->input('User.password',array('type'=>'password','label'=>false,'div'=>false));?></td>

</tr>
<tr>
    <td>New Password<em style="color: red">*</em></td>
    <td><?php echo $this->Form->input('User.new_password',array('type'=>'password','label'=>false,'div'=>false));?></td>
</tr>
<tr>
    <td>Confirm Password<em style="color: red">*</em></td>
    <td><?php echo $this->Form->input('User.con_password',array('type'=>'password','label'=>false));?></td>
    
</tr>
</table><br>
<?php echo $this->Form->input('Update',array('type'=>'submit','label'=>false,'class'=>'myButton'));?>
<?php echo $this->Form->end();?><br/>
</center>
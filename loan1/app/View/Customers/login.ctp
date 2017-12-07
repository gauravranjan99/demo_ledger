


<center>
<?php

echo $this->Form->create('User');?>
<fieldset style="width: 500px">
<legend>Login</legend>
<table border="0" bordercolor="#336699" style="background-color:" width="100" cellpadding="3" cellspacing="3">
<tr>
    <td>Username</td>
    <td><?php echo $this->Form->input('User.username',array('label'=>false,'autocomplete'=>'off'));?></td>

</tr>
<tr>
    <td>Password</td>
    <td><?php echo $this->Form->input('User.password',array('type'=>'password','label'=>false,'autocomplete'=>'off'));?></td>
</tr>
</table><br>
<?php echo $this->Form->input('Login',array('type'=>'submit','label'=>false,'class'=>'myButton'));?>
<?php echo $this->Form->end();?><br/>

<br/>


</fieldset>
</center>



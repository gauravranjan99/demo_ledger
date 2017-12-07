
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Satkar Jewellers</title>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />-->
<?php
		echo $this->Html->meta('icon');
		echo $this->Html->script('jquery-1.9.1');
		echo $this->Html->script('jquery-ui');
		echo $this->Html->script('pluginvalidation');
		echo $this->Html->css('admincss');
		echo $this->Html->css('jquery-ui');
		echo $this->Html->css('style');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>

</head>
<body>

<div id="container">
	<div id="header">
		<center><?php echo $this->Html->image(BASE_URL . 'img/satkarlogo.png', array('width'=>'852','height'=>'131'));?></center>
	</div>
	<div id="navigation">
		<ul>
			<li><?php echo $this->Html->link('Home',array('controller'=>'Customers','action'=>'view'));?></li>
			<li><a href="#">Contact us</a></li>
                       <li><?php echo $this->Html->link('Logout',array('controller'=>'Customers','action'=>'logout'),array('escape'=>false));?></li>
		</ul>
	</div>
	<div id="content-container1">
		<div id="content-container2">
			<div id="section-navigation" style="border: 1px dotted green">
				<ul>
                                <div style="background: orange"><center><?php echo $this->Html->link('View Customer',array('controller'=>'Customers','action'=>'view'),array('style'=>'text-decoration:none;color:black'));?></center></div><br>
				<div style="background: orange"><center><?php echo $this->Html->link('Add Customer',array('controller'=>'Customers','action'=>'index'),array('style'=>'text-decoration:none;color:black'));?></center></div><br>
				<div style="background: orange"><center><?php echo $this->Html->link('Recently Added',array('controller'=>'Customers','action'=>'recent_add'),array('style'=>'text-decoration:none;color:black'));?></center></div><br>
				<div style="background: orange"><center><?php echo $this->Html->link('Withdrawals Customer',array('controller'=>'Customers','action'=>'withdrawal'),array('style'=>'text-decoration:none;color:black'));?></center></div><br>
				<div style="background: orange"><center><?php echo $this->Html->link('Change Password',array('controller'=>'Customers','action'=>'profile'),array('style'=>'text-decoration:none;color:black'));?></center></div><br>
				
				

					
				</ul>
			</div>
			<div id="content">
				<?php echo $this->Session->flash(); ?>
                                <?php echo $this->fetch('content'); ?>
			</div>
			
			<div id="footer">
				<center></center>
			</div>
		</div>
	</div>
</div>
<?php //echo $this->Js->writeBuffer();?>
</body>
</html>
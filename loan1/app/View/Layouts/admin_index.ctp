
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Satkar Jewellers</title>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />-->
<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('admin_first');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>


</head>
<body>

<div id="container">
	<div id="header">
		<center><h1>
			LOAN SYSTEM
		</h1></center>
	</div>
	<!--<div id="navigation">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="#">Contact us</a></li>
		</ul>
	</div>-->
	<!--<div id="content-container1">
		<div id="content-container2">
			<div id="section-navigation" style="border: 1px solid green">
				<ul>
					<li><a href="#">Section page 1</a></li>
					<li><a href="#">Section page 2</a></li>
					<li><a href="#">Section page 3</a></li>
					<li><a href="#">Section page 4</a></li>
				</ul>
			</div>-->
			<div id="content">
		
			<?php echo $this->Session->flash(); ?>
                        <?php echo $this->fetch('content'); ?>

			</div>
			<!--<div id="aside" style="border: 1px solid green">
				<h3>
					Aside heading
				</h3>
				<p>
					Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan.
                                       
                                </p>
			</div>-->
			<div id="footer">
				<center>Copyright @ Satkar Jewellers</center>
			</div>

		
</div>
</body>
</html>
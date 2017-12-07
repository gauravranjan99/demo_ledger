<html>
  <head>
    
    <?php
                echo $this->Html->meta('icon');
		echo $this->Html->script('jsapi');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var active="<?php echo $active; ?>";

        var activeint=parseInt(active);
          var deactive="<?php echo $deactive; ?>";

        var deactiveint=parseInt(deactive);
   
        var data = google.visualization.arrayToDataTable([
           ['Customer', 'status'],
	   ['activate',     activeint],
          ['deactivate',      deactiveint],
        
        ]);

        var options = {
          title: 'Customer status'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 800px; height: 500px;"></div>
  </body>
</html>




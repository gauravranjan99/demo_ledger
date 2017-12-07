
<script>
function goBack()
  {
  window.history.back()
  }
</script>
<center><b><u>Details Of Customer You Selected</u></b></center><br/><br/>
<b style="color: grey"> Customer ID:</b> <?php echo $post['Customer']['id']; ?><br><br>
<b style="color: grey">Name:</b> <?php $name= $post['Customer']['name'];
echo ucwords($name);

?><br><br>
<b style="color: grey">Address:</b> <?php echo $post['Customer']['address']; ?><br><br>
<b style="color: grey">Item:</b>

<?php
 $sam='';
        foreach($post['Item'] as $ran){
         $www=$ran['weight'];
        
         $sam .= $ran['name'] .'(' .$ran['weight'] .'gm)'  .'&nbsp;'  .','; 
       } 
         echo rtrim($sam,',');
         ?>
<br><br>
<b style="color: grey">Amount:</b> <?php echo "Rs." .$post['Customer']['amount']; ?><br><br>

<b style="color: grey">Deposit:</b><?php $dep_date= $post['Customer']['created'];
                 $depdate= date('d-m-Y h:i:s',strtotime($dep_date));


?>
&nbsp;&nbsp;<?php echo $depdate; ?><br><br>

</table>
<br><br>
<center>

<input type="button" value="Back" onclick="goBack()" class="classname">
</center>

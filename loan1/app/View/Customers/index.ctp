<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
jQuery( function ( $ ) {
    $( '#btnAdd' ).click( function() {
        var num = $( '.clonedInput' ).length;      
        var newNum  = new Number( num + 1 );       
        var newElem = $( '#container' + num ).clone().attr( 'id', 'container' + newNum );
	

        newElem.children( ':first' ).attr( 'id', 'name' + newNum ).attr( 'name', 'name' + newNum );
        $( '#container' + num ).after( newElem );
        $( '#btnDel' ).attr( 'disabled', false );
        if ( newNum == 25 )
            $( '#btnAdd' ).attr( 'disabled', 'disabled' );
	    
	   $(".clonedInput:last").find("input").val(" ");
    });

    $( '#btnDel' ).click( function() {
        var num = $( '.clonedInput' ).length;     
        $( '#container' + num ).remove();             
        $( '#btnAdd' ).attr( 'disabled', false ); 

        // if only one element remains, disable the "remove" button
        if ( num-1 == 1 )
            $( '#btnDel' ).attr( 'disabled', 'disabled' );
    });

    $( '#btnDel' ).attr( 'disabled', 'disabled' );
});
        </script>


<?php echo $this->Form->create('Customer',array('controller'=>'Customer','action'=>'index')); ?>
        <?php echo $this->Form->hidden('Customer.count',array('value'=>$count));?>
<center><fieldset>
    <legend>Add Customer</legend>
    <div class="" >
<table border="0" bordercolor="#336699" cellpadding="3" cellspacing="3">
        <tr>
            <td>Name</td>
            <td><?php echo $this->Form->input('Customer.name',array('label'=>false,'placeholder'=>'Customer Name'));?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $this->Form->input('Customer.address',array('label'=>false,'placeholder'=>'Enter Customer Address')); ?></td>
        </tr>
	<tr>
	    <td>Item</td>
	 <td>  <div id="container1" class="clonedInput"> 
        <div>
        <?php echo $this->Form->input('Item.name',array('div'=>false,'label'=>false,'placeholder'=>'Item Name','id'=>'first_name[]','name'=>'data[Item][name][]'));?>
	
	<?php echo $this->Form->input('Item.weight',array('div'=>false,'label'=>false,'placeholder'=>'Item weight','id'=>'second_name[]','name'=>'data[Item][weight][]'));?>
	</div>
        
    </div>
    <div>
        <input type="button" id="btnAdd" value="add another Item" class="add"/>
        <input type="button" id="btnDel" value="remove Item" class="remove"/>
    </div> 
	    
	   </td> 
	    
	</tr
        <tr>
            <td>Amount</td>
            <td><?php echo $this->Form->input('Customer.amount',array('label'=>false,'placeholder'=>'Enter Amount')); ?></td>
        </tr>
        <tr>
            <td>Interset Rate</td>
            <td><?php echo $this->Form->input('Customer.interset_rate',array('label'=>false,'placeholder'=>'Enter Rate Of Interset')); ?></td>
        </tr>
	
	<tr>
            <td>Place</td>
            <td><?php echo $this->Form->input('Customer.place',array('label'=>false,'placeholder'=>'Enter place to store')); ?></td>
        </tr>
       
        
           </table>
            <?php echo $this->Form->input('Submit',array('type'=>'submit','label'=>false,'div'=>false,'class'=>'myButton'));?>
             <?php echo $this->Form->end();?>
    </div>
</fieldset><center>
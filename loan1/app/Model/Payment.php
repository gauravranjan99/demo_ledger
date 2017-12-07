<?php
App::uses('Model', 'Model');

class Payment extends AppModel {
   
    public $belongsTo=array(
		
		'Customer'=>array(
		'className'=>'Customer',
		'foreignKey'=>'customer_id',
                'dependent'=>true,
		)
        );
     
   
   
    
   var $validate =array(
       
	'pay'=>array(
            'Rule-1'=>array(
                'rule'    => 'notEmpty',
                'message' => 'please enter amount',
            ),
            'Rule-2' => array(
            'rule'    => 'numeric',
            'message' => 'Enter only numeric value',
         )
        ),
	
	);
}

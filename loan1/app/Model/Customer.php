<?php
App::uses('Model', 'Model');

class Customer extends AppModel {
    
     public $hasMany=array(
		'Item'=>array(
		'className'=>'Item',
		'foreignKey'=>'customer_id',
                'dependent'=>true,
		),
		'Payment'=>array(
		'className'=>'Payment',
		'foreignKey'=>'customer_id',
                'dependent'=>true,
		)
        );
     
      var $validate =array(
        'name' => array(
                'rule'    => 'notEmpty',
                'message' => 'Please enter Customer name',
        ),
        'address' => array(
            'rule'    => 'notEmpty',
            'message' => 'please enter address of customer',
        ),
	
	
        
        'amount'=>array(
            'Rule-1'=>array(
                'rule'    => 'notEmpty',
                'message' => 'please enter amount',
            ),
            'Rule-2' => array(
            'rule'    => 'numeric',
            'message' => 'Only numeric value allowed',
         )
        ),
        'interset_rate'=>array(
            'Rule-1'=>array(
                'rule'    => 'notEmpty',
                'message' => 'please enter rate of interset',
            ),
            'Rule-2' => array(
            'rule'    => 'numeric',
            'message' => 'Only numeric value allowed',
         ),
        )
        );
}

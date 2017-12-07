<?php
App::uses('Model', 'Model');

class Item extends AppModel {
    
   var $validate =array(
        'name' => array(
           
                'rule'    => 'notEmpty',
                'message' => 'please enter item name'
             ),
	
	'weight' => array(
           
                'rule'    => 'notEmpty',
                'message' => 'please enter item weight'
             ),
            
	);
}

<?php

class User extends AppModel {
    var $name='User';
   
    
    var $validate =array(
        'password' => array(
                'rule'    => 'notEmpty',
                'message' => 'please enter old password',
        ),
        
        'new_password' => array(
            'rule'    => 'notEmpty',
            'message' => 'please enter new password',
        
        ),
            'con_password' => array(
        'rule' => 'notEmpty',
        'message' => 'Please enter confirm password'
    )
    );
}
?>
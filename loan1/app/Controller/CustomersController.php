<?php

class CustomersController extends AppController {
   // public $components = array('RequestHandler');
    var $helpers = array('Paginator');
     var $paginate = array(
		'limit'=>8,
		
		'recursive'=>2
	);

    function beforeFilter() {

        $this->layout = "layout";
        $this->loadModel('Customer');
	 $this->loadModel('Payment');
        $this->loadModel('Item');

        $allowed = array('login');

        if (!$this->Session->check('login') && (!in_array($this->params['action'], $allowed))) {
            $this->redirect(array('controller' => 'Customers', 'action' => 'login'));
        }
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    public function login() {
        $this->layout = 'admin_index';
        $this->loadModel('User');
        if ($this->request->is('post')) {
            if ($this->request->data['User']['username'] == '') {
                $this->Session->SetFlash('Please enter username');
            } else if ($this->request->data['User']['password'] == '') {
                $this->Session->SetFlash('Please enter password');
            } else {
                $user = $this->request->data['User']['username'];
                $password = md5($this->request->data['User']['password']);

                $result = $this->User->find('first', array('conditions' => array('User.username' => $user, 'User.password' => $password)));

                if (!empty($result)) {
                    $this->Session->write('login', $result);
                    $this->redirect(array('controller' => 'Customers', 'action' => 'view'));
                } else {
                    $this->Session->SetFlash('Either username/password wrong !!');
                    $this->request->data = array();
                }
            }
        }
    }

    public function logout() {
        $this->Session->delete('login');
        $this->redirect(array('controller' => 'Customers', 'action' => 'login'));
    }

    public function index() {
        $this->layout = 'layout';
        //pr($this->data);die;
        $this->loadModel('Customer');
        $this->loadModel('Item');
        if ($this->request->is('post')) {
	    
            if ($this->Session->read('onesaved') != $this->data) {
                $this->Session->write('onesaved', $this->data);
                if ($this->Customer->save($this->data)) {
                    $data = $this->data;
                    $id = $this->Customer->getLastInsertId();
                    $a = count($this->data['Item']['name']);
                    for ($i = 0; $i < $a; $i++) {

                        $this->Item->create();
                        $data['Item']['customer_id'] = $id;
                        $data['Item']['name'] = $this->data['Item']['name'][$i];
                        $data['Item']['weight'] = $this->data['Item']['weight'][$i];
                        $this->Item->save($data);
                    }
                    echo '<script type="text/javascript">';
                    echo "alert('Customer ID is $id')";
                    echo '</script>';
                }
            } else {
                
            }
		

            $this->request->data = array();
        } else {
            $this->Session->delete('onesaved');
        }
	
        $count = $this->Customer->find('count');
	$this->set(compact('count'));
    }

    public function view() {
	  $this->layout = 'layout';
        if (isset($_GET) && !empty($_GET['searchfield'])) {
            $search = $_GET['searchfield'];
            $select = $_GET['select'];
            if ($select == 0) {
                $condition = "Customer.id LIKE '" . $search . "%'";
            }
            if ($select == 1) {
                $condition = "Customer.name LIKE '" . $search . "%'";
            }
            if ($select == 2) {
                $condition = "Customer.address LIKE '" . $search . "%'";
            }
            if ($select == 3) {
                $condition = "Customer.amount LIKE '" . $search . "%'";
            }
        } else {
            $condition = '';
        }
	
 $this->paginate = array('conditions'=>array($condition, 'Customer.status' => '1'),'limit'=>9);
		$abc = $this->paginate('Customer');
		$this->set(compact('abc'));
        //$result = $this->Customer->find('all', array('conditions' => array($condition, 'Customer.status' => '1'), 'fields' => array(), 'recursive' => 2));
        //$this->set('abc', $result);
    }

    public function view_customer($id = null,$total = null) {
        $posts = $this->Customer->findById($id);
        //pr($posts);die;
        $this->set('post', $posts);
	$sum = $this->Payment->find('all', array('conditions' => array('Payment.customer_id' =>$id),'fields' => array('sum(Payment.pay) as total_sum')));
	//pr($sum);die;
	$this->set('sum',$sum);
	$this->set('total',$total);
    }


    public function delete($id = null) {
        $customerid = $id;
        $result = $this->Customer->find('first', array('fields' => array('fields' => 'Customer.id', 'Customer.status'), 'conditions' => array('Customer.id' => $id)));
        //pr($result);die;
        if ($result['Customer']['status'] == 1) {
            $data['Customer']['id'] = $customerid;
            $data['Customer']['status'] = 0;
            $this->Customer->save($data);
            $this->redirect($this->referer(), null, true);
        }
    }

    public function profile() {
        $this->loadModel('User');
        $a = $this->Session->read('login');
        $id = $a['User']['id'];
        $passw = $this->User->find('first', array('conditions' => array('User.id' => $id)));
        if ($this->request->is('post')) {
            $pass = $this->request->data['User']['password'];
            $new = ($this->request->data['User']['new_password']);
            $confirm = $this->request->data['User']['con_password'];
            if (md5($pass) == $passw['User']['password']) {
                if ($new == !null && $confirm == !null) {
                    if ($new == $confirm) {
                        $data['User']['id'] = $id;
                        $data['User']['password'] = md5($new);
                        //pr($passw['User']['password']); die();
                        if ($this->User->save($data)) {
                            $this->Session->setFlash('Password has been changed');
                        } else {
                            $this->Session->setFlash('Unable to change');
                            $this->redirect(array('action' => 'profile'));
                            $this->request->data = array();
                        }
                    } else {
                        $this->Session->setFlash('New Password and Confirm Password should be match');
                    }
                } else {
                    $this->Session->setFlash('Password cant be empty');
                }
            } else {
                $this->Session->setFlash('Please enter Correct password');
            }
        }
    }

    function customer_exportxls() {

        $this->layout = "exportxls";
        //$this->admin->recursive = 1;
        $data = $this->Customer->find('all', array('recursive' => 2));
        // pr($data);die;
        $this->set('rows', $data);
        $this->render('customer_exportxls', 'exportxls');
    }

    function search() {
        $this->layout = 'layout';
        if (isset($_GET) && !empty($_GET['searchfield'])) {
            $search = $_GET['searchfield'];
            $select = $_GET['select'];
	    
            if ($select == 0) {
                $condition = "Customer.id LIKE '" . $search . "%'";
            }
            if ($select == 1) {
                $condition = "Customer.name LIKE '" . $search . "%'";
            }
            if ($select == 2) {
                $condition = "Customer.address LIKE '" . $search . "%'";
            }
            if ($select == 3) {
                $condition = "Customer.amount LIKE '" . $search . "%'";
            }
        } else {
            $condition = '';
        }
        $result = $this->Customer->find('all', array('conditions' => array($condition,'Customer.status'=>'1'), 'fields' => array(), 'recursive' => 2));
        //pr($result);die;
        $this->set('abc', $result);
    }

    function recent_add() {
        $this->layout = 'layout';
	
        $curdate = date('Y-m-d');
        $results = $this->Customer->find('all', array('conditions' => array("DATE_FORMAT(Customer.created, '%Y-%m-%d')" => $curdate), 'fields' => array(), 'recursive' => 2));
        $this->set('result', $results);
	//pr($this->request->data);die;
	//if($this->request->data['Customer']['to']!="" && $this->request->data['Customer']['from']!="")
	//	{
	//	    
	//	    $dateTo = date('Y-m-d',strtotime($this->request->data['Customer']['to']));
	//	    //pr($dateTo);die;
	//	    $dateFrom = date('Y-m-d',strtotime($this->request->data['Customer']['from']));
	//	    $cond=$this->Customer->find('all',array('conditions'=>array('Customer.created BETWEEN ? AND ?'=>array($dateTo,$dateFrom))));
	//	    //pr($cond);die;
	//	   
	//	}
    }
    
    
    function withdrawal(){
        $this->layout = 'layout';
        if (isset($_GET) && !empty($_GET['searchfield'])) {
            $search = $_GET['searchfield'];
            $select = $_GET['select'];
            if ($select == 0) {
                $condition = "Customer.id LIKE '" . $search . "%'";
            }
            if ($select == 1) {
                $condition = "Customer.name LIKE '" . $search . "%'";
            }
            if ($select == 2) {
                $condition = "Customer.address LIKE '" . $search . "%'";
            }
            if ($select == 3) {
                $condition = "Customer.amount LIKE '" . $search . "%'";
            }
        } else {
            $condition = '';
        }
        //$result = $this->Customer->find('all', array('conditions' => array($condition,'Customer.status'=>'0'), 'fields' => array(), 'recursive' => 2));
        //$this->set('abc', $result);
	$this->paginate = array('conditions'=>array($condition,'Customer.status'=>'0'),'limit'=>6);
		$abc = $this->paginate('Customer');
		$this->set(compact('abc'));
    }
    
    
    public function customer_detail(){
             
            
             $act=$this->Customer->find('count',array('conditions'=>array('Customer.status'=>1)));
               $this->set('active',$act);
                $dect=$this->Customer->find('count',array('conditions'=>array('Customer.status'=>0)));
               $this->set('deactive',$dect);
        }
        
        function withdrawal_exportxls(){
             $this->layout = "exportxls";
        //$this->admin->recursive = 1;
       $data = $this->Customer->find('all', array('conditions' => array('Customer.status'=>'0'), 'fields' => array(), 'recursive' => 2));
         //pr($data);die;
        $this->set('rows', $data);
        $this->render('withdrawal_exportxls', 'exportxls');
        }
	
	function pay($id = null){
	     $result = $this->Payment->find('all',array('conditions'=>array('Payment.customer_id'=>$id)));
	     //$result = $this->Customer->find('first', array('conditions' => array('Customer.id'=>$id)));
	    //pr($result);die;
        $this->set('result', $result);
	    if(empty($this->data)) {
    			$this->data=$this->Customer->read(NULL,$id);
    		}else{
		    if($this->request->is('post')){
			$this->request->data['Payment']['customer_id'] = $this->request->data['Customer']['id'];
			$this->Payment->create();
			if($this->Payment->save($this->request->data)){
			    $this->Session->setFlash('Payments of customers added succesfully!!!');
			    
			    $this->redirect(array('controller' => 'Customers', 'action' => 'view'));
			}
		}
	    
	    
	    }
	}
	   
	function withdrawal_pay($id = null){
	     $result = $this->Payment->find('all',array('conditions'=>array('Payment.customer_id'=>$id)));
	     $this->set('result', $result);
	}
	   
	function recent_add_view($id = null){
	    $posts = $this->Customer->findById($id);
	    //pr($posts);die;
	    $this->set('post', $posts);
	}   
}
?>
<?php
class Crud_operations extends CI_Controller{
    function index(){
        
      
        
    }
    function insert(){
        $validation = array(
            array(
                    'field' => 'name',
                    'label' => 'User Name',
                    'rules' => 'required|max_length[20]|trim',
                    'errors' => array('required'=>'%s value should not be blank'),
            ),
            array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required|min_length[8]|max_length[15]|trim'
            ),
            array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|valid_email|trim'
            ),
            array(
                    'field' => 'phone',
                    'label' => 'Phone',
                    'rules' => 'required|min_length[10]|max_length[12]|trim'
            ),
            array(
                    'field' => 'pincode',
                    'label' => 'Pin Code',
                    'rules' => 'required|min_length[4]|max_length[8]|trim'
            ),
            array(
                    'field' => 'itemPrice',
                    'label' => 'Price',
                    'rules' => 'required|min_length[2]|max_length[10]|trim'
            ),
            array(
                    'field' => 'itemName',
                    'label' => 'Item Name ',
                    'rules' => 'required|min_length[2]|max_length[10]|trim'
            ),
            array(
                    'field' => 'itemD',
                    'label' => 'Item Description ',
                    'rules' => 'required|min_length[2]|max_length[10]|trim'
            ),
            array(
                    'field' => 'amount',
                    'label' => 'Amount',
                    'rules' => 'required|trim'
            ),
            array(
                    'field' => 'total_amount',
                    'label' => 'Total_amount',
                    'rules' => 'required|trim'
            ),
         
        );
      if(isset($_FILES['itemPath'])){
    if(empty($_FILES['itemPath']['name'])){
        $this->form_validation->set_rules('itemPath','image','required');
    }
}
       
       $errors=array_filter($validation,function($validation){
        return $this->input->post($validation['field']) !== null;
       });

        $this->form_validation->set_rules($errors);

         if(!$this->form_validation->run()){
            $error= $this->form_validation->error_array(); 
            print_r( $error);
         }
        else{

     }
    }
}

?>
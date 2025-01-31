<?php
class Crud_operations extends CI_Controller
{
       

        public function __construct(){
                parent::__construct();
        }

        function insert()
        {

                $validation = array(
                        array(
                                'field' => 'name',
                                'label' => 'User Name',
                                'rules' => 'required|max_length[20]|trim',
                                'errors' => array('required' => '%s value should not be blank'),
                        ),
                        array(
                                'field' => 'password',
                                'label' => 'Password',
                                'rules' => 'required|min_length[8]|max_length[15]|trim'
                        ),
                        array(
                                'field' => 'email',
                                'label' => 'Email',
                                'rules' => 'required|valid_email|is_unique[user_master.email]|trim'
                        ),
                        array(
                                'field' => 'email',
                                'label' => 'Client Email',
                                'rules' => 'required|valid_email|is_unique[client_master.email]|trim'
                        ),
                        array(
                                'field' => 'phone',
                                'label' => 'Phone',
                                'rules' => 'required|min_length[10]|max_length[12]|is_unique[user_master.phone]|trim'
                        ),
                        array(
                                'field' => 'phone',
                                'label' => 'Phone Number',
                                'rules' => 'required|min_length[10]|max_length[12]|is_unique[client_master.phone]|trim'
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
                                'field' => 'itemD',
                                'label' => 'Item Description ',
                                'rules' => 'required|trim'
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

                        array(
                                'field' => 'address',
                                'label' => 'Address',
                                'rules' => 'required|trim'
                        ),

                        array(
                                'field' => 'state_Name',
                                'label' => 'State',
                                'rules' => 'required|trim'
                        ),

                        array(
                                'field' => 'district_Name',
                                'label' => 'district',
                                'rules' => 'required|trim'
                        ),
                        array(
                                'field' => 'itemName',
                                'label' => 'Item Name',
                                'rules' => 'required|is_unique[item_master.itemName]|trim'
                        ),
                       
                       

                );

                if (isset($_FILES['itemPath'])) {

                        if (empty($_FILES['itemPath']['name'])) {
                                $this->form_validation->set_rules('itemPath', 'image', 'required');
                        }
                }

                $errors = array_filter($validation, function ($validation) {
                        return $this->input->post($validation['field']) !== null;
                });

                $this->form_validation->set_rules($errors);
       
                if (!$this->form_validation->run()) {
                        $error = $this->form_validation->error_array();

                        echo json_encode(['errors' => $error]);
                } 
                
                else {
                        $staus='';
                        if(isset($_FILES['itemPath'])){
                                $config['upload_path'] = './folder/';
            
                                $config['allowed_types'] = 'jpeg|jpg|gif|png';
                                $this->load->library('upload', $config);
        
                                $this->upload->do_upload('itemPath');
                                
        
                                $path=$this->upload->data('file_name');
                                $form_data = $this->input->post();
                             
                                array_splice($form_data ,-2);
                                
                                $form_data['itemPath']=$path;
                                $table_name = $this->input->post('table_name');
                                $action = $this->input->post('action');
                                $this->load->model('Crud_Op');

                                $this->Crud_Op->insert_data($table_name, $form_data,$action);

                                $staus=200;
                                echo json_encode(['status' => $staus]);
                        }
                       
                       else{
                        
                        $form_data = $this->input->post();
                        
                        array_splice($form_data ,-2);
                        $action = $this->input->post('action');
                                   
                        //    print_r($form_data);
                       
                        $table_name = $this->input->post('table_name');

                        $this->load->model('Crud_Op');
                        $this->Crud_Op->insert_data($table_name, $form_data,$action);

                        $staus=200;
                        echo json_encode(['status' => $staus]);
                       }

                }
        }

      
        function edit_delete_Fun(){
                delete_edit();
        }


       function update(){
        

        if(isset($_FILES['itemPath'])){
                $config['upload_path'] = './folder/';

                $config['allowed_types'] = 'jpeg|jpg|gif|png';
                $this->load->library('upload', $config);

                $this->upload->do_upload('itemPath');
                

                $path=$this->upload->data('file_name');
                $form_data = $this->input->post();
             
                array_splice($form_data ,-2);

               

                if($path!=""){
                        $form_data['itemPath']=$path;
                }
                $table_name = $this->input->post('table_name');
                $action = $this->input->post('action');
                $this->load->model('Crud_Op');

              echo  $this->Crud_Op->insert_data($table_name, $form_data,$action);

        }    else{
                        
                $form_data = $this->input->post();
                
                array_splice($form_data ,-2);
                $action = $this->input->post('action');
                           
                //    print_r($form_data);
               
                $table_name = $this->input->post('table_name');

                $this->load->model('Crud_Op');
             echo   $this->Crud_Op->insert_data($table_name, $form_data,$action);

                
               }

       }







       
      

}




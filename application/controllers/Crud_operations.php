<?php
class Crud_operations extends CI_Controller
{
        function index() {
                
        }

        function insert()
        {
                $validation = array(
                        array(
                                'field' => 'create_by',
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
                                'field' => 'itemD',
                                'label' => 'item Description',
                                'rules' => 'required|trim'
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
                } else {
                        $staus='';
                        if(isset($_FILES['itemPath'])){
                                $config['upload_path'] = './files/';
            
                                $config['allowed_types'] = 'jpeg|jpg|gif|png';
                                $this->load->library('upload', $config);
        
                                $this->upload->do_upload('itemPath');
                                
        
                                $path=$this->upload->data('full_path');
                                $form_data = $this->input->post();
                                array_pop($form_data);
                                $form_data['itemPath']=$path;
                                
                                $staus=200;
                                echo json_encode(['status' => $staus]);
                        }
                       
                       else{
                             
                        $form_data = $this->input->post();
                        array_pop($form_data);
                                   
                        //    print_r($form_data);
                       
                        $table_name = $this->input->post('table_name');

                        $this->load->model('Crud_Op');
                        $this->Crud_Op->insert_data($table_name, $form_data);
                        $staus=200;
                        echo json_encode(['status' => $staus]);
                       }

                }
        }
}




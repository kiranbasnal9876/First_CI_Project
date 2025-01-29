<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LogInPage extends CI_Controller
{
  
  
  function index()
  {
    $this->load->view('logIn_layout');
    
  }

  function log_data()
  {
    $status = "";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $this->load->model('Get_Data');
    $data = $this->Get_Data->loggin_user($email, $password);
   
  // print_r($data);
      
    if ($data == []){
      $status = 400;
    } else {
      $this->session->set_userdata('log_user_data',$data[0]);
      
      $status = 200;
    }
   
    echo  json_encode(['status' => $status]);
  }

  function log_out()
  {
    $this->session->unset_userdata('log_user_data');

    redirect(base_url()."LogInPage");
  }
}

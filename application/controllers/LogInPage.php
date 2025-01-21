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
    foreach ($data as $value) {

      $this->session->set_userdata('name', $value);
    }



    if ($data == "") {
      $status = 400;
    } else {
      $status = 200;
    }
    echo  json_encode(['status' => $status]);
  }

  function log_out()
  {
    $this->session->unset_userdata('name');

    check_session('dashboard');
  }
}

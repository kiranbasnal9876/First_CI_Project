<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class All_masters extends CI_Controller{



    function dashboard(){
        check_session('dashboard');
        // print_r( $this->session->userdata('name'));
       
      }
    function user_master(){
    check_session('user_master');
   
  
}
 function client_master(){
    
    $this->load->model('Get_Data');

    $data['states']=$this->Get_Data->get_states();
    check_session('client_master',$data);
    
 }
 function item_master(){
    check_session('item_master');

}
function invoice_master(){
    check_session('invoice_master');
}

function get_destrict()
{

    $id = $_POST['state_id'];

   
       $this->load->model('Get_Data');
     $data=  $this->Get_Data->get_destrict($id);
    
        for($i=0;$i<count($data);$i++){
            echo "<option value='{$data[$i]['district_id']}'>{$data[$i]['district_name']}</option>";
        }

        
    }
}








?>
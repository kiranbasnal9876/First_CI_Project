<?php
defined('BASEPATH') or exit('No direct script access allowed');

class All_Masters extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $url = current_url();
        $urlArr = explode('/',$url);
        $last_url = end($urlArr);
        check_session($last_url);
        $this->load->model('Get_Data');
    }


    function dashboard()
    {
       $data['details']= $this->Get_Data->all_masters_data();
        $this->load->view('dashboard',$data);

    }

    function user_master()
    {
        $this->load->view('user_master');
    }


    function client_master()
    {

      
        $data['states'] = $this->Get_Data->get_states();
        
        $this->load->view('client_master',$data);
    }

    function item_master()
    {
        $this->load->view('item_master');
    }

    function invoice_master()
    {
        $this->load->view('invoice_master');
    }

    function get_destrict()
    {

        $id = $_POST['state_id'];


        
        $data =  $this->Get_Data->get_destrict($id);

        for ($i = 0; $i < count($data); $i++) {
            echo "<option value='{$data[$i]['district_id']}'>{$data[$i]['district_name']}</option>";
        }
    }

   
}


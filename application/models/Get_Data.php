<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_Data extends CI_Model{
    function loggin_user($email,$password){
        
       $where=array('email'=>$email ,'password'=>$password);
      return $this->db->select('name')->where($where)->get('user_master')->result_array();
     

    }

    function get_states(){
    return  $this->db->get('state_master')->result_array();
    }

    function get_destrict($id){
return $this->db->where('state_id',$id)->get('district_master')->result_array();
    }

    function records($table_name,$data){
      
        
        return $this->db->get($table_name)->result_array();
    }
}
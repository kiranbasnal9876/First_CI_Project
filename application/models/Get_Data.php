<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_Data extends CI_Model{
    function loggin_user($email,$password){
        
       $where=array('email'=>$email ,'password'=>$password);
      return $this->db->select('create_by')->where($where)->get('user_master')->result_array();
     

    }
}
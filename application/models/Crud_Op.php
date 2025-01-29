<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_Op extends CI_Model{
function insert_data($table_name,$data,$action){
if($action =='insert'){
  $this->db->insert($table_name,$data);
}
else if($action=='update'){
if(isset($data['password']) && $data['password']=="" ){
  array_pop($data);
}

  $id=$data['id'];

  $this->db->where('id', $id);

$this->db->update($table_name, $data);
}


}

function delete_data($id,$table_name,$action){
 
    $data ="";
    if($action=="delete" && $id !=  $_SESSION['log_user_data']['id']){

        $this->db->where('id',$id)->delete($table_name);
         $data="deleted";
    }
 else if($action=="update"){

   $data= $this->db->where('id',$id)->get($table_name)->result_array();
 }

return $data;
}

// function get_data($id,$table_name){

// }
}

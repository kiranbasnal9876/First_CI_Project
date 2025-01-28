<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_Op extends CI_Model{
function insert_data($table_name,$data){

$this->db->insert($table_name,$data);

}

function delete_data($id,$table_name,$action){
    $data ="";
    if($action=="delete"){
        $this->db->where('id',$id)->delete($table_name);
    }
 else{

   $data= $this->db->where('id',$id)->get($table_name)->result_array();
 }

return $data;
}

// function get_data($id,$table_name){

// }
}

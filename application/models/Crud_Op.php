<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_Op extends CI_Model{
function insert_data($table_name,$data){

$this->db->insert($table_name,$data);

}

}

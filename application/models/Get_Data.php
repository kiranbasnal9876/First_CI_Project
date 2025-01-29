<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_Data extends CI_Model
{
    function loggin_user($email, $password)
    {

        $where = array('email' => $email, 'password' => $password);
        return $this->db->select('*')->where($where)->get('user_master')->result_array();
    }

    function get_states()
    {
        return  $this->db->get('state_master')->result_array();
    }

    function get_destrict($id)
    {
        return $this->db->where('state_id', $id)->get('district_master')->result_array();
    }

    function records($table_name, $limit, $colname, $order, $page_no, $data)
    {

        // Offset of data
        $offset = ($page_no - 1) * $limit;

        $this->db->order_by($colname, $order);
         foreach($data as $key=>$value){
            $this->db->like($key,$value);
         }

        $this->db->from($table_name);
        if ($table_name == 'client_master') {

            $this->db->join("state_master sm ", "sm.state_id=client_master.state_id");
            $this->db->join("district_master dm ", "dm.district_id=client_master.district_id");
           

            $this->db->select(" client_master.id,client_master.name,client_master.phone,client_master.email,CONCAT_WS(', ', client_master.address, client_master.pincode,dm.district_name,sm.state_name) AS address");
        }
        
        $records = $this->db->get("", $limit, $offset)->result_array();

        return $records;
    }
}

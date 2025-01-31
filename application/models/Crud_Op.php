<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_Op extends CI_Model
{
  function insert_data($table_name, $data, $action)
  {
    if ($action == 'insert') {
      $this->db->insert($table_name, $data);
    } 
    else if ($action == 'update') {
      if (isset($data['password']) && $data['password'] == "") {
        array_pop($data);
      }

      $id = $data['id'];

      if ($table_name == "invoice_master") {
       
        $invoice_no = $data['invoice_no'];
        $invoice_date = $data['invoice_date'];
        $client_id = $data['client_id'];
        $total_amount = $data['total_amount'];
        $post_data = array('invoice_no' => $invoice_no, 'invoice_date' => $invoice_date, 'client_id' => $client_id, 'total_amount' => $total_amount);
        $this->db->where('id', $id);

        if ($this->db->update($table_name, $post_data)){
          
          $this->db->where('invoice_id', $id);
          
          if ($this->db->delete("invoice_itemlist")){
            $status=0;
            $invoice_id = $id;
            $item_id = $_POST['item_id'];
            $quantity = $_POST['quantity'];
            $amount = $_POST['amount'];


            for ($i = 0; $i < count($item_id); $i++) {
              if ($quantity[$i] != "" && $item_id[$i] != "") {
                $items = array('invoice_id' => $invoice_id, 'item_id' => $item_id[$i], 'quantity' => $quantity[$i], 'amount' => $amount[$i]);
                if ($this->db->insert('invoice_itemlist', $items)) {
                  $status = 200;
                  
                  
                }
              }
            }
            return json_encode(['status' => $status]);
          }
        }
      }
        $this->db->where('id', $id);

        if($this->db->update($table_name, $data)){
          $status = 200;
          return json_encode(['status' => $status]);
        }
      
    }
  }


    function delete_data($id, $table_name, $action)
    {

      $data = "";
      if ($action == "delete" && $id !=  $_SESSION['log_user_data']['id']) {
          if($table_name=="invoice_master"){
            $this->db->where('invoice_id', $id);
            if($this->db->delete("invoice_itemlist")){
              $this->db->where('id', $id)->delete("invoice_master");
              return  $data = "deleted";
            }
          }
        $this->db->where('id', $id)->delete($table_name);

        $data = "deleted";
      } else if ($action == "edit") {
        $this->db->from($table_name);
        if ($table_name == 'invoice_master') {

          $this->db->join("client_master cm", "cm.id=invoice_master.client_id");
          $this->db->join("state_master sm ", "sm.state_id=cm.state_id");
          $this->db->join("district_master dm ", "dm.district_id=cm.district_id");


          $this->db->join("invoice_itemlist item", "item.invoice_id=invoice_master.id");
          $this->db->join("item_master ims", "ims.id= item.item_id");
          $this->db->select(" *,invoice_master.id, invoice_master.invoice_no,invoice_date,name,CONCAT_WS(', ', cm.address, cm.pincode,dm.district_name,sm.state_name) AS address,email,phone,total_amount");
          $data = $this->db->where('invoice_master.id', $id)->get("")->result_array();
          return $data;
          die;
        }

        $data = $this->db->where('id', $id)->get("")->result_array();
      }

      return $data;
    }



  }


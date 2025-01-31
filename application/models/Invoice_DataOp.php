<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice_DataOp extends CI_Model
{
  function invoice_data($data)
  {
    $status = 0;
    $error = "";
    $invoice_no = $data['invoice_no'];
    $invoice_date = $data['invoice_date'];
    $client_id = $data['client_id'];
    $total_amount = $data['total_amount'];
    $post_data = array('invoice_no' => $invoice_no, 'invoice_date' => $invoice_date, 'client_id' => $client_id, 'total_amount' => $total_amount);

    if ($this->db->insert('invoice_master', $post_data)) {

      $last_id = $this->db->insert_id();
      $item_id = $_POST['item_id'];
      $quantity = $_POST['quantity'];
      $amount = $_POST['amount'];


      for ($i = 0; $i < count($item_id); $i++) {
        if ($quantity[$i] != "" && $item_id[$i] != "") {
          $items = array('invoice_id' => $last_id, 'item_id' => $item_id[$i], 'quantity' => $quantity[$i], 'amount' => $amount[$i]);
          if ($this->db->insert('invoice_itemlist', $items)) {
            $status = 200;
          }
        } else {

          $error = "plz select Quantity";
        }

       
      }
      echo  json_encode(['status' => $status, 'error' => $error]);
    }
  }




  function genrateInvoice()
  {

    $data = $this->db->select('id')->from('invoice_master')->order_by('id', 'desc')->limit(1)->get()->row();

    echo json_encode($data);
  }

  // client autocomplete
  function clientComplete($name)
  {
    $this->db->like($name);
    $result = $this->db->get('client_master')->result();

    return json_encode(['output' => $result]);
  }

  // item autocomplete
  function itemComplete($data)
  {

    $itemName['itemName'] = $data['value'];

    if (isset($data['items_id'])) {

      $arrId = $_POST['items_id'];

      $ids = implode(" ,", $arrId);

      $this->db->where_not_in('id', $ids);
    }

    $this->db->like($itemName);
    $result = $this->db->get('item_master')->result();

    return json_encode(['output' => $result]);
  }

function get_invoice_pdfData($id){
  $this->db->from("invoice_master");
  $this->db->join("client_master cm", "cm.id=invoice_master.client_id");

  $this->db->join("state_master sm ", "sm.state_id=cm.state_id");
  $this->db->join("district_master dm ", "dm.district_id=cm.district_id");
  $this->db->select(" *,invoice_master.id, invoice_master.invoice_no,invoice_date,name,CONCAT_WS(', ', cm.address, cm.pincode,dm.district_name,sm.state_name) AS address,email,phone,total_amount");
  $data = $this->db->where('invoice_master.id', $id)->get("")->result_array();


  $this->db->from("invoice_itemlist");
 
  $this->db->join("item_master ims", "ims.id= invoice_itemlist.item_id");
  $items=$this->db->where('invoice_itemlist.invoice_id', $id)->get("")->result();

  return json_encode(['client_details'=>$data,'item_details'=>$items]);

  
}


}

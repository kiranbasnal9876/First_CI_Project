<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_Op extends CI_Model
{
  function insert_data($table_name, $data, $action)
  {
    if ($action == 'insert') {
      $this->db->insert($table_name, $data);
    } else if ($action == 'update') {
      if (isset($data['password']) && $data['password'] == "") {
        array_pop($data);
      }

      $id = $data['id'];

      $this->db->where('id', $id);

      $this->db->update($table_name, $data);
    }
  }

  function delete_data($id, $table_name, $action)
  {

    $data = "";
    if ($action == "delete" && $id !=  $_SESSION['log_user_data']['id']) {

      $this->db->where('id', $id)->delete($table_name);
      $data = "deleted";
    } else if ($action == "update") {

      $data = $this->db->where('id', $id)->get($table_name)->result_array();
    }

    return $data;
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

      $arrId = $_POST['arrId'];

      $ids = implode(" ,", $arrId);

      $this->db->where_not_in('id', $ids);

    }

    $this->db->like($itemName);
    $result = $this->db->get('item_master')->result();

    return json_encode(['output' => $result]);
  }
}

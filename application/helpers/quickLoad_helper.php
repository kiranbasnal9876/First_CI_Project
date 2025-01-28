<?php
function view_load($view){
    $CI =& get_instance();
    return $CI->load->view($view);
}

function check_session($master_view){
    $CI =& get_instance();
    if($CI->session->userdata() == ""){
        redirect(base_url()."LogInPage");
    }

    // else{
        // $CI->load->view($master_view,$data);
    // }
}


function delete_edit(){
    $CI =& get_instance();
    $id = $CI ->input->post('id');
    $table_name = $CI ->input->post('table_name');
    $action=$CI ->input->post('action');
    $CI ->load->model('Crud_Op');
  $data=  $CI ->Crud_Op->delete_data($id,$table_name,$action);
  echo json_encode(['data_for_edit'=>$data]);

}




?>
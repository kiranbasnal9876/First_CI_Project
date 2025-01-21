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
    else{
        $CI->load->view($master_view);
    }
}
?>
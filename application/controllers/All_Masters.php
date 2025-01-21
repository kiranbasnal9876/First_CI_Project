<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class All_masters extends CI_Controller{



    function dashboard(){
        check_session('dashboard');
      }
    function user_master(){
    check_session('user_master');
   
  
}
 function client_master(){
    check_session('client_master');
 }
 function item_master(){
    check_session('item_master');

}
function invoice_master(){
    check_session('invoice_master');
}






}

?>
<?php
class Paggination extends CI_Controller
{
        function index() {
             $data=$_POST;
            
              $users = json_decode(records('user_master',$data)) ;
              $items = json_decode(records('item_master',$data));
              $clients = json_decode(records('client_master',$data));
             echo   json_encode(['users_records'=>$users,'item_records'=>$items,'client_records'=>$clients]);
        }

        function get(){



        }

}
       
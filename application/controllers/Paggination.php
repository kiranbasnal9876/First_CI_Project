<?php
class Paggination extends CI_Controller
{
        function index() {
              $users =  records('user_master');
              $items =  records('item_master');
             echo   json_encode(['users_records'=>$users,'item_records'=>$items]);
        }

}
       
<?php
class Paggination extends CI_Controller
{
        function index() {
                $data=$_POST;
             $table=$_POST['table_name'];
             array_pop($data);
        
        echo records($table,$data);
            
            
        }

     
}
       
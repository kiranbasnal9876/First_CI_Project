<?php
defined('BASEPATH') or exit('No direct script access allowed');
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
class Paggination extends CI_Controller
{
        function index() {

            
        }


        function test(){

                echo "hii" ;die;
                $data = file_get_contents("php://input");
                $data = json_decode($data, TRUE);
                $_POST = $data;
                // $data=$_POST;
             $table=$_POST['table_name'];
             unset($data['table_name']);die;
        
        echo records($table,$data);
        }

     
}
       
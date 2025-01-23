<?php

function records($table_name){
    $CI =& get_instance();
           $CI->load->model('Get_Data');
          $data=  $CI->Get_Data->records($table_name);
              
        //   print_r($data);die;
            $output="";

            for($i=0;$i<count($data);$i++){
                $s_no = $i+1;
                $output .="<tr><td>{$s_no}</td>";
                
                
                foreach($data[$i] as $key=>$value)
                {

                    if($data[$i][$key]=="PASSWORD"){
                        continue;
                    }
                    $output .="<td>{$data[$i][$key]}</td>";
                }
               
                  
                
                $output .="</tr>";

            }

           return $output;

        }

    

    ?>
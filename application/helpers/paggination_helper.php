<?php

function records($table_name,$data){
            
              
     
        $colname=$data['colname'];
        $order=$data['order'];
        $page_no=$data['page_no'];
        $limit=$data['row_no'];
        $pages="";
        $output="";
       array_splice($data ,-4);


       $CI =& get_instance();
       $CI->load->model('Get_Data');
      $data_table = $CI->Get_Data->records($table_name,$limit,$colname,$order,$data);
           
            $total_page= ceil(count($data_table)/$limit);
        
          
             $pages .= "<button type='button' class='btn btn-outline-primary'data-id='$total_page'  id='$page_no'>$page_no</button>";
            
            
            for($i=0;$i<count($data_table);$i++){
                $s_no = $i+1;
                $output .="<tr><td>{$s_no}</td>";
                
                
                foreach($data_table[$i] as $key=>$value)
                {
                    // print_r($key);die;

                    if($key == "PASSWORD" || $key == "pincode" ){
                        continue;
                    }
                    $output .="<td>{$value}</td>";
                }
               
                  $output .="<td id='{$data[$i]['id']}' data-table_name='$table_name' class='delete' ><button class='btn btn-danger'><i class='bi bi-trash3 m-3'></i></button></td><td id='{$data[$i]['id']}' data-table_name='$table_name' class='edit' ><button class='btn btn-info'><i class='bi bi-pencil m-3'></i></button></td>";
                
                $output .="</tr>";

            }

        return  json_encode(['pagination'=>$pages,'table'=>$output]) ;

        }

    

    ?>
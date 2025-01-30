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
      $data_table = $CI->Get_Data->records($table_name,$limit,$colname,$order,$page_no,$data);
           
      $total_rows = $CI->db->get($table_name)->num_rows();
            $total_page= ceil($total_rows/$limit);

            // Number of pages 
  
           
    $pages = '<button type="button" class="btn btn-outline-primary" id="pagination_left">Left</button>';

    
    $pages .= "<button type='button' class='btn btn-outline-primary pagination-li'data-pages='$total_page'  id='$page_no'>$page_no</button>";
    
    $pages .='<button type="button" class="btn btn-outline-primary" id="pagination_right">Right</button>';
            

    // print_r($data_table);
            for($i=0;$i<count($data_table);$i++){
                $s_no = $i+1;
                $output .="<tr><td>{$s_no}</td>";
                
                
                foreach($data_table[$i] as $key=>$value)
                {
                    // print_r($key);die;

                    if($key == "PASSWORD"  ||$key=="state_id"||$key=="district_id"||$key=="state_code"){
                        continue;
                    }
                    else if($key=="itemPath"){
                        $output.=  "<td><img src='folder/$value'></td>";
                      continue;
                      
                    }
                    $output .="<td>{$value}</td>";
                }

                if($table_name == "invoice_master"){

                    $output .= "<td class='text-center pdf' ><a><i class='bi bi-file-earmark-pdf-fill text-danger' id='{$data_table[$i]['id']}' data-table_name='$table_name'></i></a></td>
                    
                                <td class='text-center send_mail' ><i class='bi bi-envelope-plus-fill text-success' id='{$data_table[$i]['id']}' data-table_name='$table_name'></i></td>";

                }
               
                  $output .="<td id='{$data_table[$i]['id']}' data-table_name='$table_name' class='delete' ><button class='btn btn-danger'><i class='bi bi-trash3 m-3'></i></button></td><td id='{$data_table[$i]['id']}' data-table_name='$table_name' class='edit' ><button class='btn btn-info'><i class='bi bi-pencil m-3'></i></button></td>";
                
                $output .="</tr>";

            }

        return  json_encode(['pagination'=>$pages,'table'=>$output]) ;

        }

    

    ?>
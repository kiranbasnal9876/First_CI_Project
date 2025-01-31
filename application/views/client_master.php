<?php 
view_load('header'); 
 view_load('navbar'); 
 if( ! $this->session->has_userdata('log_user_data'))
{
    redirect('LogInPage');
}


?>


<div class="col-12 inner-container ">
<?php

view_load('sidebar');
?>

    <div class="content col-10">
        
    <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"> Records</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Add User</button>

            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row records-div ">

                    <div class="search-data col-12">
                        <form class="row g-3 " id="search" name="search_form">
                            <div class="col-md-1">
                                <label for="validationCustom01" class="form-label">ID:</label>
                                <input type="number" class="form-control numeric" id="validationCustom01" value="" name='id' required maxlength="5">

                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom02" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" name='name' required maxlength="20">

                            </div>
                            <div class="col-md-2">
                                <label for="validationCustomUsername" class="form-label">Phone:</label>
                                

                                    <input type="number" class="form-control numberic" id="validationCustomUsername" name="phone" maxlength="12" required>

                            </div>

                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="validationCustom05" name="email" required>
             
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">Address:</label>
                                <input type="text" class="form-control" id="validationCustom05" name="address" required>
                               
                            </div>
                           
                          
                            <input type="hidden" name="page_no" id="current_page" value='1'>
                            <input type="hidden" name="row_no" id="limit" value="2">
                            <input type="hidden" name="colname" value="id" id="sort_column">
                            <input type="hidden" name="order" value="DESC" id="sort_order">
                            <input type="hidden" name="table_name" class="table" value="client_master">
                            <div class="col-1">
                                <button class="btn btn-secondary button" type="reset" id="reset">Reset</button>
                                
                            </div>
                        </form>
                    </div>
                    <div class="data-list col-12">

                    <div class=" col-12 page-row">
                            <div>
                                <select id="selected_row">
                                    <option value="2">2</option>
                                    <option value="6">6</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="pagination">
                                <div class="btn-group" role="group" aria-label="Basic outlined example" id="pagination-container">
                                   
                                </div>
                            </div>
                        </div>
                        <table class="table  table-striped">
                            <th>S.No</th>
                            <th id="id" class="changeIcon"><i class="bi bi-chevron-down">ID</th>
                            <th id="name" class="changeIcon"><i class="bi bi-chevron-down">Name</th>
                            <th id="phone" class="changeIcon"><i class="bi bi-chevron-down">Phone</th>
                            <th id="email" class="changeIcon"><i class="bi bi-chevron-down">Email</th>
                            <th id="address" class="changeIcon">Address</th>
                            <th>Delete</th>
                            <th>Update</th>
                            <tbody class="getlist">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row records-div ">
            <div class="search-data col-12">
                        <form class="row g-3 needs-validation submit-form" name="form" >
                          
                        
                                <input type="hidden" class="form-control" id="validationCustom01" name="id" value="">

                     
                            <div class="col-md-3">
                                <label for="validationCustom02" class="form-label">Client Name<span class="error-message">*</span></label>
                                <input type="text" class="form-control" id="validationCustom02" name="name" value="" maxlength="30" required>

                            </div>
                            <div class="col-md-3">
                                <label for="validationCustomUsername" class="form-label">Phone Number<span class="error-message">*</span></label>
                                

                                    <input type="text" class="form-control" id="validationCustomUsername" maxlength="12" name="phone" required>

                                
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Client Email<span class="error-message">*</span></label>
                                <input type="email" class="form-control" id="validationCustom05" name="email" required>
                            </div>
                           
                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Address<span class="error-message">*</span></label>
                                <input type="text" class="form-control" id="validationCustom05" name="address" maxlength="100" required>
                             
                            </div>
                            <div class="col-md-3">
                            <label for="validationCustom04" class="form-label" >State<span class="error-message">*</span></label>
                            <select class="form-select" id="inputState"  name="state_id">

                              <option   value="" name="">Choose</option>
                              
                              <?php 
                                
                                    for($i=0;$i<count($states);$i++){

                                        echo "<option value='{$states[$i]['state_id']}'>{$states[$i]['state_name']}</option>";
                                    }
                                            
    
                                        ?>
                            </select>
   
                              </div>
                              <div class="col-md-3">
                              <label for="validationCustom02" class="form-label">District<span class="error-message">*</span></label>
                              <select class="form-select" id="input_district" name="district_id">
                              <option id="option" value="">Choose</option>
                               
                              </select>
                             
                              </div>
                              <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Pin Code<span class="error-message">*</span></label>
                                <input type="text" class="form-control" id="validationCustom05 numeric" name="pincode" maxlength="8">
                             
                            </div>
                            <input type="hidden" name="table_name" value="client_master">
                            <div class="col-1">
                                <button class="btn btn-secondary button submit" type="button" >Submit</button>
                                <button type="button" class="btn btn-secondary button update">Update</button>
                            </div>
                        </form>
            </div>
                    </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('footer') ?>
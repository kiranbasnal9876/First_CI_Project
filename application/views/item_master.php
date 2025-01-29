<?php 
view_load('header'); 
 view_load('navbar'); 
 if( !$this->session->has_userdata('log_user_data'))
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
                        <form class="row g-3 " name="search_form" id="search" >
                           
                            <div class="col-md-3">
                                <label for="validationCustom02" class="form-label"> Item Name:</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" name="itemName" required>
                            </div>
                            <input type="hidden" name="page_no" id="current_page" value='1'>
                            <input type="hidden" name="row_no" id="limit" value="2">
                            <input type="hidden" name="colname" value="id" id="sort_column">
                            <input type="hidden" name="order" value="DESC" id="sort_order">
                            <input type="hidden" name="table_name" value="item_master">
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
                            <th class="changeIcon" id="id"><i class="bi bi-chevron-expand">ID</th>
                            <th class="changeIcon" id="itemName"><i class="bi bi-chevron-expand"> Item Name</th>
                            <th class="changeIcon" id="itemPrice"><i class="bi bi-chevron-expand">Item Price</th>
                            <th class="changeIcon" id="itemD"><i class="bi bi-chevron-expand">Item Description</th>
                            <th >Item Image</th>
                            
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
                        <form class="row g-3 submit-form" name="form">
                          
                                <input type="hidden" class="form-control" name="id"  value="">

                     
                            <div class="col-md-2">
                                <label for="validationCustom02" class="form-label">Item Name<span class="error-message">*</span></label>
                                <input type="text" class="form-control" id="validationCustom02"   name="itemName" required maxlength="20">

                            </div>
                            <div class="col-md-2">
                                <label for="validationCustomUsername" class="form-label"> Price<span class="error-message">*</span></label>
                               

                                    <input type="text" class="form-control price" id="validationCustomUsername" name="itemPrice" maxlength="10">

                              
                            </div>
                            <div class="col-md-2">
                            <label for="validationCustomUsername" class="form-label"> item Descrption<span class="error-message">*</span></label>
                              <textarea type="text" class="form-control"  name="itemD" id="validationCustom05" required rows="1" maxlength="200"></textarea>
                           
                          </div>
                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">Image<span class="error-message">*</span></label>
                                <input type="file" class="form-control" id="validationCustom05" name="itemPath" onChange="imgDicShow()" oninput="pic.src=window.URL.createObjectURL(this.files[0]) " accept="image/png, image/gif, image/jpeg" >
                            </div>
                           
                            <div class="col-1" id="show-img">
                                    <img src="" id="pic" alt="">

                                </div>
                        <input type="hidden" name="table_name" value="item_master">

                            <div class="col-1">
                            <button type="button" class="btn btn-secondary button update">Update</button>
                                <button class="btn btn-secondary button submit" type="button" >Submit</button>
                            </div>
                        </form>
            
                    </div>
            </div>
            </div>
        </div>
    
    </div>
</div>

<?php $this->load->view('footer') ?>
<?php 
view_load('header'); 
 view_load('navbar'); 

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
                        <form class="row g-3 needs-validation" novalidate>
                           
                            <div class="col-md-3">
                                <label for="validationCustom02" class="form-label"> Item Name:</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" required>
                            </div>
                           
                            <div class="col-1">
                                <button class="btn btn-secondary button" type="button">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div class="data-list col-12">
                        <table class="table  table-striped">
                            <th>S.No</th>
                            <th>ID</th>
                            <th> Item Name</th>
                            <th>Item Price</th>
                            <th>Item Description</th>
                            <th>Item Image</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </table>
                    </div>
                </div>
            
        </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row records-div ">
            <div class="search-data col-12">
                        <form class="row g-3 submit-form" name="form">
                          
                                <input type="hidden" class="form-control" id="validationCustom01" value="">

                     
                            <div class="col-md-3">
                                <label for="validationCustom02" class="form-label">Item Name:</label>
                                <input type="text" class="form-control" id="validationCustom02"   name="itemName" required minlength="20">

                            </div>
                            <div class="col-md-3">
                                <label for="validationCustomUsername" class="form-label"> Price:</label>
                               

                                    <input type="text" class="form-control price" id="validationCustomUsername" name="itemPrice" required>

                              
                            </div>
                            <div class="col-md-3">
                            <label for="validationCustomUsername" class="form-label"> item Descrption:</label>
                              <textarea type="text" class="form-control"  name="itemD" id="validationCustom05" required rows="1"></textarea>
                           
                          </div>
                            <div class="col-md-3 ">
                                <label for="validationCustom05" class="form-label">Image:</label>
                                <input type="file" class="form-control" id="validationCustom05" name="itemPath" required>
                            </div>
                           
                        <input type="hidden" name="table_name" value="item_master">

                            <div class="col-1">
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
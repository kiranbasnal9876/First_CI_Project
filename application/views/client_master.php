<?php 
view_load('header'); 
 view_load('navbar'); 

if( ! $this->session->has_userdata('name'))
{
    header("Location:".base_url()."LogInPage");
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
                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-1">
                                <label for="validationCustom01" class="form-label">ID:</label>
                                <input type="text" class="form-control" id="validationCustom01" value="" required>

                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom02" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" required>

                            </div>
                            <div class="col-md-2">
                                <label for="validationCustomUsername" class="form-label">Phone:</label>
                                <div class="input-group has-validation">

                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="validationCustom05" required>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">State:</label>
                                <input type="text" class="form-control" id="validationCustom05" required>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">District:</label>
                                <input type="text" class="form-control" id="validationCustom05" required>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                          

                            <div class="col-1">
                                <button class="btn btn-secondary button">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div class="data-list col-12">
                        <table class="table  table-striped">
                            <th>S.No</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>State</th>
                            <th>District</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row records-div ">
            <div class="search-data col-12">
                        <form class="row g-3 needs-validation" novalidate>
                          
                               
                                <input type="hidden" class="form-control" id="validationCustom01" value="">

                     
                            <div class="col-md-3">
                                <label for="validationCustom02" class="form-label">Client Name:</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" required>

                            </div>
                            <div class="col-md-3">
                                <label for="validationCustomUsername" class="form-label">Phone Number:</label>
                                <div class="input-group has-validation">

                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="validationCustom05" required>
                            </div>
                           
                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Address:</label>
                                <input type="password" class="form-control" id="validationCustom05" required>
                             
                            </div>
                            <div class="col-md-3">
    <label for="validationCustom04" class="form-label">State:</label>
    <select class="form-select" id="validationCustom04" required>
      <option  value="">Choose</option>
      
    </select>
   
  </div>
  <div class="col-md-3">
    <label for="validationCustom02" class="form-label">District:</label>
    <select class="form-select" id="validationCustom04" required>
      <option  value="">Choose</option>
     
    </select>
   
  </div>
  <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Pin Code:</label>
                                <input type="password" class="form-control" id="validationCustom05" required>
                             
                            </div>
                            <div class="col-1">
                                <button class="btn btn-secondary button submit  " >Submit</button>
                            </div>
                        </form>
            </div>
                    </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('footer') ?>
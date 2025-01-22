<?php
view_load('header');
view_load('navbar');
$this->form_validation->run();
// echo validation_errors();

if (! $this->session->has_userdata('name')) {
    header("Location:" . base_url() . "LogInPage");
}
?>



<div class="col-12 inner-container ">
    <?php view_load('sidebar'); ?>

   
    <div class="content  col-10">


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
                            <div class="col-md-2">
                                <label for="validationCustom01" class="form-label">ID:</label>
                                <input type="text" class="form-control" id="validationCustom01" value="" name="user_id" >

                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom02" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" name="user_name" >

                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom" class="form-label">Phone:</label>
                               

                                    <input type="text" class="form-control" id="validationCustom" name="phone">

                                
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="validationCustom" name="email" >
                              
                            </div>

                            <div class="col-1">
                                <button  type='button' class="btn btn-secondary button">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div class="data-list col-12">
                        <table class="table  table-striped">
                            <th>S.No</th>
                            <th><i class="bi bi-chevron-expand"></i>ID</th>
                            <th><i class="bi bi-chevron-expand"></i>Name</th>
                            <th><i class="bi bi-chevron-expand"></i>Phone</th>
                            <th><i class="bi bi-chevron-expand"></i>Email</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row records-div ">
                    <div class="search-data col-12">
                        <form class="row g-3 needs-validation" name="form">


                            <input type="hidden" class="form-control" id="validationCustom01" name="user_id" value="" >


                            <div class="col-md-3">
                                <label for="validationCustom02" class="form-label">User Name:</label>
                                <input type="text" class="form-control" id="validationCustom02" name="name" value="" minlength="2" maxlength="20" required>
                                <?php echo  form_error('name'); ?>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustomUsername" class="form-label">Phone Number:</label>


                                <input type="text" class="form-control numeric" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="phone" minlength="10" maxlength="12" required  >


                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="validationCustom" name="email" required>
                            </div>
                            <div class="col-md-3">
                                <label for="pswd" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="pswd" name="password" required >
                               
                            </div>

                            <div class="col-1">
                                <button type="button" class="btn btn-secondary button submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('footer') ?>
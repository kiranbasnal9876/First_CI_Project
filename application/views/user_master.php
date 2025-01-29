<?php
view_load('header');
view_load('navbar');
$this->form_validation->run();
echo validation_errors();

if (! $this->session->has_userdata('log_user_data')) {
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
                        <form class="row g-3  " id="search" name="search_form">
                            <div class="col-md-2">
                                <label for="validationCustom01" class="form-label">ID:</label>
                                <input type="number" class="form-control numeric" id="validationCustom01" value="" name="id">

                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom02" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" name="name">

                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom" class="form-label">Phone:</label>


                                <input type="number" class="form-control numeric" id="validationCustom" name="phone">


                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="validationCustom" name="email">

                            </div>
                            <input type="hidden" name="page_no" id="current_page" value='1'>
                            <input type="hidden" name="row_no" id="limit" value="2">
                            <input type="hidden" name="colname" value="id" id="sort_column">
                            <input type="hidden" name="order" value="DESC" id="sort_order">
                            <input type="hidden" name="table_name" class="table" value="user_master">
                            <div class="col-1">
                                <button type='reset' class="btn btn-secondary button" id="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div class="data-list  col-12">
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
                            <th class="changeIcon" id="id" ><i class="bi bi-chevron-expand"></i>ID</th>
                            <th class="changeIcon" id="name" ><i class="bi bi-chevron-expand"></i>Name</th>
                            <th class="changeIcon" id="email" ><i class="bi bi-chevron-expand"></i>Email</th>
                            <th class="changeIcon" id="phone" ><i class="bi bi-chevron-expand"></i>Phone</th>
                            <th>Delete</th>
                            <th>Update</th>
                            <tbody class="getlist"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row records-div ">
                    <div class="search-data col-12">
                        <form class="row g-3 submit-form" name="form">


                            <input type="hidden" class="form-control" id="validationCustom01" name="id" value="">


                            <div class="col-md-3">
                                <label for="validationCustom02" class="form-label">User Name<span class="error-message">*</span></label>
                                <input type="text" class="form-control" id="validationCustom02" name='name' value="" minlength="2" maxlength="20">

                            </div>
                            <div class="col-md-3">
                                <label for="validationCustomUsername" class="form-label">Phone Number<span class="error-message">*</span></label>


                                <input type="number" class="form-control numeric" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="phone" minlength="10" maxlength="12" required>


                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom" class="form-label">Email<span class="error-message">*</span></label>
                                <input type="email" class="form-control" id="validationCustom" name="email" required>
                            </div>
                            <div class="col-md-3">
                                <label for="pswd" class="form-label">Password<span class="error-message">*</span></label>
                                <input type="password" class="form-control" id="pswd" name="password" required>

                            </div>
                            <input type="hidden" name="table_name" class="table" value="user_master">
                            <div class="col-1">
                                <button type="button" class="btn btn-secondary button submit">Submit</button>
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
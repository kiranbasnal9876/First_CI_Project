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
                            <div class="col-md-2">
                                <label for="validationCustom01" class="form-label">Invoice No:</label>
                                <input type="text" class="form-control" id="validationCustom01" value="" required>

                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom02" class="form-label">Client Name:</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" required>

                            </div>
                            <div class="col-md-2">
                                <label for="validationCustomUsername" class="form-label">Phone:</label>
                                <div class="input-group has-validation">

                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="validationCustom05" required>
                              
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">Invoice Date:</label>
                                <input type="Date" class="form-control" id="validationCustom05" required>
                              
                            </div>

                            <div class="col-1">
                                <button class="btn btn-secondary button">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div class="data-list col-12">
                        <table class="table  table-striped">
                            <th>S.No</th>
                            <th>Invoice No</th>
                            <th>Invoice Date</th>
                            <th>Client Name</th>
                            <th>Client Address</th>
                            <th> ClientPhone</th>
                            <th> Client Email</th>
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

                     
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="invoice" class="form-label">Invoice No:</label>
                                        <input type="text" class="form-control invoic" name="invoice_no" id="invoice" maxlength="15" readonly>
                                        <input type="hidden" class="invoice_id" name="invoice_id" value="">
                                    </div>
                                    <div class="col-3">
                                        <label for="invoice_date" class="form-label">Invoice Date:</label>
                                        <input type="text" class="form-control" name="invoice_date" id="invoice_date2" readonly>

                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-3">
                                        <label for="client_name" class="form-label ">Client Name:</label>
                                        <input type="text" class="form-control clients" name="name" id="client_name" maxlength="12" autocomplete="off">
                                        <span></span>
                                        <input type="hidden" class="clientId" name="client_id" value="">
                                        
                                    </div>


                                    <div class="col-md-3">
                                        <label for="inputphone" class="form-label">Phone:</label>
                                        <input type="text" class="form-control numeric" id="inputphone" maxlength="12" name="phone" readonly>

                                    </div>

                                    <div class="col-md-3">
                                        <label for="inputemail" class="form-label ">Email:</label>
                                        <input type="email" class="form-control " id="inputemail" name="email" maxlength="20" readonly>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputAddress" class="form-label">Address:</label>
                                        <input type="text" class="form-control" id="inputAddress" name="address" maxlength="50" readonly>

                                    </div>


                                </div>
                            <!-- <div class="col-1">
                                <button class="btn btn-secondary button submit  " >Submit</button>
                            </div> -->
                        </form>
            </div>
                    </div>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('footer') ?>
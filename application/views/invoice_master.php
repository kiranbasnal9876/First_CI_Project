<?php
view_load('header');
view_load('navbar');
if (! $this->session->has_userdata('log_user_data')) {
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
                        <form class="row g-3 needs-validation" name="search_form" id="search" novalidate>
                            <div class="col-md-2">
                                <label for="validationCustom01" class="form-label">Invoice No:</label>
                                <input type="text" class="form-control" id="validationCustom01" value="" name="invoice_no" required>

                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom02" class="form-label">Client Name:</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" name="name" required>

                            </div>
                            <div class="col-md-2">
                                <label for="validationCustomUsername" class="form-label">Phone:</label>
                                <div class="input-group has-validation">

                                    <input type="text" class="form-control" id="validationCustomUsername" name="phone" required>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="validationCustom05" name="email" required>

                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">Invoice Date:</label>
                                <input type="Date" class="form-control" id="validationCustom05" name="invoice_date" required>

                            </div>

                            <input type="hidden" name="page_no" id="current_page" value='1'>
                            <input type="hidden" name="row_no" id="limit" value="2">
                            <input type="hidden" name="colname" value="invoice_master.id" id="sort_column">
                            <input type="hidden" name="order" value="DESC" id="sort_order">
                            <input type="hidden" name="table_name" value="invoice_master">

                            <div class="col-1">
                                <button class="btn btn-secondary button" id="reset" type="reset">Reset</button>
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
                        <thead>
                                            
                                                <th>S No.</th>
                                               
                                                <th class="changeIcon" id='invoice_master.id'><i class="bi bi-chevron-down"></i>ID</th>
                                                <th class="changeIcon" id='invoice_no'><i class="bi bi-chevron-down"></i>Invoice No</th>
                                                <th class="changeIcon"  id='invoice_date'> <i class="bi bi-chevron-down"></i>Invoice Date</th>
                                                <th class="changeIcon" id='name'><i class="bi bi-chevron-down"></i>client Name</th>
                                                <th>address</th>
                                                <th class="changeIcon" id='email'><i class="bi bi-chevron-down"></i>Client Email</th>
                                                <th class="changeIcon" id='phone'><i class="bi bi-chevron-down"></i>Client Phone</th>
                                                <th>Total</th>
                                                <th>PDF</th>
                                                <th>Email</th>

                                                <th>Update</th>
                                                <th>Delete</th>

                                            
                                        </thead>
                                        <tbody class="getlist">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row records-div ">
                    
                    <div class="search-data col-12">


                            <input type="hidden" class="form-control" id="validationCustom01" value="">


                            <div class="row mb-3">
                                <div class="col-3">
                                    <label for="invoice" class="form-label">Invoice No<span class="error-message">*</span></label>
                                    <input type="text" class="form-control invoic" name="invoice_no" id="invoice" maxlength="15" minlength="100">
                                    <input type="hidden" class="invoice_id" name="invoice_id" value="">
                                </div>
                                <div class="col-3">
                                    <label for="invoice_date" class="form-label">Invoice Date<span class="error-message">*</span></label>
                                    <input type="date" class="form-control" name="invoice_date" id="invoice_date2" >

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <label for="client_name" class="form-label ">Client Name<span class="error-message">*</span></label>
                                    <input type="text" class="form-control clients" name="name" id="client_name" maxlength="12" autocomplete="off">
                                   
                                    <input type="hidden" class="clientId" name="client_id" value="">

                                </div>


                                <div class="col-md-3">
                                    <label for="inputphone" class="form-label">Phone<span class="error-message">*</span></label>
                                    <input type="text" class="form-control numeric" id="inputphone" maxlength="12" name="phone" readonly>

                                </div>

                                <div class="col-md-3">
                                    <label for="inputemail" class="form-label ">Email<span class="error-message">*</span></label>
                                    <input type="email" class="form-control " id="inputemail" name="email" maxlength="20" readonly>

                                </div>
                                <div class="col-md-3">
                                    <label for="inputAddress" class="form-label">Address<span class="error-message">*</span></label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" maxlength="50" readonly>
                                </div>
                            </div>
                    </div>
                            <div class="add-invoice  add-new row">


                                <div class="clone-row row clone">

                                    <div class="col-3">
                                        <label for="input" class="form-label">Item Name<span class="error-message">*</span></label>

                                        <input type="text" class="form-control inputitem" id="input" maxlength="20" onchange="amount()">
                                        
                                        <input type="hidden" class="item_id" name="item_id[]">

                                    </div>
                                    <div class="col-md-3 price">
                                        <label for="inputprice" class="form-label">Item Price<span class="error-message">*</span></label>
                                        <input type="text" class="form-control price right" id="inputprice" maxlength="10" oninput="amount()" readonly>

                                    </div>
                                    <div class="col-2">
                                        <label for="item" class="form-label">Quantity<span class="error-message">*</span></label>
                                        <input type="number" class="form-control numeric Item right" name="quantity[]" id="item" maxlength="5" minlength="1" min="1" oninput="amount()" required>
                                    </div>
                                    <div class="col-md-3 price">
                                        <label for="amount" class="form-label">Amount<span class="error-message">*</span></label>
                                        <input type="text" class="form-control Amount right" name="amount[]" id="" readonly>

                                    </div>
                                    <div class="col-1">

                                        <button type="button" class=" btn bg-danger delete-item"><i class="bi bi-x-lg text-light"></i></button>
                                    </div>



                                </div>

                            </div>
                            <div class="add-more">
                                <button type="button" class="btn bg-primary text-light" id="add-more">Add More</button>
                                <div>
                                    <label for="">Total Amount<span class="error-message">*</span></label>
                                    <input type="text" class="form-control right" id="total-amount" name="total_amount" readonly>
                                </div>
                            </div>
                            
                        <input type="hidden" name="table_name" value="invoice_master">
                            <div class="col-1">
                                <button type="button" class="btn btn-secondary button update">Update</button>
                                <button class="btn btn-secondary button submit" type="button">Submit</button>
                            </div>





                        </form>

                    

                </div>
            </div>
        </div>

        <?php $this->load->view('footer') ?>
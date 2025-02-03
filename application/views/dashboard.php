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
  $details = json_decode($details);


  ?>
  <div class="content dashboard-container col-md-10 ">
    <div class="row">

      <div class="   col-md-6 col-xl-3 col-sm-6">
        <div class="border border-primary">
          <h5 class="card-header">User Master</h5>
          <a href="All_Masters/user_master">
            <div class="card-body  text-primary">
              <i class="bi bi-person "></i>
              <h5 class="card-title"><?= $details->user_data ?></h5>
            </div>
          </a>
        </div>
      </div>
      <div class=" col-md-6 col-xl-3 col-sm-6 ">
        <div class="border border-info">
          <h5 class="card-header">Client Master</h5>
          <a href="All_Masters/client_master">
            <div class="card-body text-info">
              <i class="bi bi-people "></i>
              <h5 class="card-title"><?= $details->client_data ?></h5>
            </div>
          </a>
        </div>
      </div>
      <div class="   col-md-6 col-xl-3 col-sm-6 ">
        <div class=" border border-success">
          <h5 class="card-header">Item Master</h5>
          <a href="All_Masters/item_master">
            <div class="card-body text-success">
              <i class="bi bi-basket2 "></i>
              <h5 class="card-title"><?= $details->item_data ?></h5>
            </div>
          </a>
        </div>
      </div>
      <div class="   col-md-6 col-xl-3 col-sm-6 ">
        <div class="border border-danger">
          <h5 class="card-header">Invoice Master</h5>
          <a href="All_Masters/invoice_master">
            <div class="card-body text-danger">
              <i class="bi bi-journal-text "></i>
              <h5 class="card-title">₹<?= $details->invoice_data[0]->total ?></h5>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <?php view_load('footer') ?>
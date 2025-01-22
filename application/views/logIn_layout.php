<?php 


if($this->session->has_userdata('name'))
{
   
    redirect(base_url()."All_Masters/dashboard");
}

?>

<?php $this->load->view('header') ?>
 
<div class="image-div">


<div class="container outer-div" id="first">

    <div class="col-4 logIn-div ">
        
    <div class="logo-img mb-3">
        <img src="assets/images/sansoftwares_logo.png" alt="">
    </div>
     <div class="mb-3" id="welcome_msg">
            <h6>Welcome Back!</h6>
        </div>
         
        <div class="mb-3">
            <input type="email" class="form-control" id="log-email" name="email" placeholder="enter email here">
        </div>
        <div class="mb-3">

            <input type="password" class="form-control" id="log-password" name="password" placeholder=" enter password here">
        </div>
        <div class="d-grid gap-2 col-6 w-100 ">

            <button class="btn btn-primary" type="button" id="log-submit">Log In</button>
        </div>
        <div class="log-error-div">

            <div class="alert alert-danger d-flex align-items-center mt-3"  role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Email or Password is wrong
                </div>
            </div>
        </div>

    </div>
    </div>

    </div>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/jquery/jquery-3.7.1.min.js"></script>
<script src="assets/js/log-in.js"></script>
    
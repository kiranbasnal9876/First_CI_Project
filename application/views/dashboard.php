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
       <div>usermaster</div>
       <div>client master</div>
       <div>itemaster</div>
       <div>invoice</div>
    </div>
</div>

<?php view_load('footer') ?>
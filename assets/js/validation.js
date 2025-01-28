// all valdation for inputs..................




$("  .submit-form   input, select").on("input change", function () {

    var value = $(this).val().trim();
    var error = $(this).next(".error-message");

   if(error.length==0){
    $(this).after("<span class='error-message'></span>"); 
   error = $(this).next(".error-message"); 
   }
    

    if ($(this).attr("type") === "email") {
      var Validemail = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,3}$/;
  
      if (Validemail.test(value)) {
        error.text("");
      } else if (value ==="") {
        error.text("");
      }
       else {
        error.text("invalid email");
      }
    } 
    
    else if($(this).attr("type")==='password'){
      var validPassword =
      /^(?=.*[A-Z])(?=.*[^%!@#$&*])(?=.*[0-9])(?=.*[a-z]).{8,20}$/;
  
    if (validPassword.test(value)) {
      error.text("");
    } else if (value == "") {
      error.text("");
    } else {
      error.text("atlest 1 digit 1 upper case 1 specialchar");
    }
  
    }
    
    else if($(this).attr("name")==='name'){
  
      var Validname = /^[a-zA-Z\s.]+$/;
   
    if (Validname.test(value)) {
      error.text("");
    } else if (value == "") {
      error.text("");
    } else {
      error.text("only charecter are allowed");
    }
    }
  
    else if($(this).attr("name")==='phone'){
  
      let validPhone = /^[0-9]{10,12}$/;
    
      if (validPhone.test(value)) {
        error.text("");
      }
       else if (value == "") {
        error.text("");

      } 
      else {
        error.text("atleast 10 digit");
      }
    }
    
    else {
      if (value !== "") {
        error.text("");
      }
    }
  });

  // for mueric only...............
  $(document).on("input", ".numeric", function () {
 
    this.value = this.value.replace(/\D/g,"");
  });

  
  $(document).on("input", ".price", function () {
    if (this.value !== undefined && this.value !== null) {
   
        this.value = this.value.replace(/[^0-9\.]/g, "")   
      .replace(/(\..*)\./g, "$1"); 
    }
  });

// validation when submit button clicked
  


var checkvalidate=true;

function validate() { 

  $(".submit-form input[type!='hidden'] , select  ").each(function () {
    
    if ($(this).val() == "") {
      $(this).next('.error-message').remove();
       $(this).after("<span class='error-message'></span>"); 
       $name=  $(this).prev("label").text();
  
    
       $(this).next("span").text($name.slice(0,-1)+" is required");
      
      checkvalidate=false;
    }
    else{
       checkvalidate=true;
    }
  });
}



// validate function when updating data


function updatevalidation(e) {
  let checkvalidate = true;  
  
  $("input:not([type='hidden']):not([type='password']):not([type='file'])").each(function () {
    if ($(this).val() == "") {
      $(this).next().text("This field is required");
      checkvalidate = false; 
      return false;  
    } else {
      $(this).next().text(""); 
    }
  });
  
  return checkvalidate; 
}

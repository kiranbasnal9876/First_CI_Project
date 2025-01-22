var baseurl = $(".base-url").val();

$(".submit").on("click",function(){
    
let formdata= new FormData(form);

// validate();
if(checkvalidate){
    $.ajax({
        url:baseurl+"Crud_operations/insert",
        type:"post",
        data:formdata,
        processData: false,
        contentType: false,
       
        success:function(data){
      
         Object.entries(data).forEach(function([key ,value]){
      
            });
           
        }
    })
} 
});
$("#add-more").on("click", function () {
    $(this)
      .parent()
      .siblings(".add-new")
      .find(".clone:first")
      .clone()
      .appendTo(".add-new")
      .find("input[type='text'],input[type='number'],input[type='hidden']")
      .val("");
  });


  $(document).on("click", ".delete-item", function () {
    if ($(".clone").length > 1) {
      if ($(this).parents(".clone") != "") {
        var div = $(this).parent("div").parent("div");
        div.remove();
        total_amount();
      }
    }
  });



  // geting current date...........................
  function invoice_date() {
    let d = new Date();
    $("#invoice_date2").val(
      `${d.getFullYear()}-${(d.getMonth() + 1).toString().padStart(2, '0')}-${d.getDate().toString().padStart(2, '0')}`
    );
}

invoice_date();




// calculate total amount..................
function total_amount() {
    let Total_amount = 0;
    $(".Amount").each(function () {
      let amount = parseFloat($(this).val()) || 0;
      Total_amount += amount;
    });
    $("#total-amount").val(Total_amount.toFixed(2));
  }

  


  // total_amount();
// calculate amount...................
function amount() {
    $(".Item ").on("input", function () {
      var item = $(this).val();
  
      var price = $(this).parents(".clone").find(".price").val();
  
      $(this)
        .parents(".clone")
        .find(".Amount")
        .val(item * price);
        total_amount();
    });
  }
  
  amount();
  
  
// invoice number
$("#profile-tab").on("click", function () {
    $.ajax({
      url: url + "invoice_backend.php",
      type: "post",
      data: {
        action: "get_invoiceNo",
      },
      success: function (data) {
        data = JSON.parse(data);
      
        $(".invoic").val("100" + (Number(data.id) + 1));
        invoice_date();
      },
    });
  });

  



  // icon changind of sort

$(document).on("click" , '.changeIcon' , function(){


    let icon = $(this).find("i");
  
      if ($(".changeIcon").find("i").hasClass('bi-chevron-up')) {
  
        $(".changeIcon").find("i").removeClass('bi-chevron-up');
        icon.addClass('bi-chevron-up')
  
      }
      else if ($(".changeIcon").find("i").hasClass('bi-chevron-down')) {
  
        $(".changeIcon").find("i").removeClass('bi-chevron-down');
        icon.addClass('bi-chevron-down')
  
      }
  
      if (icon.hasClass('')) {
        icon.addClass('bi-chevron-up');
      }
      else if (icon.hasClass('bi-chevron-up')) {
        icon.removeClass('bi-chevron-up').addClass('bi-chevron-down');
      }
      else {
        icon.removeClass('bi-chevron-down').addClass('bi-chevron-up');
      }
    
  
  })
  





  // geting items......................
$(document).on("keyup", ".inputitem", function () {
  var value = $(this).val().trim();
  if(value==""){
    $(this).parents(".clone").find(".price").val("");
      $(this).parents(".clone").find(".item_id").val("");
      $(this).parents(".clone").find(".Item").val("");
      $(this)
      .parents(".clone")
      .find(".Amount")
      .val("");
      total_amount();
     
  }

  let items = [];
  $(".item_id").each(function () {
    if (!$(this).val() == "") {
    items.push($(this).val());
    }
  });
  let set_of_items = new Set(items);
  let items_array = [...set_of_items];

  $(".inputitem").autocomplete({
    minLength: 1,

    source: function (request, response) {
      $.ajax({
        url: baseurl+ "crud_operations/itemAutoComplete",
        data: {
          value: value,
          items_id: items_array,
        },
        type: "post",
        success: function (data) {
          var parsedData = JSON.parse(data);
          var suggestions = parsedData.output.map((item) => ({
            label: item.name,
            value: item.itemName,
            itemPrice: item.itemPrice,
            id: item.id,
          }));

          response(suggestions);
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error:", error);
          response([]);
        },
      });
    },
    select: function (event, ui) {
      $(this).parents(".clone").find(".price").val(ui.item.itemPrice);
      $(this).parents(".clone").find(".item_id").val(ui.item.id);
      
        $(this).parents(".clone").find(".Item").val(1);
        var quantity = 1;
      // amount();
      var price = $(this).parents(".clone").find(".price").val();
      $(this).parents(".clone") .find(".Amount").val(quantity * price);
      // console.log($("..Amount").val());
       total_amount();
     
    },

 
  }
 );
  
   
});






// geting client detail.............
$(document).on("keyup", ".clients", function () {
  const value = $(this).val();
  if(value==""){
    $("#inputphone").val("");
    $("#inputemail").val("");
    $("#inputAddress").val("");
    $(".clientId").val("");
  }

  $(".clients").autocomplete({
    minLength: 1,
    source: function (request, response) {
      $.ajax({
        url: baseurl + "crud_operations/clientAutocomplete",
        data: {
          name: request.term,
          // action: "getclientdata",
        },
        type: "post",
        
        success: function (data) {
          var parsedData = JSON.parse(data);
          var suggestions = parsedData.output.map((item) => ({
            label: item.name,
            value: item.name,
            phone: item.phone,
            email: item.email,
            address: item.address,
            clientId: item.id,
          }));

          response(suggestions);
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error:", error);
          response([]);
        },
      });
    },
    select: function (event, ui) {
      $("#inputphone").val(ui.item.phone);
      $("#inputemail").val(ui.item.email);
      $("#inputAddress").val(ui.item.address);
      $(".clientId").val(ui.item.clientId);
    },
  });
});
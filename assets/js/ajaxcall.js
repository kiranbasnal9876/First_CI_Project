var baseurl = $(".base-url").val();

$(".submit").on("click", function () {
	let formdata = new FormData(form);

	validate();

	if (checkvalidate) {
		$.ajax({
			url: baseurl + "Crud_operations/insert",
			type: "post",
			data: formdata,
			processData: false,
			contentType: false,

			success: function (data) {
				//    debugger;

				let value = JSON.parse(data);
				console.log(value);
				if (value.errors > 0) {
					var inputs = $(".submit-form").find("input[type!='hidden'],select");
					for (let i = 0; i < inputs.length; i++) {
						const input = $(inputs[i]);
						const inputName = input.attr("name");
						if (value.errors[inputName]) {
							input.next(".error-message").remove();
							input.after("<span class='error-message'></span>");
							input.next().text(value.errors[inputName]);
						}
					}
				} else if (value.status == 200) {
					alert("successfully inserted");
					$(".submit-form").trigger("reset");
					paggination();
					var editBtn = document.querySelector("#nav-home-tab");
					var tab = new bootstrap.Tab(editBtn);
					tab.show();
				}
			},
		});
	}
});



// selecting district...........................

$("#inputState").on("change", function (e) {
	$("#input_district option[value!='']").remove();
	var id = $(this).val();

	$.ajax({
		url: baseurl + "All_masters/get_destrict",
		type: "post",
		data: {
			state_id: id,
		},
		dataType: "html",
		success: function (data) {
			$("#option").after(data);
		},
	});
});




function paggination(){
	let data = new FormData(search_form);
	$.ajax({
		url: baseurl + "paggination",
		type: "post",
		data:data,
		dataType: "json",
		processData:false,
		contentType:false,
		success: function (data) {
			
			$(".getlist").html(data.users_records.table);
			
			$("#pagination-container").html(data.users_records.pagination);
			// $(".getitems").html(records.item_records);
			// $(".getclients").html(records.client_records);
		},
	});
}

paggination();


// deleting element.................

$(document).on("click", ".delete", function () {
	if (confirm("are u sure")) {
		var id = $(this).attr("id");
		var table_name = $(this).data("table_name");
		

		$.ajax({
			url: baseurl + "Crud_operations/edit_delete_Fun",
			data: {
				id: id,
				table_name: table_name,
				action: "delete",
			},
			type: "post",
			dataType: "json",
			success: function (data) {
				if (data.data_for_edit == ""){
					paggination();
				} 
			},
		});
	}
});




$(document).on("click", ".edit", function () {
	var id = $(this).attr("id");
	var table_name = $(this).data("table_name");

	$.ajax({
		url: baseurl + "Crud_operations/edit_delete_Fun",
		data: {
			id: id,
			table_name: table_name,
			action: "update",
		},
		type: "post",
		dataType: "json",
		success: function (data) {
			
			// debugger;
			if (data.data_for_edit != "") {
				var inputs = $("").find("input,select");
			
var edit_data=data.data_for_edit[0];

Object.keys(edit_data).forEach(function(key) {
	$(`.submit-form input[name=${key}]`).val(edit_data[key]); 
	$(`.submit-form select[name=${key}]`).val(edit_data[key]); 

	$("#inputState").trigger("change");
	setTimeout(() => {
		$(`select[name=${key}]`).val(edit_data[key]); 
	}, 100);
  
  });


 
  $("#inputState").on("change", function (e) {
	$("#input_district").val("");
  });



				
				var editBtn = document.querySelector("#nav-profile-tab");
				var tab = new bootstrap.Tab(editBtn);
				tab.show();
			}
		},
	});
});



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












let image = $("#pic");
if (image.attr("src") == "") {
	$("#show-img").hide();
} else {
	$("#show-img").show();
}

function imgDicShow() {
	$("#show-img").show();
}


// Pagination logic 

// next btn 

// next button pagination
$(document).on("click", "#pagination_right", function () {
	let page = $("#current_page").val();
	let totalPage = $(".pagination-li").data("pages");
	page = Number(page) + 1;
	if (page <= totalPage) {
		$("#current_page").val(page);
		paggination();
	}
});


// previous button pagination
$(document).on("click", "#pagination_left", function () {
	let page = $("#current_page").val();
	page = Number(page) - 1;
	if (page > 0) {
		$("#current_page").val(page);
		paggination();
	}
});

// limit
$("#selected_row").on('input',function(){

	let value = $(this).val();

	$("#limit").val(value);

	paggination();

} )

// sorting 
let sorting = "DESC";
$(".changeIcon").on('click' , function(){

if(sorting == "DESC"){
	sorting = "ASC";
}else{
	sorting = "DESC";
}

let sort_column = $(this).attr('id');

$("#sort_order").val(sorting);

$("#sort_column").val(sort_column);

paggination();

})
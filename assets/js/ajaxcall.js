var baseurl = $(".base-url").val();

$(".update").hide();

$(".submit").on("click", function () {
	let formdata = new FormData(form);
    formdata.append("action","insert");
	validate();

	if (checkvalidate) {
		$.ajax({
			url: baseurl + "Crud_operations/insert",
			type: "post",
			data: formdata,
			processData: false,
			contentType: false,

			success: function (data){
				//    debugger;

				let value = JSON.parse(data);
				console.log(value);
				if (value.errors) {
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
					Swal.fire({
						title: "Success",
						icon: "data inserted successfully",
						draggable: true
					  });
					$(".submit-form").trigger("reset");
					$(" .submit-form input,select").next("span").text("");
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
		data: data,
		dataType: "json",
		processData: false,
		contentType: false,
		success: function (data) {
			$(".getlist").html(data.table);

			$("#pagination-container").html(data.pagination);
			
		},
	});
}

paggination();

// deleting element.................

$(document).on("click", ".delete", function () {
	var id = $(this).attr("id");
	var table_name = $(this).data("table_name");
	Swal.fire({
		title: "Are you sure?",
		text: "You won't be able to revert this!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, delete it!",
	}).then((result) => {
		if (result.isConfirmed) {
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
					if (data.data_for_edit == "deleted") {
						Swal.fire({
							title: "Deleted!",
							text: "Your file has been deleted.",
							icon: "success",
						});
						paggination();
					} else if (data.data_for_edit == "") {
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "You can't delete logged user!",
						});
					}
				},
			});
		}
	});
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
				

				var edit_data = data.data_for_edit[0];

				Object.keys(edit_data).forEach(function (key) {
					$(`.submit-form input[name=${key}]`).not('[type="file"]').val(edit_data[key]);

					$(`.submit-form select[name=${key}]`).val(edit_data[key]);
					$(`.submit-form textarea[name=${key}]`).val(edit_data[key]);

					$("#inputState").trigger("change");
					setTimeout(() => {
						$(`select[name=${key}]`).val(edit_data[key]);
					}, 100);

					   
				});
				
				$("#pic").attr(
					"src",
					 "folder/"+edit_data.itemPath
				  );
				  
					$("#show-img").show();
               
				$("#inputState").on("change", function (e) {
					$("#input_district").val("");
				});
				$(".update").show();
				$(".submit").hide();
				var editBtn = document.querySelector("#nav-profile-tab");
				var tab = new bootstrap.Tab(editBtn);
				tab.show();
			}
		},
	});
});

// $(document).on("click", ".changeIcon", function () {
// 	// debugger;
//     let icon = $(this).find("i"); // Find the <i> element inside the clicked element


//     if ($(".changeIcon").find("i").hasClass('bi-arrow-up')) {

// 		$(".changeIcon").icon.removeClass('bi-arrow-up');
// 		icon.addClass('bi-arrow-up')
  
// 	  }
// 	  else if ($(".changeIcon").find("i").hasClass('bi-arrow-down')) {
  
// 		$(".changeIcon").icon.removeClass('bi-arrow-down');
// 		icon.addClass('bi-arrow-down')
  
// 	  }
  
// 	  if (icon.hasClass('')) {
// 		icon.addClass('bi-arrow-up');
// 	  }
// 	  else if (icon.hasClass('bi-arrow-up')) {
// 		icon.removeClass('bi-arrow-up').addClass('bi-arrow-down');
// 	  }
// 	  else {
// 		icon.removeClass('bi-arrow-down').addClass('bi-arrow-up');
// 	  }
	
  
// });

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
$("#selected_row").on("input", function () {
	let value = $(this).val();

	$("#limit").val(value);
	$("#current_page").val(1);
	paggination();
});

// sorting
let sorting = "DESC";
$(".changeIcon").on("click", function () {
	$colname=$(this).attr("id");
	$("#sort_column").val($colname);
	if (sorting == "DESC") {
		sorting = "ASC";
	} else {
		sorting = "DESC";
	}

	let sort_column = $(this).attr("id");

	$("#sort_order").val(sorting);

	$("#sort_column").val(sort_column);

	paggination();
});



$("#search").on("input",function(){
paggination();
});

$("#reset").on("click",function(){
	setTimeout(function(){
		paggination();
	},100);
	
})


//updating values...........................
$(".update").on("click", function () {
	let formdata = new FormData(form);
	formdata.append("action","update");

	updatevalidation();

	if (check_update) {
		$.ajax({
			url: baseurl + "Crud_operations/update",
			type: "post",

			data:formdata,
				
			processData: false,
			contentType: false,
            dataType:"json",
			success: function (data){
				 if (data.status == 200) {
					Swal.fire({
						title: "Success",
						icon: "data updated successfully",
						draggable: true
					  });
					$(".submit-form").trigger("reset");
					$("#show-img").hide();
					paggination();
					var editBtn = document.querySelector("#nav-home-tab");
					var tab = new bootstrap.Tab(editBtn);
					tab.show();
				}
			}

		})

	}
});







$("#nav-home-tab").on("click",function(){
	$(".submit-form").trigger("reset");
	$(" .submit-form input,select").next("span").text("");
	$(".update").hide();
    $(".submit").show();
  })
  
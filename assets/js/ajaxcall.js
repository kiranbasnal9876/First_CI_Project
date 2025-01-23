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
				if (value.errors.length > 0) {
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
					alert("hi");
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
  // debugger;
$.ajax({
  url: baseurl +"paggination",
  type: "post",
  dataType: "json",
  success: function(data){
    // let records=JSON.parse(data);
    
    $(".getlist").html(data.users_records);
  },
});

}

paggination();

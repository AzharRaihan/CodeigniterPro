$(document).ready(function () {
	let base_url = $('#base_url').val();

	// Fatch All Data
	function fatchAllData()
	{
		$.ajax({
			type: "GET",
			url: base_url+'Employee/fatchAllData',
			dataType: 'json',
			success: function (response) {
				if(response.status == 200){
					$('#employee-table-body').html("");
					$.each(response.all_data, function (key, item) { 
						$('#employee-table-body').append(`
							<tr>
								<th scope="row">${item.id}</th>
								<td>${item.employee_id}</td>
								<td>${item.name}</td>
								<td>${item.email}</td>
								<td>${item.gender}</td>
								<td>
								<button type="button" value="${item.id}" id="editBtn" class="action-btn btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
								<a href="${base_url+'Employee/employeePdf/'+item.id}" class="action-btn btn bg-lightgreen btn-sm"><i class="fa-solid fa-file-pdf"></i></a>
								<button type="button" value="${item.id}" id="delBtn" class="action-btn btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
								</td>
							</tr>
						`);
					});
				}
			}
		});
	}
	fatchAllData();


	// Employee Id Generate
	$('#gender').change(function (e) { 
		e.preventDefault();
		let gen = $(this).val();
		$.ajax({
			type: "GET",
			url: base_url+'Employee/employeeIdGenerate/'+gen,
			data: gen,
			caches: false,
			success: function (response) {
				if (response.status == 200) {
					$('#employee_id').val(response.data);
				}
			}
		});
	});

	// Store Employee
	$('#employeeSubmit').on('click', function (e) { 
		e.preventDefault();
		let formData = $('#employeeForm');
		let data = formData.serialize();
		$.ajax({
			type: "POST",
			url: base_url+'Employee/employeeAddEdit',
			caches: false,
			data: data,
			success: function (response) {
				if(response.status == 'success'){
					$(formData).trigger('reset');
					$('#addModal').modal('hide');
					$('#message').css('display', 'block');
					$('.error-message').html('');
					$('#message').html(`<div class="alert alert-success m-0"><strong>${response.message}</strong></div>`).delay(3000).slideUp(600);
					fatchAllData();
				}else{
					$('#addModal').modal('show');
					$('.error-message').css('display', 'block');
					$('.error-message').html(`<div class="alert alert-danger m-0"><strong>${response.message}</strong></div>`).delay(3000).slideUp(600);
				}
			},
			error: function(jqXHR, status, err){
				console.log(jqXHR);
				console.log(status);
				console.log(err);
			}
		});
	});

	// Edit Data
	$(document).on('click', '#editBtn', function (e) {
		e.preventDefault();
		let id = $(this).val();
		$('#editModal').modal('show');
		$.ajax({
			type: "GET",
			url: base_url+'Employee/employeeEdit/'+id,
			caches: false,
			success: function (response) {
				if (response.status == 'success') {
					$('#upId').val(response.data.id);
					$('#eName').val(response.data.name);
					$('#eEmail').val(response.data.name);
				} else {
					$('#message').css('display', 'block');
					$('#message').html(`<div class="alert alert-danger m-0"><strong>Data Not Found</strong></div>`).delay(3000).slideUp(600);
				}
			}
		});
	});

	// Update Data
	$(document).on('click', '#employeeUpdate', function (e) { 
		e.preventDefault();
		let id = $('#upId').val();
		let formData = $('#upEmployeeForm');
		let data = formData.serialize();
		$.ajax({
			type: "POST",
			url: base_url+'Employee/employeeAddEdit/'+id,
			data: data,
			success: function (response) {
				if (response.status == 'success') {
					$(formData).trigger('reset');
					$('#editModal').modal('hide');
					$('#message').css('display', 'block');
					$('.up-error-message').html('');
					$('#message').html(`<div class="alert alert-success m-0"><strong>${response.message}</strong></div>`).delay(3000).slideUp(600);
					fatchAllData();
				}else{
					$('#editModal').modal('show');
					$('.up-error-message').css('display', 'block');
					$('.up-error-message').html(`<div class="alert alert-danger m-0"><strong>${response.message}</strong></div>`).delay(3000).slideUp(600);
				}
			}
		});
	});

	// Delete Data
	$(document).on('click', '#delBtn', function () { 
		let delId = $(this).val();
		let confirmCheck = confirm('Are You Sure? You want to delete this Data');
		$('#message').css('display', 'block');
		if(confirmCheck == true){
			$.ajax({
				type: "DELETE",
				url: base_url+'Employee/deleteEmployee/'+delId,
				success: function (response) {
					if(response.status == 'success'){
						$('.error-message').html('');
						$('#message').html(`<div class="alert alert-success m-0"><strong>${response.message}</strong></div>`).delay(3000).slideUp(600);
						fatchAllData();
					}else{
						$('.error-message').html('');
						$('#message').html(`<div class="alert alert-danger m-0"><strong>${response.message}</strong></div>`).delay(3000).slideUp(600);
					}
				}
			});
		}
	});
});

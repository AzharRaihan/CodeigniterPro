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
								<td>${item.name}</td>
								<td>${item.email}</td>
								<td>
								<button type="button" value="${item.id}" class="action-btn btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
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
					$('#addEditModal').modal('hide');
					$('#message').css('display', 'block');
					$('.error-message').html('');
					$('#message').html(`<div class="alert alert-success m-0"><strong>${response.message}</strong></div>`).delay(3000).slideUp(600);
					fatchAllData();
				}else{
					$('#addEditModal').modal('show');
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

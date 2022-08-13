<section class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div id="message" class="mb-2"></div>
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center bg-skyblue">
						<h5 class="mb-0"><i class="fa-solid fa-list-ul"></i> Employee Lists</h5>
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
						<i class="fa-solid fa-user-plus"></i> Add New Employee
						</button>
					</div>
					<div class="card-body">
						<table class="table" id="employee-table">
							<thead>
								<tr>
									<th scope="col">SL</th>
									<th scope="col">Employee Id</th>
									<th scope="col">Name</th>
									<th scope="col">Email</th>
									<th scope="col">Gender</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody id="employee-table-body">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<!-- Add Modal -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-lightgreen">
        <h5 class="modal-title" id="addModalLabel"><i class="fa-solid fa-user-plus"></i> Add Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
			<div class="mx-2 mt-1 error-message"></div>
			<form id="employeeForm" method="POST">
        <div class="modal-body">
					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control" id="name" name="name">
						<span><?php echo form_error('name') ?></span>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email address</label>
						<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
						<span><?php echo form_error('email') ?></span>
						<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
					</div>
					<div class="row">
						<div class="col-md-6">
						<select class="form-select" aria-label="Default select example" name="gender" id="gender">
							<option selected disabled>Select Gender</option>
							<option value="M">Male</option>
							<option value="F">Female</option>
							<option value="O">Other</option>
						</select>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" name="employee_id" id="employee_id">
						</div>
					</div>
      	</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-sm" id="employeeSubmit"><i class="fa-solid fa-floppy-disk"></i> Save</button>
					<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
				</div>
			</form>
    </div>
  </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-lightgreen">
        <h5 class="modal-title" id="editModalLabel"><i class="fa-solid fa-user-pen"></i> Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
			<div class="mx-2 mt-1 up-error-message"></div>
			<form id="upEmployeeForm" method="POST">
				<input type="hidden" id="upId">
        <div class="modal-body">
					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control" id="eName" name="name">
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email address</label>
						<input type="email" class="form-control" id="eEmail" aria-describedby="emailHelp" name="email">
						<span><?php echo form_error('email') ?></span>
						<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
					</div>
      	</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-sm" id="employeeUpdate"><i class="fa-solid fa-floppy-disk"></i> Save</button>
					<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
				</div>
			</form>
    </div>
  </div>
</div>

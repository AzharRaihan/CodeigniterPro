<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
	<title>Home Page</title>
	<style>
		.h-b{
			height: 100vh;
		}
		.el-item{
			box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
		}
	</style>
</head>
<body>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="el-item">
						<a href="<?php echo base_url(); ?>Employee/employeeList">Employee</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

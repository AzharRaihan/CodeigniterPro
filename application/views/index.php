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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
	<link href="<?php echo base_url() . 'assets/css/style.css'; ?>" rel="stylesheet" >
	<title><?= $title ?></title>
</head>
<body>
	<input type="hidden" value="<?php echo base_url() ?>" id="base_url">
	<section>
		<?php echo $html_content ?>
	</section>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url() . 'assets/js/employee.js'; ?>"></script>
</body>
</html>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>

	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> 
		
    <!-- STYLE CSS -->
	<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">

</head>
<body>

<div id="container">
	<h1><?=$title?></h1>
	<div id="body">
		<div id="result"></div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Profesi</th>
						<th>Email</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table> 		

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

</div>

</div>

<script>
$(document).ready(function () {
	$.ajax({
		type: 'GET',
		url: '<?=base_url()?>listuser/getAll',
		data : {},
		dataType: 'json',
		success: function (data) {
			for (var i=0;i<data.length;++i)
			{
				console.log(data[i].nama);
				$('tbody').append('<tr><td>'
					+data[i].nama+'</td><td>'
					+data[i].profesi+'</td><td>'
					+data[i].email+'</td><td>'
					+' <a href="'+ '<?=base_url()?>listuser/edit/'+ data[i].iduser +'" class="btn btn-warning btn-sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Edit</a> '
					+' <a href="'+ '<?=base_url()?>listuser/delete/'+ data[i].iduser +'" class="btn btn-danger btn-sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Delete</a> '
					
					+'</td></tr>');
			}
		}
	});


});
</script>
</body>
</html>
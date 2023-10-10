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
	<h1>Login</h1>
	<div id="body">	
		<div id="result"></div>
		<?= form_open('login/index'); ?>
			<div class="mb-3" style="width: 30%;">
				<label for="password" class="form-label">Email address</label>
				<input type="email" class="form-control form-control-sm" id="email" aria-describedby="email">
			</div>
			<div class="mb-3" style="width: 30%;>
				<label for="password" class="form-label">Password</label>
				<input type="password" class="form-control form-control-sm" id="password">
			</div>
			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Check me out</label>
			</div>
			<button type="submit" class="btn btn-primary cmdLogin">Submit</button>
			
		<?= form_close(); ?>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>


    
</div>
	<script type="text/javascript">
							
		function sleep(milliseconds) {
			var start = new Date().getTime();
			for (var i = 0; i < 1e7; i++) {
				if ((new Date().getTime() - start) > milliseconds){
				break;
				}
			}
		}

        $(function() {
        	$('.cmdLogin').click(function() {
            	var form_data = {
                	email   : $('#email').val(),
                    password : $('#password').val(),
                };

                $.ajax({
					url: "<?=base_url()?>api/login",
                    type: 'POST',
                    data: form_data,
					dataType: 'json',
                                    
                    success: function(msg) {
                        if(msg=='1'){ 
                            //location.href = '<?=base_url()?>listuser';
							console.log(msg);
                    	}else{
                          	//$(".loading").hide();
                          	//$(".request_akun").hide();
                    		//$('#login_message').show().html(msg);  
                        }
                                        
                    }
                });

                return false;
            });

			$('#cmdReset').click(function() {
                $(".loading").hide();
                $('#login_message').hide();
                $('#inputUsername').val('');
                $('#inputPassword').val('')
            });
                            

        });
	</script>

</body>
</html>
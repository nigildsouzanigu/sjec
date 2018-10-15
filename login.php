<!DOCTYPE html>
<html lang="en">

	<head>
		<title>SJEC</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		
	</head>

	<body>
		<div class="container">
			<h2 class="text-center">Hall Booking App</h2>
			<form id="loginform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="needs-validation" novalidate>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="uname">UserName:</label>
							<input type="text" class="form-control" id="uname" name="uname" placeholder="Enter username" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="password">Password:</label>
							<!--<i class="far fa-eye"></i>-->
							<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
						</div>
					</div>
				</div>
				
				<div class="form-group form-check">
					<label class="form-check-label">
					<input class="form-check-input" type="checkbox" name="remember"> Remember password  </label>
				</div>
				
				<button type="submit" class="btn btn-primary">Login</button>
				<button type="reset" class="btn btn-danger">Reset</button>
				
				<div class="forgot">
					<a href="#">Forgot password?</a>
				</div>
				<div class="newuser">
					<a href="signup.php">New User?Register</a>
				</div>
			</form>
			
			<div class="modal" id="nomatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				 <div class="modal-dialog">
					<div class="modal-content text-light" style="background:rgba(1,1,1,0.6)">
						<div class="modal-header justify-content-center">
						
							<h4 class="title title-up"></h4>
						</div>
						<div class="modal-body">
							<p>Email-id or password is incorrect</p>
						</div>
						<div class="modal-footer">
						
							<button type="button" class="btn btn-danger hvr-buzz-out" id="close1" onclick="close()">Close</button>
						</div>
					</div>
				 </div>
			</div>
			
		<!--<div class="modal" id="match" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				 <div class="modal-dialog">
					<div class="modal-content text-light" style="background:rgba(1,1,1,0.6)">
						<div class="modal-header justify-content-center">
						
							<h4 class="title title-up"></h4>
						</div>
						<div class="modal-body">
							<p>Login Successful</p>
						</div>
						<div class="modal-footer">
						
							<button type="button" class="btn btn-danger hvr-buzz-out" id="close2" onclick="close()">Close</button>
						</div>
					</div>
				 </div>
			</div>-->
			
			
			<script>
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
			  'use strict';
			  window.addEventListener('load', function() {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');
				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function(form) {
				  form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) 
					{
					  event.preventDefault();
					  event.stopPropagation();
					}
					else
					{
						//window.alert("hello1");
						var uname=$("#uname").val();
						var password=$("#password").val();
						
						window.alert("hello2");
						
						$.ajax({
								url:"php/logincode.php",
								method:"POST",
								data:{uname:uname,password:password},
								dataType:"JSON",
								success:function(data)
								{
									if(data["done"]=="false")
								   {
										$("#nomatch").css("display","block");  
								   }
								   else
								   {
									   $("#match").css("display","block"); 
										window.location.href = "index.php";
									}
								}
							});
					}
					
					form.classList.add('was-validated');
				  }, false);
				});
			  }, false);
			})();
			$( "form" ).submit(function( event ) 
			{
				event.stopPropagation();
				event.preventDefault();
			});
			</script>
			
		</div>
		<!--   Core JS Files   -->
		  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
		  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
		  <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
		
		<script>
			$(function() 
			{
				$('#close1').click(function() 
				{
					$("#nomatch").css("display","none");
					  
				});
				
				$('#close2').click(function() 
				{
					$("#nomatch").css("display","none");
					  
				});
				
			});
		</script>
		
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SJEC</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	</head>

	<body>

		<div class="container">
			<h2 class="text-center">Hall Booking App</h2>
			<form id="registrationform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="needs-validation" novalidate>
				<div class="row">
					<div class="col-md-6">
				
						<div class="form-group">
							<label for="uname">Name:</label>
							<input type="text" class="form-control" id="uname" name="uname" placeholder="Enter user name" required>
						</div>
					</div>
					<div class="col-md-6">
				
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="repassword">Re-enter Password:</label>
							<input type="password" class="form-control" id="repassword" name="repassword" placeholder="Enter password" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="phone">Phone No.:</label>
							<input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="designation">Designation:</label>
							<input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="dropdown form-group">
							<label for="department">Enter department :</label>

							<select class="custom-select" id="department">
								<option></option>
								<option value="MCA">MCA</option>
								<option value="MBA">MBA</option>
								<option value="CS">CS</option>
								<option value="Mech">Mech</option>
							</select>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Register</button>
				<button type="reset" class="btn btn-danger">Reset</button>
			</form>
			
			<div id="completed" style="display: none;font-family: 'Roboto', sans-serif;" align="center">
				<img src="successful.png" style="padding-top:50px" class="img-fluid mx-auto d-block" width="140" height="140" alt="Registration Successfull">
				<h4 style="padding-top:10px;">Registration Completed Successfully.</h4>
				We have sent a verification email to your registered email-id.<br> 
				Please open the mail and click on the link to verifying your email-id<br> <br>
				<a href="#" ><button type="submit" class="btn btn-primary btn-lg"> OK </button></a>
			</div>
			
			<div class="modal" id="duplicateemail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				 <div class="modal-dialog">
					<div class="modal-content text-light" style="background:rgba(1,1,1,0.6)">
						<div class="modal-header justify-content-center">
						
							<h4 class="title title-up"></h4>
						</div>
						<div class="modal-body">
							<p>The email-id is already registered.</p>
						</div>
						<div class="modal-footer">
						
							<button type="button" class="btn btn-danger hvr-buzz-out" id="close1" onclick="close()">Close</button>
						</div>
					</div>
				 </div>
			</div>
				
				
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
						var email=$("#email").val();
						var password=$("#password").val();
						var repassword=$("#repassword").val();
						var phone=$("#phone").val();
						var designation=$("#designation").val();
						var department=$("#department").val();
						window.alert("hello2");
						
						
						$.ajax({
								url:"php/signupcode.php",
								method:"POST",
								data:{uname:uname,email:email,password:password,phone:phone,designation:designation,department:department},
								dataType:"JSON",
								success:function(data)
								{
									if(data["done"]=="false")
								   {
										$("#duplicateemail").css("display","block");  
								   }
								   else
								   {
										$("#registrationform").css("display","none");
										$("#completed").css("display","block");
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
							$("#duplicateemail").css("display","none");
							  
						});
					});
		
		
		</script>
		
	</body>
</html>
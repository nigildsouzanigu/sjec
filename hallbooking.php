<?php 

include "dbfile.php";
$query="SELECT `venuename` FROM `venue`";
$result=$link->query($query);



?>


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
			<h2 class="text-center">Booking Form</h2>
			<form id="bookingform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="needs-validation" novalidate>
				<div class="row">
					<div class="col-md-6">
						<div class="dropdown form-group">
							<label for="eventtype">Event Type :</label>

							<select class="custom-select" id="eventtype">
								<option value="College Level">College Level</option>
								<option value="Department Level" id="Department Level">Department Level</option>
								<option value="Association Level" id="Association Level">Association Level</option>
								
							</select>
						</div>
					</div>
					
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="ename">Event Name:</label>
							<input type="text" class="form-control" id="ename" name="ename" placeholder="Enter event name" required>
						</div>
					</div>
					
				</div>
				
				
				<div class="row">
					<div class="col-md-6" id="associationgroup" style="display: none">
						<div class="dropdown form-group">
							<label for="associationtype">Select Assocaition :</label>

							<select class="custom-select" id="associationtype">
								<option value="College Association">College Association</option>
								<option value="Department Association">Department Association</option>
								
							</select>
						</div>
					</div>
					
					<div class="col-md-6" id="associationnamegroup" style="display: none">
				
						<div class="form-group">
							<label for="associationname">Association Name:</label>
							<input type="text" class="form-control" id="associationname" name="associationname" placeholder="Enter association name" required>
						</div>
					</div>
					
					
				</div>
				
				<div class="row">
					<div class="col-md-6" id="depnamegroup" style="display: none">
						<div class="dropdown form-group">
							<label for="depname">Select department :</label>

							<select class="custom-select" id="depname">
								
								<option value="MCA">MCA</option>
								<option value="MBA">MBA</option>
								<option value="CS">CS</option>
								<option value="Mech">Mech</option>
							</select>
						</div>
					</div>
					
				</div>
				
				<div class="row">
					<div class="col-md-6">
				
						<div class="form-group">
							<label for="startdate">Start Date:</label>
							<input type="date" class="form-control" id="startdate" name="startdate" placeholder="Enter starting date" required>
						</div>
					</div>
					
					<div class="col-md-6">
				
						<div class="form-group">
							<label for="enddate">End Date:</label>
							<input type="date" class="form-control" id="enddate" name="enddate" placeholder="Enter ending date" required>
						</div>
					</div>
					
				</div>
				
				
				<div class="row">
					<div class="col-md-6">
				
						<div class="form-group">
							<label for="starttime">Start Time:</label>
							<input type="time" class="form-control" id="starttime" name="starttime" placeholder="Enter start time" required>
						</div>
					</div>
					
					<div class="col-md-6">
				
						<div class="form-group">
							<label for="endtime">End Time:</label>
							<input type="time" class="form-control" id="endtime" name="endtime" placeholder="Enter end time" required>
						</div>
					</div>
					
				</div>
				
				
				<div class="row">
					<div class="col-md-6">
						<div class="dropdown form-group">
							<label for="venue">Select Venue :</label>

							<select class="custom-select" id="venue">
								<?php 
									while($row=$result->fetch_assoc())
									{
										echo '<option value="'.$row["venuename"].'">'.$row["venuename"].'</option>';
									}
			
								?>
							</select>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Book</button>
				<button type="reset" class="btn btn-danger">Reset</button>
			</form>
			
			<div id="completed" style="display: none;font-family: 'Roboto', sans-serif;" align="center">
				<img src="successful.png" style="padding-top:50px" class="img-fluid mx-auto d-block" width="140" height="140" alt="Registration Successfull">
				<h4 style="padding-top:10px;">Booking Request Sent Successfully.</h4>
				We have sent an email to your registered email-id regarding your booking request.<br> 
				Booking confirmation will done shortly.<br> <br>
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
						var eventtype=$("#eventtype").val();
						var ename=$("#ename").val();
						var associationtype=$("#associationtype").val();
						var associationname=$("#associationname").val();
						var depname=$("#depname").val();
						var startdate=$("#startdate").val();
						var enddate=$("#enddate").val();
						
						var starttime=$("#starttime").val();
						var endtime=$("#endtime").val();
						var venue=$("#password").val();
											
						
						$.ajax({
								url:"php/hallbookingcode.php",
								method:"POST",
								data:{eventtype:eventtype,ename:ename,associationtype:associationtype,associationname:associationname,depname:depname,startdate:startdate,enddate:enddate,starttime:starttime,endtime:endtime,venue:venue},
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
			
				$(document).ready(function(){
					
					
					$("#eventtype").change(function(){
						if($("#eventtype").val()=="Department Level")
						{
							$("#associationgroup").hide();
							$("#associationnamegroup").hide();
							$("#depnamegroup").show();
						}
						
						else if($("#eventtype").val()=="Association Level")
						{
							/*if($("#associationtype").val()=="Department Association")
							{
								$("#depname").show();
								alert("1");
								$("#associationtype").show();
								$("#associationname").show();
								
							}
							else
							{*/
								
								$("#depnamegroup").hide();
								$("#associationgroup").show();
								$("#associationnamegroup").show();
							//}
							
						}
						
						else if($("#eventtype").val()=="College Level")
						{
							$("#depnamegroup").hide();
							//alert
							$("#associationgroup").hide();
							$("#associationnamegroup").hide();
						}
						
					});
					
			
					
					$("#associationtype").change(function(){
						
						if($("#associationtype").val()=="Department Association")
						{
							$("#depnamegroup").show();
							
							$("#associationgroup").show();
							$("#associationnamegroup").show();

						}
					});

					

				});
		
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
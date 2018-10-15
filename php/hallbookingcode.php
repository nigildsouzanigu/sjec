<?php
	include "dbfile.php";
	$uname=$_POST["uname"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$phone=$_POST["phone"];
	$designation=$_POST["designation"];
	$department=$_POST["department"];
	$status="false";
	
		
	$query = "INSERT INTO `user`(`uname`, `email`, `password`, `phone`, `designation`, `department`, `status`) VALUES ('$uname','$email','$password','$phone','$designation','$department','$status')";
 
	$result=$link->query($query);
	if($result) // will return true if succefull else it will return false
	{
		$data["done"]="true";
		echo json_encode($data);
		//mail code
	}
	else
	{
		$data["done"]="false";
		echo json_encode($data);
	}
	//echo json_encode($data);
		
?>
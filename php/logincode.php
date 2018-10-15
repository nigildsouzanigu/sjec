<?php
	include "dbfile.php";
	$uname=$_POST["uname"];
	$password=$_POST["password"];
	$count=0;
	
	$query="SELECT * FROM `user` WHERE uname='$uname' and password='$password'";
	$result=$link->query($query);
	while($row = $result->fetch_assoc())
	{
		$count=$count+1;
	}
	if($count==1) // will return true if succefull else it will return false
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
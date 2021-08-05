<?php 
	$db = mysqli_connect('localhost','root','','xerox_project') or die("Could not connect to tables");
	session_start();
	if(isset($_POST["submit"])){
	$regno=""; 
	$password="";
	$regno=mysqli_real_escape_string($db,$_POST["regno"]);
	$password=mysqli_real_escape_string($db,$_POST["password"]);
	if(empty($regno)) echo "<script>window.open('login.php','_self');alert('Enter the username');</script>";
	if(empty($password)) echo "<script>alert('Enter the password');</script>";
	$query="select * from login where userid='$regno' and password='$password'";
	$conrows=mysqli_query($db,$query);
	$row=mysqli_fetch_array($conrows);
	$rows=mysqli_num_rows($conrows);
	if($rows==1)
	{	
		$_SESSION['id']=$regno;
		if($row['attribute']=="Admin"){
		echo "<script>window.open('queue.php','_self')</script>";}
		else {echo "<script>window.open('home.html','_self')</script>";}
	}
	else
	{
		echo "<script>alert('Invalid user credentials')</script>";
	}
	}
?>
<?php 
	session_start();
	session_destroy();
	session_start();
	if(isset($_POST["Submit"])){
	$userid="";
	$password="";
	$db = mysqli_connect('localhost','root','','xerox_project') or die("Could not connect to tables");
	$userid=mysqli_real_escape_string($db,$_POST["regno"]);
	$password=mysqli_real_escape_string($db,$_POST["pass"]);
	if(empty($userid)) echo "<script>window.open('login.php','_self');alert('Enter the username');</script>";
	if(empty($password)) echo "<script>alert('Enter the password');</script>";
	$query="select * from login where regno='$userid' and password='$password'";
	$conrows=mysqli_query($db,$query);
	$rows=mysqli_num_rows($conrows);
	if($rows==1)
	{	
		$_SESSION['id']=$userid;
		$row=mysqli_fetch_array($conrows);
		if($row['attribute']=="Admin")
		{echo "<script>window.open('queue.php','_self')</script>";}
		else
		{echo "<script>window.open('homepg.php','_self')</script>";}
			
	}
	else
	{
		echo "<script>alert('Invalid user credentials')</script>";
	}
	}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <table  align="center" class="center">
        <tr>
        <td align="center" ><img style="float: left; margin: 0px 0px 0px 0px;" src="paw.png" height="45" width="45" ></td><td> &nbsp; </td>
        <td  style="font-size:32px; color:#fcee60;" align="center" rowspan="2">FOOT PRINT</td>
        <tr><td></td></tr>
        <!--<td align="center"><img src="https://vtop.vit.ac.in/vtop/assets/img/vitlogo.png" height="120px" width="370px"></td>-->
        </tr><br>
        </table><br>
        </div>
    <center>
        <br>
        <br>
        <br>
        <div class="al">
            <image src="https://cdn.dribbble.com/users/2760451/screenshots/5783614/printer.gif" style="float: left; margin: 0px 5px 150px 90px;" height="450px" width=635px></image>
        </div> 
    <div class="side">
        <h2 style="color:#273478">SIGN IN</h2>
          <form method="POST" onsubmit="return validateForm()" action="projectlogin.php">
              <label for="regno">Registration Number:</label><br>
              <input type="text" id="regno" name="regno" placeholder="Enter your registration number here" required>
              <br>
              <br>
              <label for="pass">Password:</label><br>
              <input type="password" id="pass" name="pass" placeholder="Enter your password here">
              <br>
              <br>
              <input type="submit" name="Submit" id="Submit" value="Submit">
              </form>   
          </div>
    </center>
    
    <div class="footer">
        <p>&#169; FOOT PRINT, Chennai <span style="font-size: 15px;"> - Kelambakkam, Vandalur Road, Rajan Nagar, Chennai, Tamil Nadu 600127, <b>Phone: 044 3993 1555</b></span> </p>       
    </div>
    <BR><BR><BR>
    <script>
        function validateForm() 
        { 
        var regno=document.forms["regForm"]["rego"].value;
        var passcode=document.forms["regForm"]["passcode"].value;
        
        if(regno==" " || regno.length>9)
        {
         alert('Please enter a valid Registration number');
         return false;
        }
        
        if(/^(?=.*\d)(?=.*[A-Z]).{6,20}$/.test(passcode)) 
        { 
        return true;
        }
        else
        { 
        alert('Please fill a passwrod that contains atleast 6 to 20 charaters which contain at least one numeric digit and one uppercase.')
        return false;
        }
        }
        </script>
        
</body>
</html>

<!--https://cdn.dribbble.com/users/2760451/screenshots/5783614/printer.gif-->
<!--pattern="[A-Z a-z]{3}[0-9]{4}"-->
<?php
if(isset($_POST['submit'])){
$to=$_POST['email'];
$from="anthradevarajan13@gmail.com";
$subject="Printing submission";
$file=$_POST['file']; 
$no=$_POST['no'];
$orient=$_POST['orientation'];
$side=$_POST['printside'];
$color=$_POST['color'];
$nop=$_POST['nop'];
$ps=$_POST['ps'];
$details=$_POST['det'];
$regno=$_POST['regno'];
$message2 = "Hello" . $to . "Here is a copy of your message " . "Registration number:" . $regno . "\n\n" . "File:" . $file . "\n\n" . "Orientation:" . $orient . "\n\n" . "Printing side:" . $ps . "\n\n" . "Color:" . $color . "\n\n" . "Number of pages per sheet:" . $ps . "\n\n" ."Special instructions:" . $details . "\n\n" . "Please collect your printout in 15mins. Thank you.";
$header = "From:anthradevarajan13@gmail.com \r\n";
$header .= "Cc:anthradevarajan1309@gmail.com \r\n";
$retval = mail ($to, $subject, $message2, $header);
if( $retval == true){
	echo "Message sent succesfully";
			}
else { echo "Message not sent";
	}
?>

<!DOCTYPE html>
<html>
<body>
<form action="form_project.php" method="POST">
Name:<input type="text" name=name></br>
Regno:<input type="text" name=regno></br>
Phno:<input type="number" name=phno></br>
Email:<input type="email" name=mail></br>
DoB:<input type="date" name=dob></br>
Do you wish to receive further communication from us?<input type="checkbox"></br>
Submit<input type=submit name=submit>
</form>
</body>
</html> 
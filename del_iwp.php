<?php
if(isset($_POST['clear']))
{
$db = mysqli_connect('localhost','root','','xerox_project') or die("Could not connect to tables");
$q = mysqli_real_escape_string($db,$_POST["clear"]);
$del="delete from queue where qid='$q'";
$con=mysqli_query($db,$del);
if(!$con)
{echo "<script> alert ('Cannot delete'); </script>";
}
?>


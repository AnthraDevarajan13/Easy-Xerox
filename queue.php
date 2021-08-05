<?php 
session_start();
$db = mysqli_connect('localhost','root','','xerox_project') or die("Could not connect to tables");
$uid=$_SESSION['id'];
if(isset($_POST['clear']))
{
	$q = mysqli_real_escape_string($db,$_POST["clear"]);
$del="delete from queue where qid='$q'";
$con=mysqli_query($db,$del);
if(!$con)
{echo "<script> alert ('Cannot delete'); </script>";
}
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queue</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
      
        table, th, td 
        {
        margin-left: auto;
        margin-right: auto;
        
        border-collapse: collapse;
        }
        th
        {
        color: #004d99;
        padding: 10px;
        }
        td
        {
            text-align:center;
            padding: 10px;     
        }
    </style>
</head>
<body>
<div class="header">
        <table  align="center" class="center">
        <tr>
        <td align="center" ><img style="float: left; margin: 0px 0px 0px 0px; " src="paw.png" height="45" width="45" ></td>
        <td  style="font-size:32px; color:#fcee60;" align="center" rowspan="2">FOOT PRINT</td>
        <tr><td></td></tr>
        <!--<td align="center"><img src="https://vtop.vit.ac.in/vtop/assets/img/vitlogo.png" height="120px" width="370px"></td>-->
        </tr><br>
        </table><br>
    </div>
        <div class="topnav">
            <a href="homepg.php">Home</a>
            <a href="About_Us.php">About Us</a>
            <a href="logout.php">Logout</a>&nbsp;&nbsp;
            <a id="rnav" href="">Order Now <img src="shopcart.png" height="25" width="25"></a></align> 
        </div>
        <div class="topnavr">
            
        </div>
	          <br><center>
		  <?php 
		  $display="select * from queue order by qid ";
		  $displayq=mysqli_query($db,$display);
		  $i=0;
		  while($displayrow=mysqli_fetch_array($displayq))
		  {echo '<form action="queue.php" method="post">';
            echo '<div class="cmnts">
            <table >
            <tr>
            <th>Registration Number</th>
            <th>File Name</th>
            <th>Number of Copies</th>
            <th>Number of Pages</th>
            <th>Colour</th>
            <th>Orientation</th>
            <th>Printing side</th>
            <th>Number of pages per sheet</th>
            <th>Page Size</th>
            <th>Details</th>
            <th>Cost</th>
            <th>Date &amp; Time</th></tr>
            <tr>
              <td>'.$displayrow['regno'].'</td>
              <td>'.$displayrow['file'].'</td>
              <td>'.$displayrow['no'].'</td>
              <td>'.$displayrow['pages'].'</td>
              <td>'.$displayrow['color'].'</td>
              <td>'.$displayrow['orientation'].'</td>
              <td>'.$displayrow['printside'].'</td>
              <td>'.$displayrow['nop'].'</td>
              <td>'.$displayrow['ps'].'</td>
              <td>'.$displayrow['det'].'</td>
              <td>'.$displayrow['cost'].'</td>
              <td>'.$displayrow['time'].'</td>
              <td><button name="clear" class="but" value='.$displayrow['qid'].'>Clear</button></td>
               </tr> </table><br><hr>';
            
          echo '</form>';
            }
		  
          ?>
          <br><br><br>
         <div class="footer">
            <p>&#169; FOOT PRINT, Chennai <span style="font-size: 15px;"> - Kelambakkam, Vandalur Road, Rajan Nagar, Chennai, Tamil Nadu 600127, <b>Phone: 044 3993 1555</b></span> </p>       
        </div>  
        
</body>
</html> 

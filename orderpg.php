<?php 
session_start();
$db = mysqli_connect('localhost','root','','xerox_project') or die("Could not connect to tables");
$uid=$_SESSION['id'];
if(isset($_POST['submit'])){
if($_FILES["file"]["tmp_name"]){$file = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));}
$targetDir = "C://Users/Anthra Devarajan/Desktop/Xerox/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
$no=$_POST['number'];
$orientation=$_POST['portrait'];
$printsides=$_POST['sides'];
$color=$_POST['Colour'];

$nop=$_POST['paperwork'];
$det=$_POST['spl'];
$ps=$_POST['nop'];



if($color=="Colour")
{
  if($ps=="a3")
  {
    $cost=2*3*$no;
  }	
  else if($ps=="a4")
  {
    $cost=2*$no;
  }
  else if($ps=="a5")
  {
    $cost=2*5*$no;
  }	
  else if($ps=="ex")
  {
    $cost=2*7*$no;
  }		
  
}

else
{
	if($ps=="a3")
  {
    $cost=1*3*$no;
  }	
  else if($ps=="a4")
  {
    $cost=1*$no;
  }
  else if($ps=="a5")
  {
    $cost=1*5*$no;
  }	
  else if($ps=="ex")
  {
    $cost=1*7*$no;
  }		
}
$insert="insert into queue(regno,file,no,orientation,printside,color,nop,ps,det,cost,time) values('$uid','$fileName','$no','$orientation','$printsides','$color','$nop','$ps','$det','$cost',now())";
$insertconn=mysqli_query($db,$insert) or die("cannot add the post");
echo '<div style="position:absolute;top:30%;left:25%;width:50%;z-index:11;background-color: #273478;
color: #fcee60; font-family: Comic Sans MS; font-size:15px;margin-left:15px;">';
echo '<h1 style="text-align:center"> Order Placed.<br> Your estimated cost is Rs. '.$cost.'.<br> Thank you</h1>';
echo '<form action="orderpg.php"><center><button class="but2">Back</button></center></form>';
echo '</div>';

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
        <table  align="center" class="center">
        <tr>
        <td align="center" ><img style="float: left; margin: 0px 0px 0px 0px;" src="paw.png" height="45" width="45" ></td><td>     &nbsp; </td>
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
            <a id="rnav" href="orderpg.php">Order Now <img src="shopcart.png" height="25" width="25"></a></align> 
        </div>
        <div class="topnavr">
            
        </div>
    <br><br><br>
    <center>
    <div class="column">
        <h2 style="color:#273478">Your Order</h2>
          <form method="POST" action="orderpg.php" enctype="multipart/form-data">
              <label for="regno">File to be printed:</label>
              <input type="file" id="file" name="file" required><br><br><br>

              <label for="number">Number of copies: &nbsp;&nbsp;</label>
              <input type="number" id="number" name="number" required></br><br>

              <p>Orientation:</p>
              <input type="radio" id="portrait" name="portrait" value="portrait">
              <label for="portrait">Portrait</label>&nbsp;
              <input type="radio" id="landscape" name="portrait" value="landscape">
              <label for="landscape">Landscape</label>&nbsp;
              <br><br><br><br>
              
            <label for="sides">Printing sides:</label>
            <select id="sides" name="sides">
            <option value="select">Select printing sides</option>
            <option value="one side">Print one sided</option>
            <option value="two side">Manually print both sided</option>
            </select><br><br><br>

            <p>Colour preference:</p>
              <input type="radio" id="Colour" name="Colour" value="Colour">
              <label for="Colour">Colour</label>&nbsp;
              <input type="radio" id="bnw" name="Colour" value="black n white">
              <label for="bnw">Black and white</label>&nbsp;
              <br><br>
              <p style="color:red;">Black and white costs Re.1 per side and Colour costs Rs.2 per side</p>
              <br><br>
              
              <label for="paperwork">No of pages per sheet:</label>
              <select id="paperwork" name="paperwork" placeholder="Select number of pages per sheet">
              <option value="select">Select no of pages per sheet</option>
              <option value="one">1 page per sheet</option>
              <option value="two">2 pages per sheet</option>
              <option value="four">4 pages per sheet</option>
              <option value="six">6 pages per sheet</option>
              <option value="eight">8 pages per sheet</option>
              <option value="ten">10 pages per sheet</option>
              </select><br><br><br><br>

            <label for="nop">Paper Size:</label>
            <select id="nop" name="nop">
            <option value="select">Select paper size</option>
            <option value="a4">A4 (21cm x 29.7cm)</option>
            <option value="a3">A3 (29.7cm x 42cm)</option>
            <option value="a5">A5 (14.8cm x 21cm)</option>
            <option value="ex">Executive(18.42cm x 26.67cm)</option>
              </select><br><br>
              <p style="color:red;">A4 costs Re.1 per side, A3 costs Rs.3 per side, A5 costs Rs.5 per side and executive costs Rs.7 per side</p>
              <br>
              <br>
              <label for="spl">Special instructions, if any :</label><br><br>
              <textarea id="spl" name="spl" rows="4" cols="50" ></textarea>
            <br><br><br>
              <input type="submit" name="submit" id="Submit" value="Place an order">
              </form>   
    </div>
</center>


<div class="footer">
    <p>&#169; FOOT PRINT, Chennai <span style="font-size: 15px;"> - Kelambakkam, Vandalur Road, Rajan Nagar, Chennai, Tamil Nadu 600127, <b>Phone: 044 3993 1555</b></span> </p>       
</div>
<BR><BR><BR>

</body>
</html>

<!--File uploaded
No of copies
Orientation: Radio buttons : Portrait or Landscape
Drop down for printing : (whether one sided, both sided)
Color preference:Radio Buttons
Drop down for sizes(A4 21cm x 29.7 cm ,A3,A5,B5(JIS),B4(JIS))
No of pages per sheet:(drop down:1,2,4,6,8,10,16)
Particular Instruction: textarea

Order Now submit button-->

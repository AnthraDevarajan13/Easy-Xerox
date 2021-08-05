<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>

    *
        {
        box-sizing: border-box}

        body 
        {font-family: Verdana, sans-serif; margin:0}
        .mySlides {display: none}
        img {vertical-align: middle;}

       
    </style>
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
        <div class="slideshow-container">

            <div class="mySlides fade">
              <div class="numbertext">1 / 6</div>
              <img src="image1.png" style="width:100%" >
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">2 / 6</div>
              <img src="image.2.png" style="width:100%">
            </div>
            
            <div class="mySlides fade">
              <div class="numbertext">3 / 6</div>
              <img src="image.5.png" height="425px" width="650px" >
            </div>
            <div class="mySlides fade">
                <div class="numbertext"> 4/ 6</div>
                <img src="image4.png" style="width:100%">
              </div>

              <div class="mySlides fade">
                <div class="numbertext"> 5/ 6</div>
                <img src="image3.png" style="width:100%">
              </div>

              <div class="mySlides fade">
                <div class="numbertext"> 6/ 6</div>
                <img src="finalpaw.PNG" height="455px" width="600px" >
              </div>
            
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
            </div>
            <br>
            
            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span> 
              <span class="dot" onclick="currentSlide(3)"></span>
              <span class="dot" onclick="currentSlide(4)"></span>
              <span class="dot" onclick="currentSlide(5)"></span>
              <span class="dot" onclick="currentSlide(6)"></span> 
            </div>
            
            <script>
            var slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
            </script>
         <div class="footer">
            <p>&#169; FOOT PRINT, Chennai <span style="font-size: 15px;"> - Kelambakkam, Vandalur Road, Rajan Nagar, Chennai, Tamil Nadu 600127, <b>Phone: 044 3993 1555</b></span> </p>       
        </div>  
        
</body>
</html> 

<?php

include('conn.php');
include('session.php');



?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Achievers Events</title>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background-color:azure;
  }

  header
  {
   padding: 20px 0;
   color:gold;
   text-align: center;
    background: linear-gradient(to right,gray, #013547,black); /* Initial gradient */
    animation: rotateColors 1s linear infinite; /* Animation */
  }

  @keyframes rotateColors {
    0% {
      background-position: 0% 50%; /* Start position */
    }
    100% {
      background-position: 100% 50%; /* End position */
    }
  }
   footer {
    background-color:#013547;
    color: #fff;
    text-align: center;
    padding: 20px 0;
  }

  .container {
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    
  }

  /* Slideshow Section */
  .slideshow-container {
    position: relative;
    max-width: 100%;
    overflow: hidden;
    margin: auto;
    
    
  
  }

  .slideshow-container img {
    width: 100%;
    height: 500px;
    border-radius:20px;
    object-fit:fill;
  
  }
  .slideshow-container img:hover{
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5));
  } 

  .slideshow-text {
    font-family: cursive;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
    font-size: 40px;
    z-index: 1;
  }
  


  /* Section 2 - Clickable Images */
  .image-grid {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding:10px;
    background-color:azure;
    margin:20px;
  }
 
  .image-grid .image {
    width: 30%;
    margin-bottom: 20px;
    text-align: center;
  }

  .image-grid .image img {
    width: 100%;
    height: auto;
    border-radius:100px;
  }

  .image-grid .image a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    display: block;
  }

  /* Footer */
  footer {
    background-color:#013547 ;
    color: #fff;
    text-align: center;
    padding: 20px 0;
  }

  .footer-columns {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    max-width: 1200px;
    margin: 0 auto;
  }

  .footer-column {
    width: 30%;
    margin-bottom: 20px;
  }

  .footer-column h3 {
    margin-bottom: 10px;
  }

  .footer-column ul {
    list-style: none;
    padding: 0;
  }

  .footer-column ul li {
    margin-bottom: 5px;
  }

  .footer-logo {
    width: 100px;
    margin: 0 auto;
    display: block;
    border-radius:20px;
  }

  .social-media-icons {
    display: flex;
    justify-content: center;
  }

  .social-media-icons img {
    width: 30px;
    height: 30px;
    margin: 0 5px;
    border-radius:10px;
  }

  @media screen and (max-width: 768px) {
    .footer-columns {
      flex-direction: column;
    }

    .footer-column {
      width: 100%;
      text-align: center;
    }
    .college{
font-size:10px;
    }
    .colleges{
font-size:15px;
    }
    .slideshow-container img {
    width: 100%;
    height: 300px;
  }
  .footer {
    background-color: #013547;
    position: relative;
    height: 150px; /* Adjust height as needed */
    overflow: hidden;
  }

  .bubble {
    position: absolute;
    bottom: -50px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: transparent;
    animation: bubbleAnimation 10s infinite linear;
    transform-origin: center bottom;
    box-shadow: 20px 2px 4px rgba(0, 0, 0, 0.3);
  }

  @keyframes bubbleAnimation {
    0% {
      transform: translateY(0) scale(1);
    }
    50% {
      transform: translateY(-100px) scale(1.2);
    }
    100% {
      transform: translateY(-200px) scale(1);
    }
  }

  .bubble:nth-child(2) {
    left: 20%;
    animation-delay: 2s;
  }

  .bubble:nth-child(3) {
    left: 50%;
    animation-delay: 4s;
  }

  .bubble:nth-child(4) {
    left: 80%;
    animation-delay: 2s;
  }
  .bubble:nth-child(5) {
    left: 60%;
    animation-delay: 4s;
  }
  .bubble:nth-child(6) {
    left: 50%;
    animation-delay: 2s;
  }
  }

 
</style>
</head>
<body>

<header>
  <h1>Welcome <?php echo $session_fullname;  ?></h1>
 
</header>

<div class="container">
  <!-- Section 1 - Slideshow -->
 
  <div class="slideshow-container">
    <img class="slides" src="images/dinner2.png" alt="Slide 2">
    <img class="slides" src="images/dinner4.png" alt="Slide 4">
    <img class="slides" src="images/dinner3.png" alt="Slide 3">
    <img class="slides" src="images/dinner5.png" alt="Slide 5">
    <img class="slides" src="images/dinner1.png" alt="Slide 1">

    <div class="slideshow-text"><span class="colleges">A Glaze Of Past Events</span></div>
  </div>
  <!-- Section 2 - Clickable Images --><section style="background-color:azure;">
  <div class="image-grid">
    <div class="image">
      <a href="conas/">
        <img src="images/dinner1.png" alt="Image 1">
        <a href="conas/"class="college">CONAS</a>
      </a>
    </div>
    <div class="image">
      <a href="coet">
        <img src="images/dinner3.png" alt="Image 2">
        <a href="coet/" class="college">COET</a>
      </a>
    </div>
    <div class="image">
      <a href="cobhs">
        <img src="images/dinner5.png" alt="Image 3">
        <a href="cobhs/" class="college">COBHS</a>
      </a>
    </div>
    <div class="image">
      <a href="conas">
        <img src="images/dinner2.png" alt="Image 4">
        <a href="comas/"class="college">COMAS</a>
      </a>
    </div>
    <div class="image">
      <a href="fohs">
        <img src="images/dinner4.png" alt="Image 5">
        <a href="fohs/" class="college">FOHS</a>
      </a>
    </div>
    <div class="image">
        <a href="colaw">
          <img src="images/dinner5.png" alt="Image 5">
          <a href="colaw/" class="college">COLAW</a>
        </a>
      </div>
  </div>
</section>
</div>

<footer>
    <div class="footer-columns">
      <div class="bubble"></div>
      <div class="bubble"></div>
      <div class="bubble"></div>
      <div class="bubble"></div>
      <div class="bubble"></div>
      <div class="bubble"></div>
      <div class="footer-column">
        <h3 style="font-size:12px;">Follow us on our social media handlezzz!</h3>
        <div class="social-media-icons">
          <a href="#"><img src="images/ms (1).png" alt="Facebook"></a>
          <a href="#"><img src="images/ms (2).png" alt="Twitter"></a>
          <a href="#"><img src="images/ms (3).png" alt="Instagram"></a>
         
        </div>
      </div>
      <div class="footer-column">
        <h3 style="font-size:12px;">Designed by ------</h3>
      </div>
      <div class="footer-column">
        <img src="images/p.png" alt="Logo" class="footer-logo">
      </div>
    </div>
  </footer>
<script>
    var slideIndex = 0;
    showSlides();
  
    function showSlides() {
      var slides = document.getElementsByClassName("slides");
      var text = document.querySelector(".slideshow-text");
      for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      slides[slideIndex-1].style.display = "block";  
      setTimeout(showSlides, 5000); // Change image every 2 seconds
    }
  </script>
</body>
</html>

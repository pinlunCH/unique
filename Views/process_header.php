<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/wide.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;1,400&family=Lora&display=swap" rel="stylesheet"><!-- Bootstrap CSS -->
<script src="https://kit.fontawesome.com/d46f5538a2.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
if(isset($_GET['userexists'])){
  ?>
<div class="alertBox jost">
  <p>The email address you have entered is already registered</p>
  <button type="button" id="closeError"class="close btn-secondary" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
}else{}
if(isset($_GET['login'])){
  ?>
  <div class="alertBox jost">
  <p>Please login or create an account</p>
  <button type="button" id="closeError"class="" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> 
<?php 
}else{}
if(isset($_GET['notexist'])){
?>
  <div class="alertBox jost">
  <p>The email or password are incorrect</p>
  <button type="button" id="closeError"class="" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> 
<?php 
}else{}
if(isset($_GET['needtoLogin'])){
  ?>
    <div class="alertBox jost">
    <p>Please login or sign up first before book the accommodation</p>
    <button type="button" id="closeError"class="" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> 
  <?php 
  }else{}
  ?>

<div class="cover all-cover" id="processHeader">
<img id="slideshow" src="imgs/denys-nevozhai-guNIjIuUcgY-unsplash (1).jpg" alt=""
data-primary="imgs/denys-nevozhai-guNIjIuUcgY-unsplash (1).jpg"
    data-secondary="imgs/5e15f01624fe1203e97a43c6.png"
    data-tertiary="imgs/Bvlgari-Resort-BaliDining-under-the-stars.jpg"
    data-quaternary="imgs/coverImg2.jpg"
    data-quinary="imgs/4.jpg"
    data-senary="imgs/coverimg.jpg"
  >
  <div class="container-fluid booking wrapper">
    <div class="handle">
          <a href="index.php?controller=action"><div class="header">
              <h1 id="siteLogo">UNIQUE</h1>
          </div></a>    
          <div class="flyout d-lg-none d-xl-none">
              <div class="fix">
                  <img class="mobver" id="open" src="imgs/iconfinder_menu_1540174.png" alt="icon">
              </div>
          </div>
      </div>
      <div class="navgroups lit" id="menu">
          <img class="mobver d-lg-none d-xl-none" id="close" src="imgs/iconfinder_basics-22_296812.png" alt="icon"/>
          <div class="nav jost">
              <a href="index.php?controller=action&action=about">Why UNIQUE</a>
              <?php
              if(!isset($_SESSION['userid']))
              {
                ?>
                <a href="index.php?controller=action&action=register#signup">Register</a>
                <a href="index.php?controller=action&action=register">Sign in</a>
              <?php
              } else{
              ?>
                <a href="index.php?controller=action&action=booking">My booking</a>
                <a href="#">My profile</a>
                <a href="index.php?controller=action&action=logout">Logout</a>
              <?php
              }
              ?>
          </div>
      </div>
  </div>
</div>

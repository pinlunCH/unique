<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/wide.css">
<title>Unique Around the world</title>
<link rel="shortcut icon" href="imgs/favicon.png" type="image/png">
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
<div class="cover" id="bg">
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
                <a href="index.php?controller=action&action=logout">Logout</a>
              <?php
              }
              ?>
          </div>
      </div>
  </div>
  <div class="container-xl booking searchBar all-search">
    <form class="bokForm" method="post" id="hero-search-form" action="index.php?controller=action&action=searchResult">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-7">
          <div class="single">
            <div class="icon bok"></div>
            <input type="hidden" value="" id="whatlocation" name="nDestination">
            <input placeholder="Where to ..." autocomplete="off"class="bokgrp jost" type="text" name="destination" id="place-input">
            <div class="rList" id="hintList"><ul></ul></div>
          </div>        
        </div>

        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-2">
          <div class="single">
              <select class="bokgrp jost" name="nOfPeople" id="">
                <option value="2">2 Adult</option>
                <option value="3">3 Adult</option>
                <option value="4">4 Adult</option>
                <option value="5">5 Adult</option>
                <option value="6">6 Adult</option>
                <option value="7">7 Adult</option>
                <option value="8">8 Adult</option>
                <option value="9">9 Adult</option>
                <option value="10">10 Adult</option>
            </select>  
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-2">
        <div class="single">
            <select class="bokgrp jost" name="type" id="type-select-dropdown">

            </select> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 jost">
          <label for="checkin">Check-in</label>
          <input type="date" name="checkin" id="checkin_header">
        </div>
        <div class="col-6 jost">
        <label for="checkin">Check-out</label>
        <input type="date" name="checkout" id="checkout_header">
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Submit" id="hero-search-btn" class="subbtn jost">
        </div>
      </div>
    </form>
  </div>
</div>



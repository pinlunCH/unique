<?php
include('process_header.php');
$confirm_active = (isset($_GET['confirm']))? 'active' : '';
$payment_active = (isset($_GET['payment']))? 'active' : '';
$success_active = (isset($_GET['success']))? 'active' : '';
?>
<div class="container-fluid">
  <div class="row lora process_header">
    <h2>Unique makes it special</h2>
  </div>
  <div class="row lora process_bar">
    <p class="<?=$confirm_active?>">1.Confirm > </p>
    <p class="<?=$payment_active?>"> 2.Payment > </p>
    <p class="<?=$success_active?>"> 3.Congratulation</p>
  </div>
<div class="img-table">
  <img class="imgsize" src="imgs/sven-vee-3X72gLHCqnQ-unsplash.png" id="header_submit"alt="booking">
 </div> 
 <div class="success_box_msg jost">
      <h4 class="jost">Thank you!</h4>
      <p class="jost">Your booking has benn confirmed
        you can check your email for the
        booking detail or go to <span>my booking<span></p>
        <a href="index.php?controller=action" class="event-link-unset">Home</a>
        <a href="index.php?controller=action&action=booking" class="event-link-unset primary_btn">My Booking</a>
  </div>
</div>



<?php
include('footer.php');
?>
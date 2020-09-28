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
  <?php
  foreach($data as $result){
  ?>
  <div class="row jost process_detail">
    <div class="detail_box">
      <div class="detail-content times">
        <input type="hidden" value="<?=$_SESSION['checkin']?> " id="checkin_field"><input type="hidden" id="checkout_field" value="<?=$_SESSION['checkout']?>">
        <p class='unset-margin'><?=$_SESSION['checkin']?> - <?=$_SESSION['checkout']?> </p>
        <p><span id="nights"></span> Night&nbsp;&nbsp;|&nbsp;&nbsp;<?=$_SESSION['noGuest']?> Guests</p>
        <p></p>
      </div>  
        <hr>
        <div class="detail-content"> 
          <div class="detail-content-group cal-price">
            $<input type="text" value="<?=$result['nPrice']?>" id="one_night_price" readonly> x <input type="text" id="num_of_night"value="" readonly> nights
            <input type="text" id="room_total"value="5000" readonly>
          </div> 
          <div class="detail-content-group wp">
            <p>service fee</p>
            <input type="text" value="100" id="service_fee"readonly>
          </div>
          <div class="detail-content-group wp">
            <p>taxes</p>
            <input type="text" value="100" id="taxes_fee"readonly>
          </div>
        <hr class="const-line">
          <div class="detail-content-group wp">
            <p>total</p>
            <input type="text" id="as_whole"value="" readonly>
          </div>
          <p class="currency">(CAD)</p>
          <div class="process_submit_btn">
            <a href="index.php?controller=action&action=payment&confirm=true&payment=true" class="event-link-unset process_btn">confirm</a>
          </div>
        </div>
    </div>
  </div>
  <?php  
  }
  ?>
</div>



<?php
include('footer.php');
?>
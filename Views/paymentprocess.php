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

  <div class="row jost process_detail">
    <div class="detail_box" id="payment_form">
        <div class="row payment-header">
            <h5><img src="imgs/211716-64.png" alt="best tourism company">Credit Card</h5>
        </div>
        <p class="erroMsg" id="credit_error_msg">*Please fill in all fields</p>
        <div class="tr-box">
            <div class="tr-item">
                <label for="cardNum">Credit card number</label>
                <input type="text" id="card_number" name="cardNum" required>
            </div>
        </div>
        <div class="tr-box s-field">
            <div class="tr-item gap-margin">
            <label for="expriy">Expiration</label>
                <input type="text" id="expiry_date_check" name="expriy" required>
            </div>
            <div class="tr-item">
            <label for="ccvcard">CCV</label>
                <input type="text" name="ccvcard" id="ccv" required>
            </div>
        </div>
        <div class="tr-box name-on-card">
            <div class="tr-item">
            <label for="nameCard">Name on the card</label>
                <input type="text" name="nameCard"id="credit_card_name" required>
            </div>
        </div>
        <div class="process_submit_btn">
            <a href="index.php?controller=action&action=createBooking&confirm=true&payment=true"id="check_payment_btn"class="event-link-unset process_btn">purchase</a>
          </div>
    </div>
  </div>
</div>



<?php
include('footer.php');
?>
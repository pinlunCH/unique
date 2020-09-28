<?php
include('header.php');
?>

<div class="container-fluid along-item">
  <div class="row acc-detail-photowall">
      <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
          <img class="big-ver each-img-one-size-lg" src="" alt="tourism company">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 thumb-nail-preview">
      <?php 
      foreach($imgs as $proportyImg){
      ?>
        <img src="imgs/<?=$proportyImg['strFileName']?>" class="thumb-nail" alt="unique accommodations rentals">
      <?php
      }
      ?>
      </div>
      <!-- <img src="imgs/thumb1.png" class="thumb-nail" alt=".." data-image="imgs/why3.png" > -->
  </div>
</div>
<div class="container-fluid acc-detail">
  <?php
  foreach($data as $accomDetail){
  $_SESSION['accLocation'] = $accomDetail['location'];
  ?>

  <div class="row padding-ribben">
    <div class="col jost">
        <h3><?=$accomDetail['strName']?></h3>
    </div>  
  </div>  
  <div class="row padding-ribben">
      <div class="col jost">
        <h5 class="prop-detail"><?=$accomDetail['nGuests']?> Guests | <?=$accomDetail['nBedroom']?> Bedroom | <?=$accomDetail['nBath']?> Bath | <?=$accomDetail['location']?></h5>
      </div>
  </div>
  <hr class="template-line">
  <div class="row detail-text-review padding-ribben">
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 detail-box-reset jost">
      <p><?=$accomDetail['strDetails']?></p>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 review-col-template  detail-box-reset jost">
      <h4>$ <?=$accomDetail['nPrice']?> CAD/<span>night</span></h4>
      <div class="review-wrap">
        <div class="review">
          <p>4.8</p>
          <img src="imgs/star.png" alt="5 star accommodation">
        </div>
      </div>  
      <p>3,000 reviews</p>
    </div>
  </div>        
</div>
<?php
  }
?>
<div class="container-fluid facilities">
  <p class="padding-ribben">
    <a class="btn facilities-btn jost" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
      Facilities
    </a>
  </p>
  <div class="collapse show" id="collapseExample">
  <div class="card card-body facilities-card">
    <div class="row">
      <?php
      foreach($facilities as $facility){
        if($facility['freeWifi'] == '1'){
        ?>
          <div class="facilities-group col-6 jost">
            <img src="imgs/415886-64.png" alt="tourism company"><p>Free wifi</p>
          </div>
        <?php  
        }
        if($facility['swimmingPool'] == '1'){
        ?>
          <div class="facilities-group col-6 jost">
            <img src="imgs/309010-64.png" alt="tourism company"><p>Swimming Pool</p>
          </div>
        <?php
        }
        if($facility['airConditioner'] == '1'){
        ?>
          <div class="facilities-group col-6 jost">
            <img src="imgs/3947390-64.png" alt="tourism company"><p>Air conditioner</p>
          </div>
        <?php
        }
        if($facility['hotTub'] == '1'){
        ?>
        <div class="facilities-group col-6 jost">
          <img src="imgs/2324251-64.png" alt="tourism company"><p>Hot tub</p>
        </div>
        <?php
        }
        if($facility['tv'] == '1'){
        ?>
        <div class="facilities-group col-6 jost">
          <img src="imgs/172609-64.png" alt="tourism company"><p>TV</p>
        </div>
        <?php
        }
        if($facility['parking'] == '1'){
        ?>
        <div class="facilities-group col-6 jost">
          <img src="imgs/415895-64.png" alt="tourism company"><p>Parking</p>
        </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
</div>
</div>
<div class="promte-line jost">
<p> check Availability</p><hr>
</div>
<div class="container-fluid availability">
  <form class="bokForm-single"id="check-availability-form" method="post" action="index.php?controller=action&action=processBooking&acom=<?=$_SESSION['accID']?>&confirm=true">
    <div class="row availability-wrap padding-ribben">
    <input type="hidden" value="<?=$_SESSION['accID']?>" id="id-check-avbty">
      <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 jost availability-checkinout">
        <label for="checkin">Check-in</label>
        <input type="date" name="checkin_checking" id="cci" value="<?=$_SESSION['checkin']?>" required>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 jost availability-checkinout">
        <label for="checkin">Check-out</label>
        <input type="date" name="checkout_checking" value="<?=$_SESSION['checkout']?>" id="cco" required>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 availability-checkinout">
        <div class="single">
        <label for="nOfPeople__checking">Guests</label>
            <select class="bokgrp jost availability" name="nOfPeople__checking" id="" required>
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
    </div>
    <div class="row padding-ribben">
      <div class="col-12 warning-hid jost">
        <p><img src="imgs/1814088-128.png" alt="tourism">Unfortunately The accommodation is not available for your selected date.</p>
      </div>
      <div class="col-12">
        <input type="submit" value="check" id="availability-submitting-btn" class="subbtn jost availability-submit">
      </div>
    </div>
  </form>
</div>
<?php
include('footer.php');
?>
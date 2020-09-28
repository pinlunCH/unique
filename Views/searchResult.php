<?php
include('header.php');
(isset($_SESSION['destination']))?$_SESSION['destination']:'';
(isset($_SESSION['nGuest']))?$_SESSION['nGuest']:'2';
(isset($_SESSION['checkin']))?$_SESSION['checkin']:'';
(isset($_SESSION['checkout']))?$_SESSION['checkout']:'';
?>
<div class="container-fluid along-item">
  <div class="search-header jost padding-ribben">
      <h5>Searching:</h5>
      <p class="text-margin-reset"><?=$_SESSION['destination']?> <?=$date?><?=$_SESSION['nGuest']?> Guests </p>
      <p class="text-margin-reset"> <?=$_SESSION['checkin']?> - <?=$_SESSION['checkout']?> | <?=$_SESSION['type']?></p>
  </div>
  <hr class="search-line">
  <!-- <div class="wrap-results row">-->
  <?php
  foreach($data as $searchResult){
  ?>
    <a class="event-link-unset wrap-results row" href="index.php?controller=action&action=accommodations&acom=<?=$searchResult['id']?>">
      <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 jost result-box-item">
          <div class="imageFrame">
              <img class="imgsize img-mb-review img-one-size" src="assets/<?=$searchResult['strCover']?>" alt="romantic">
          </div>  
      </div>
      <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 jost result-box-item">
        <div class="textsection">
            <h3 class="texttitle"><?=$searchResult['strName']?></h3>
            <p class="result-box-text"><?=$searchResult['location']?></p>
            <p class="result-box-text itl-margin"><?=$searchResult['nBedroom']?> bedroom | <?=$searchResult['nGuests']?> Guests | <?=$searchResult['nBath']?> bath</p>
        </div> 
        <div class="review-col-template  detail-box-reset jost">
            <h4>$<?=$searchResult['nPrice']?> CAD/<span>night</span></h4>
            <div class="review-wrap">
                <div class="review">
                <p>4.8</p>
                <img src="imgs/star.png" alt="5 star accommodation">
                </div>
            </div>  
            <p>3,000 reviews</p>
        </div>     
      </div>              
    </a>
  <?php
  }
  ?>
  <!-- </div> -->
</div>




<?php
include('footer.php');
?>
<?php
include('header.php');
?>
<div class="container-fluid along-item">
  <div class="search-header jost padding-ribben">
      <h5><?=$data[0]['location']?></h5>
  </div>
  <hr class="search-line">
  <!-- <div class="wrap-results row">-->
  <?php
  foreach($data as $searchLoc){
  ?>
    <a class="event-link-unset wrap-results row" href="index.php?controller=action&action=accommodations&acom=<?=$searchLoc['id']?>">
      <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 jost result-box-item">
          <div class="imageFrame">
              <img class="imgsize img-mb-review img-one-size" src="assets/<?=$searchLoc['strCover']?>" alt="romantic">
          </div>  
      </div>
      <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 jost result-box-item">
        <div class="textsection">
            <h3 class="texttitle"><?=$searchLoc['strName']?></h3>
            <p class="result-box-text"><?=$searchLoc['location']?></p>
            <p class="result-box-text itl-margin"><?=$searchLoc['nBedroom']?> bedroom | <?=$searchLoc['nGuests']?> Guests | <?=$searchLoc['nBath']?> bath</p>
        </div> 
        <div class="review-col-template  detail-box-reset jost">
            <h4>$<?=$searchLoc['nPrice']?> CAD/<span>night</span></h4>
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
<?php
include('indexheader.php');
?>
  <div class="container-fluid popribben jost">
    <h2 class="textalign center gap">Popular Accommodation</h2>
    <div class="row">
      <?php
      foreach($newAdded as $new){
      ?>

        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 groupgap">      
          <a href="index.php?controller=action&action=accommodations&acom=<?=$new['id']?>" class="event-link-unset">
          <div class="imageFrame">
            <img class="imgsize img-one-size" src="assets/<?=$new['strCover']?>" alt="romantic">
          </div>
          <div class="textsection">
            <h3 class="texttitle"><?=$new['strName']?></h3>
            <p class="textlocation"><?=$new['location']?></p>
            <div class="review">
              <p>4.8</p>
              <img src="imgs/star.png" alt="5 star accommodation">
            </div>
          </div>      
        </a>
        </div>

      <?php
      }
      ?>
    </div>
  </div>
  <div class="container-fluid desribben jost">
    <h2 class="textalign center gap">find your next destination</h2>
    <div class="row" id="destination-ajax">
    <?php
    foreach($location as $destination)
    {
    ?>
      <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 groupgap">
      <a href="index.php?controller=action&action=searchLocation&location=<?=$destination['id']?>" class="event-link-unset">
        <div class="imageFrame">
          <img class="imgsize img-one-size" src="imgs/<?=$destination['strCover']?>" alt="romantic">
        </div>
        <div class="textsection">
          <h3 class="texttitle"><?=$destination['strName']?></h3>
          <p class="textlocation">Traveller's favorite</p>
          <p class="udl event-link-unset">see all 20 propeties</p>
        </div>
    </a>
      </div>
      <?php
    }
    ?>
    </div>
  </div>
  <div class="container-fluid typeribben jost">
    <h2 class="textalign center gap">Browse by type</h2>
    <div class="row">
    <?php
    foreach($type as $accType){
      ?>
      <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 b-type">

        <div class="typegroup">      
          <a href="index.php?controller=action&action=searchType&type=<?=$accType['id']?>" class="event-link-unset">
          <img class="imgsize type-img-one-size" src="imgs/<?=$accType['strCover']?>" alt="<?=$accType['strName']?>">
          <div class="centered"><?=$accType['strName']?></div>
            </a></div>

      </div>
      <?php
      }
      ?>
    </div>
  </div>
  <?php
include('footer.php');
?>
<?php
include('header.php');
if(!$user) {
header("Location: index.php?controller=action&action=register&login=error");
exit;
}
?>

<div class="container-fluid my-booking-setting" id="bookingsection">
    <div class="col jost">
        <h3>My booking</h3>
    </div>
    <div class="col my-booking-category jost">
        <a href="index.php?controller=action&action=booking"><h5 id="upcomeEvent">Upcoming</h5></a>
        <a href="index.php?controller=action&action=booking&past=true"><h5 id="passEvent" >Past</h5></a>
    </div>        
    <hr class="booking-line">
</div>  
<?php
if(!isset($_GET['past'])){
?>
<div class="container-fluid upcoming-booking">
  <div class="row">
  <?php
    foreach($upComing as $upComingEvent){
        ?>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 jost groupgap booking-item">
            <a class="event-link-unset" href="index.php?controller=action&action=accommodations&acom=<?=$upComingEvent['id']?>">
                <div class="imageFrame">
                <img class="imgsize" src="imgs/<?=$upComingEvent['strCover']?>" alt="romantic">
                </div>
                <div class="textsection">
                <h3 class="texttitle"><?=$upComingEvent['strName']?></h3>
                <p class="textlocation"><?=$upComingEvent['address']?>, <?=$upComingEvent['location']?></p>
                <p class="textlocation itl-margin"><?=$upComingEvent['checkin']?> - <?=$upComingEvent['checkout']?></p>
                <p class="textlocation body">Check-In time:<?=$upComingEvent['checkInTime']?></p>
                <p class="textlocation body">Check-Out time:<?=$upComingEvent['checkoutTime']?></p>
                <p class="textlocation body"><?=$upComingEvent['nGuests']?> Guests</p>
                </div>        
            </a>
        </div>  
        <?php
        }  
    } else {
        foreach($pass as $pastEvent){
            ?>
            <div class="container-fluid past-booking">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 jost groupgap past-booking-item">
                        <div class="imageFrame">
                        <img class="imgsize" src="imgs/<?=$pastEvent['strCover']?>" alt="romantic">
                        </div>
                        <div class="textsection">
                        <h3 class="texttitle"><?=$pastEvent['strName']?></h3>
                        <p class="textlocation"><?=$pastEvent['location']?></p>
                        <p class="textlocation"><?=$pastEvent['checkin']?> - <?=$pastEvent['checkout']?></p>
                        <p class="textlocation"><?=$pastEvent['nGuests']?> Guestes</p>
                        </div>
                        <?php
                        if(!$matching){
                        ?>
                            <input type="button" data-id="<?=$pastEvent['id']?>" data-toggle="modal" data-target="#exampleModalCenter" value="Write a review" class="subbtn reviewbtn jost">
                        <?php
                        }else{
                            ?>
                            <input type="button" data-id="<?=$pastEvent['id']?>" data-toggle="modal" data-target="#exampleModalCenter" value="Write a review" class="subbtn reviewbtn jost">
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title jost" id="exampleModalCenterTitle">Please share your experience </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="index.php?controller=action&action=insertRating">
      <input type="hidden" value="<?=$pastEvent['id']?>" name="bookingID">
      <!-- Star rating system (html/css/jquery) are from https://codepen.io/mmoradi08/pen/yLyYrGg -->
        <label for="location">Location</label>
        <div class='rating-stars text-center'>  
            <ul id='stars'>
            <li class='star' title='Poor' data-value='1'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Fair' data-value='2'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Good' data-value='3'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Excellent' data-value='4'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='WOW!!!' data-value='5'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            </ul>
            <input type="hidden" value="" name="location" id="location-rate"/>
        </div>
        <label for="comfort">Comfort</label>
        <div class='rating-stars text-center'>  
            <ul id='stars-2'>
            <li class='star' title='Poor' data-value='1'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Fair' data-value='2'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Good' data-value='3'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Excellent' data-value='4'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='WOW!!!' data-value='5'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            </ul>
            <input type="hidden" value="" name="comfort" id="comfort-rate"/>
        </div>
        <label for="cleanliness">Cleanliness</label>
        <div class='rating-stars text-center'>  
            <ul id='stars-3'>
            <li class='star' title='Poor' data-value='1'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Fair' data-value='2'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Good' data-value='3'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Excellent' data-value='4'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='WOW!!!' data-value='5'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            </ul>
            <input type="hidden" value="" name="cleanliness" id="cleanliness-rate"/>
        </div>
        <label for="value">Value</label>
        <div class='rating-stars text-center'>  
            <ul id='stars-4'>
            <li class='star' title='Poor' data-value='1'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Fair' data-value='2'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Good' data-value='3'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Excellent' data-value='4'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='WOW!!!' data-value='5'>
                <i class='fa fa-star fa-fw'></i>
            </li>
            </ul>
            <input type="hidden" value="" name="value" id="value-rate"/>
        </div>
      </div>
      <div class="modal-footer">
      <input type="submit" data-toggle="modal" data-target="#exampleModalCenter" value="Submit" class="subbtn jost">
      </div>      
      </form>
    </div>
  </div>
</div>
    <?php
        }
    }
    ?>
  </div>
</div>

</div>
<?php
include('footer.php');
?>
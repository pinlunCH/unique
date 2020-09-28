<div class="container-fluid footer jost">
    <div class="row" id="footerRow">
    <div class="d-sm-none d-md-none d-lg-block d-xl-block col-lg-3 col-xl-3">
        <img id="footerLogo" src="imgs/logo.png" alt="unique vacation">
      </div>
      <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
        <a href="why.php">why UNIQUE</a>
        <a href="#">terms and conditions</a>
        <a href="#">privacy agreement</a>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
        <p>Customer service:</p>
        <p>+888-000-8888</p>
        <p>Unique@isunique.com</p>
      </div>
    </div>
    <div class="row copyright">
      &copy; Unique
    </div>
  </div>
</div>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script type="text/javascript" src="js/flyoutMenu.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="js/rating_system.js"></script>
<script src="js/functions.js"></script>
<?php
if(isset($_GET['past'])){
echo '<script>$("#passEvent").css("color","#2E4052");$("#upcomeEvent").css("color","#C6C6C6")</script>';
echo '<script>$("#upcomeEvent").hover( function(){$(this).css("color","#2E4052")},function(){$(this).css("color","#C6C6C6")})</script>';

}else{
echo '<script>$("#passEvent").hover( function(){$(this).css("color","#2E4052")},function(){$(this).css("color","#C6C6C6")})</script>';
}
?>
<script>
$(function(){
  const primary = $('#slideshow').attr('data-primary');
  const secondary = $('#slideshow').attr('data-secondary');
  const tertiary = $('#slideshow').attr('data-tertiary');
  const quaternary = $('#slideshow').attr('data-quaternary');
  const quinary = $('#slideshow').attr('data-quinary');
  const arrImg = [primary,secondary,tertiary,quaternary,quinary];

  const imgReplace = (i) => {
    if(arrImg.length > i) {
      setTimeout(() => {
        $('#slideshow').attr('src', arrImg[i]);
        imgReplace(++i);
      }, 4000);
    } else if (arrImg.length === i) {
      imgReplace(0);
    }
  }
  imgReplace(0);
});
$(function(){
  $('#checkin_header').on('change', function(){
    $('#checkout_header').val($('#checkin_header').val());
  });
  $('#checkout_header').on('change', function(){
    if($('#checkout_header').val()>$('#checkin_header').val()){
      console.log('great');
      $('#checkout_header').css('border','0px');
      $('#hero-search-btn').unbind('click');
    }else{
        $('#checkout_header').css('border','2px solid red');
        $('#hero-search-btn').on("click",function(event){
          event.preventDefault();
        });
    }
  });
  $('#place-input').keyup(function(){
    var listHtml = "";
    var findResult = true;
    $.ajax({
      url:'index.php?controller=location&action=getByName&name='+$('#place-input').val(),
      success:function(data){
        console.log(data);
        if(data!= null && data.length>0 && findResult){
            for(var i=0;i<data.length;i++){
              listHtml += '<li data-id="'+data[i].id+'">'+data[i].strName+'</li>'
            }
            $('#hintList ul').html(listHtml);
            $('#hintList').show();

            $('li').on("click",function(){             
              var itemId = $(this).data('id');
              $("#whatlocation").attr('value',itemId);
              $("#place-input").val($(this).html());

              console.log('submit');
              $('#hero-search-btn').unbind('click');
              $("#hintList").hide();
              $('#place-input').css('border','0px');
            })
          }else{
            console.log('end up else');
            $('#hintList ul').html("");            
            $('#hintList').hide();
            findResult = false;              
            if(!findResult){
                $('#hero-search-btn').on('click', function(event){
                event.preventDefault();
                console.log('you cant submit');
                $('#place-input').css('border','2px solid red');                
              });              
            }
          } 
        },
        error: function(){
          console.log("something is wrong");
        }
      })
    })
});

// https://www.geeksforgeeks.org/how-to-calculate-the-number-of-days-between-two-dates-in-javascript/
$(function(){
  var date1 = new Date($('#checkin_field').val());
  var date2 = new Date($('#checkout_field').val());
  var Difference_In_Time = date2.getTime() - date1.getTime();
  var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
  $('#nights').html(Math.round(Difference_In_Days));
  $('#num_of_night').val(Math.round(Difference_In_Days));
  var price = $('#one_night_price').val();
  var night = $('#num_of_night').val();
  total = price*night;
  console.log(total);
  $('#room_total').val(total);
  var roomTotal = $('#room_total').val();
  var service = $('#service_fee').val();
  var taxes = $('#taxes_fee').val();
  whole_total = parseInt(roomTotal) + parseInt(service) + parseInt(taxes);
  $('#as_whole').val('$'+whole_total);
})
$(function(){  
  var validateError = false;
  $('#cci').on('change',function(){
    console.log('you got it');
    $('#cco').val($('#cci').val());    

    console.log($('#cci').val());
    console.log( $('#cco').val());
  });
  $('#cco').on('change', function(){
    validateError = false;
    console.log($('#cci').val());
    console.log($('#cco').val());
    if($('#cco').val()>$('#cci').val()){
      console.log('great');
      $('#cco').css('border','1px solid black');
      return validateError;
    }else{
      validateError = true;
      if(validateError){
        $('#cco').css('border','2px solid red');
      }
      return validateError;
    }
  })

  $('#check-availability-form').on('submit',function(event){
    event.preventDefault();
    if(!validateError){
      var checkin_checking = $('#cci').val();
      var checkout_checking = $('#cco').val();
      var acom = $('#id-check-avbty').val();
      $.ajax({
        url: 'index.php?controller=action&action=checkAvailability',
        method: "post",
        data:{checkin_checking:checkin_checking,checkout_checking:checkout_checking,acom:acom},
        success: function(results)
        {
          if(results.length>0) // there is booking record during the date inserted
          {
            console.log(results.length);
            console.log('im not available');
            $('#availability-submitting-btn').val('Not Available');
            $('#availability-submitting-btn').css('background-color','#ddd');
            $('.warning-hid').addClass('active');
            $('#cci').on('change',function(){
              $('#availability-submitting-btn').val('Check');
              $('#availability-submitting-btn').css('background-color','#FFC857');
              $('.warning-hid').removeClass('active');
            });
          }else{
            console.log(results.length);
            console.log('im available');
            $('#availability-submitting-btn').val('book now');
            $('#check-availability-form').unbind('submit');
          } 
        },
        error: function(err)
        {
        }
      })
    }
  })
});
$(function(){
  var html = "<option value='0'>All type</option>";
  $.ajax({
    url:'index.php?controller=type&action=getAll',
    success:function(data){
      data.forEach(function(record){
        html += '<option value="'+record.id+'">'+record.strName+'</option>';
      })
      $('#type-select-dropdown').html(html);
    }
  })
})

$(function(){
  let needtocheck = true;
  $('#card_number').on('keyup',function(){
    const cardResult = Is_creditCard($(this).val());
    console.log(cardResult);
    console.log($(this).val());
    if(cardResult){
      needtocheck = false;
      $('#card_number').css('border','1px solid');
    }else{
      $('#card_number').css('border','2px solid red');
    }
  })
  $('#expiry_date_check').on('keyup',function(){
    console.log($(this).val());
    if($(this).val().length === 4){
      needtocheck = false;
      $('#expiry_date_check').css('border','1px solid');
    }else{
      $('#expiry_date_check').css('border','2px solid red');
    }
  })
  $('#ccv').on('keyup',function(){
    console.log($(this).val());
    if($(this).val().length === 3){
      needtocheck = false;
      $('#ccv').css('border','1px solid');
    }else{
      $('#ccv').css('border','2px solid red');
    }
  })
  $('#credit_card_name').on('keyup',function(){
    console.log($(this).val());
    const nameResult = Is_fullname($(this).val());
    if(nameResult){
      needtocheck = false;
      $('#credit_card_name').css('border','1px solid');
    }else{
      $('#credit_card_name').css('border','2px solid red');
    }
  })
  $('#check_payment_btn').on("click", function(event){
    if(needtocheck){
      $('#credit_error_msg').addClass('showMsg');
      event.preventDefault();
    }else{
      $('#check_payment_btn').unbind("click")
    }
  })
  console.log("result "+needtocheck);
})
// validate the credit card number
function Is_creditCard(str)
{
 regexp = /(^4[0-9]{12}(?:[0-9]{3})?$)|(^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$)|(3[47][0-9]{13})|(^3(?:0[0-5]|[68][0-9])[0-9]{11}$)|(^6(?:011|5[0-9]{2})[0-9]{12}$)|(^(?:2131|1800|35\d{3})\d{11}$)/;
  
        if (regexp.test(str))
          {
            return true;
          }
        else
          {
            return false;
          }
}
function Is_fullname(str)
{
 regexp = /^[a-zA-Z ]{2,30}$/;
  
        if (regexp.test(str))
          {
            return true;
          }
        else
          {
            return false;
          }
}

</script>
</body>
</html>
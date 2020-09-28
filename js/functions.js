// on scroll event
$(window).scroll(function() {    
  var scroll = $(window).scrollTop();

  if (scroll >= 200) {
      $(".handle").addClass("darking");
  } else {
      $(".handle").removeClass("darking");
  }
});

// to be delect
// $(function(){
//   $('#upcomeEvent').on('click', function(){
//     $('#passEvent').css('color','#C6C6C6');
//     $('#upcomeEvent').css('color','#2E4052');
    
//   })
//   // $('#passEvent').on('click', function(){
//   //   $('#upcomeEvent').css('color','#C6C6C6');
//   //   $('#passEvent').css('color','#2E4052');
//   // })
// })

//alert box for error
$(function(){
  $('#closeError').on('click', function(){
    $('.alertBox').hide();
  })
})

// show the image that were clicked
$(function(){
  var defaultImg = $('.thumb-nail:first').attr('src');
  console.log(defaultImg);
  $('.big-ver').attr('src', defaultImg);
  $('.thumb-nail').on('click',function(){
    $('.big-ver').attr('src', $(this).attr('src'));
  })
})
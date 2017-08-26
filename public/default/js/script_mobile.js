function formatNumber(number)
{
    var number = number + '';
    var x = number.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function open_dialog(){
    document.getElementById('upload').click();
    return false;
}
$(window).load(function(){
    $('img.lazy').parent().each(function(){
        $(this).addClass('parentLazy');
    })
})
$(document).ready(function(){
  $('.icon-menu').click(function() {
    $('.menu-box').addClass('show');
  })
  $('.menu-box').click(function(e) {
    if (e.target.id === 'menu-box' || e.target.id === 'hide-menu') {
      $('.menu-box').removeClass('show');
    }
  })
  $('.row-icon').click(function(e) {
    e.preventDefault();
    $(this).parent().parent().find('.sub-menu').slideToggle();
    $(this).parent().parent().toggleClass('show-submenu');
  })
  $('.image-list ul').owlCarousel({
      itemsCustom : [[320,1],[470,1],[620,1],[870,1]],

      //Basic Speeds
      slideSpeed : 1000,
      paginationSpeed : 1000,
      rewindSpeed : 1000,

      //Autoplay
      autoPlay : true,
      stopOnHover : false,
      pagination : true,
      responsiveRefreshRate : 700,
    })
  $('.tab-contact ul li').click(function(){
      $('.tab-contact ul li').removeClass('active');
      var name = $(this).data('class');
      $('.box-contact-info').fadeOut();
      $('.'+name).fadeIn();
      $(this).addClass('active');
  })
  $('.tab-contact ul li:nth-child(1)').trigger('click');
  $('#form-lienhe').submit(function(e){
      e.preventDefault();
      var value = $('#form-lienhe').serialize();
      var html = $(this).html();
      var content = $(this);
      content.html('<div class="loading" style="font-size:13px; text-align:center; color:#454545"><img style="max-width: 80%" src="public/default/img/icon/loading.gif" alt="" /><div class="clr10"></div><span>Đang gửi thông tin, vui lòng đợi..</span></div>');
      setTimeout(function(){
          $.post(base_url+'default/contact/send',value).done(function(data){
              alertify.alert(data);
              content.html(html);
          });
      },1500);
  })
  scale = (window.innerWidth / 768);
  $('.content-slider').css('transform', 'scale('+scale+')');
  var listSliderPT = [];
  $('.sliderPortrait .slider-image').each(function() {
    listSliderPT.push('url('+$(this).data('image')+')');
  })
  var listSliderLC = [];
  $('.sliderLandscape .slider-image').each(function() {
    listSliderLC.push('url('+$(this).data('image')+')');
  })
  var activeSliderPT = 0;
  var activeSliderLC = 0;
  $('.sliderPortrait .slider-image').css('background-image', listSliderPT[activeSliderPT]);
  $('.sliderPortrait .slider-image:nth-child('+activeSliderPT+')').fadeIn();
  $('.sliderPortrait .content-slider').eq(activeSliderPT).fadeIn();
  $('.sliderPortrait .dots-slider').eq(activeSliderPT).addClass('active');
  $('.sliderLandscape .slider-image').css('background-image', listSliderLC[activeSliderLC]);
  $('.sliderLandscape .slider-image:nth-child('+activeSliderLC+')').fadeIn();
  $('.sliderLandscape .content-slider').eq(activeSliderLC).fadeIn();
  $('.sliderLandscape .dots-slider').eq(activeSliderPT).addClass('active');
  var interval = setInterval(function() {
    activeSliderPT++;
    activeSliderLC++;
    $('.sliderPortrait .content-slider').fadeOut();
    $('.sliderLandscape .content-slider').fadeOut();
    $('.sliderPortrait .dots-slider').removeClass('active');
    $('.sliderLandscape .dots-slider').removeClass('active');
    $('.sliderPortrait .slider-image').css('background-image', listSliderPT[activeSliderPT]);
    $('.sliderPortrait .content-slider').eq(activeSliderPT).fadeIn();
    $('.sliderPortrait .dots-slider').eq(activeSliderPT).addClass('active');
    $('.sliderLandscape .slider-image').css('background-image', listSliderLC[activeSliderLC]);
    $('.sliderLandscape .content-slider').eq(activeSliderLC).fadeIn();
    $('.sliderLandscape .dots-slider').eq(activeSliderLC).addClass('active');
    if (activeSliderPT === $('.sliderPortrait .slider-image').length - 1) {
      activeSliderPT = -1;
    }
    if (activeSliderLC === $('.sliderLandscape .slider-image').length - 1) {
      activeSliderLC = -1;
    }
  }, 8000);
  $('.sliderPortrait .dots-slider').click(function(){
    $('.sliderPortrait .dots-slider').removeClass('active');
    $(this).addClass('active');
    index = $(this).data('index');
    $('.sliderPortrait .slider-image').css('background-image', listSliderPT[index]);
    $('.sliderPortrait .content-slider').eq(index).fadeIn();
    activeSliderPT = index - 1;
    activeSliderLC = -1;
    clearInterval(interval);
    interval = setInterval(function() {
      activeSliderPT++;
      activeSliderLC++;
      $('.sliderPortrait .content-slider').fadeOut();
      $('.sliderLandscape .content-slider').fadeOut();
      $('.sliderPortrait .dots-slider').removeClass('active');
      $('.sliderLandscape .dots-slider').removeClass('active');
      $('.sliderPortrait .slider-image').css('background-image', listSliderPT[activeSliderPT]);
      $('.sliderPortrait .content-slider').eq(activeSliderPT).fadeIn();
      $('.sliderPortrait .dots-slider').eq(activeSliderPT).addClass('active');
      $('.sliderLandscape .slider-image').css('background-image', listSliderLC[activeSliderLC]);
      $('.sliderLandscape .content-slider').eq(activeSliderLC).fadeIn();
      $('.sliderLandscape .dots-slider').eq(activeSliderLC).addClass('active');
      if (activeSliderPT === $('.sliderPortrait .slider-image').length - 1) {
        activeSliderPT = -1;
      }
      if (activeSliderLC === $('.sliderLandscape .slider-image').length - 1) {
        activeSliderLC = -1;
      }
    }, 8000);
  })
  $('.sliderLandscape .dots-slider').click(function(){
    $('.sliderLandscape .dots-slider').removeClass('active');
    $(this).addClass('active');
    index = $(this).data('index');
    $('.sliderLandscape .slider-image').css('background-image', listSliderLC[index]);
    $('.sliderLandscape .content-slider').eq(index).fadeIn();
    activeSliderLC = index - 1;
    activeSliderPT = -1;
    clearInterval(interval);
    interval = setInterval(function() {
      activeSliderPT++;
      activeSliderLC++;
      $('.sliderPortrait .content-slider').fadeOut();
      $('.sliderLandscape .content-slider').fadeOut();
      $('.sliderPortrait .dots-slider').removeClass('active');
      $('.sliderLandscape .dots-slider').removeClass('active');
      $('.sliderPortrait .slider-image').css('background-image', listSliderPT[activeSliderPT]);
      $('.sliderPortrait .content-slider').eq(activeSliderPT).fadeIn();
      $('.sliderPortrait .dots-slider').eq(activeSliderPT).addClass('active');
      $('.sliderLandscape .slider-image').css('background-image', listSliderLC[activeSliderLC]);
      $('.sliderLandscape .content-slider').eq(activeSliderLC).fadeIn();
      $('.sliderLandscape .dots-slider').eq(activeSliderLC).addClass('active');
      if (activeSliderPT === $('.sliderPortrait .slider-image').length - 1) {
        activeSliderPT = -1;
      }
      if (activeSliderLC === $('.sliderLandscape .slider-image').length - 1) {
        activeSliderLC = -1;
      }
    }, 8000);
  })
  $('.content-popup').click(function(){
    $('.popup-info').fadeOut();
  })
  $('.location').click(function(){
    text = $(this).find('img').data('note');
    if (text !== '') {
        $('.content-popup span').html(text);
        $('.popup-info').fadeIn();
    }
  })
  $('.icon-show').click(function() {
    if ($(this).parent().find('.box-child').css('display') == 'none') {
        $(this).html('--');
    } else {
        $(this).html('+');
    }
    $(this).parent().find('.box-child').slideToggle();
  })
  $('#file').change(function(e){
        var fileName = e.target.files[0].name;
        $(this).parent().find('label').html(fileName);
    });
  $('.list-supplier-index ul').owlCarousel({
      itemsCustom : [[320,3],[470,5],[620,7],[870,9]],
    
      //Basic Speeds
      slideSpeed : 1000,
      paginationSpeed : 1000,
      rewindSpeed : 1000,
    
      //Autoplay
      autoPlay : true,
      stopOnHover : false,
      pagination : false,
      responsiveRefreshRate : 700,
    })
})

$(window).bind("resize", function(){
  scale = (window.innerWidth / 768);
  $('.content-slider').css('transform', 'scale('+scale+')');
});
$(window).load(function(){

})
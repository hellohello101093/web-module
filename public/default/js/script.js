function hexc(colorval) {
    var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    delete(parts[0]);
    for (var i = 1; i <= 3; ++i) {
        parts[i] = parseInt(parts[i]).toString(16);
        if (parts[i].length == 1) parts[i] = '0' + parts[i];
    }
    color = '#' + parts.join('');
}
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

function changeActiveTab(activeSlider) {
    $('.service-slider ul li').removeClass('active');
    $('.slider-pagination ul li').removeClass('active');
    numberSlider = $('.slider-pagination ul li').length;
    child = activeSlider % numberSlider;
    if (child === 0) {
        child = numberSlider;
    }
    $('.service-slider ul li:nth-child('+ (child) +')').addClass('active');
    $('.slider-pagination ul li:nth-child('+ (child) +')').addClass('active');
}

function runSlider() {
    return setInterval(function() {
        $('.jssora01r').trigger('click');
    }, 8000)
}

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

$(document).ready(function(){
    // slider
    var _SlideshowTransitions = [
    //Fade
    {$Duration:1000,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
    {$Duration:1200,y:-1,$Cols:8,$Rows:4,$Clip:15,$During:{$Top:[0.5,0.5],$Clip:[0,0.5]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:12},$ScaleClip:0.5},
    {$Duration:600,x:-1,y:1,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:264,$Easing:{$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
    {$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
    {$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
    {$Duration:1200,y:1,$Rows:2,$Zoom:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}
    ];

    var options = {
        $FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
        $AutoPlay: false,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
        $AutoPlayInterval: 0,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
        $PauseOnHover: 0,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

        $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
        $SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
        $SlideDuration: 800,                               //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
        $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
        //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
        //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
        $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
        $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
        $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
        $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
        $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
        $DragOrientation: 0,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

        

        $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
            $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
            $ChanceToShow: 2
        },

        $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
            $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
            $ChanceToShow: 1                               //[Required] 0 Never, 1 Mouse Over, 2 Always
        },
		$SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
            $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
            $Transitions: _SlideshowTransitions            //[Required] An array of slideshow transitions to play slideshow

        }
    };
    if ($('#slider1_container').length > 0) {
        var jssor_slider1 = new $JssorSlider$("slider1_container", options);
        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var bodyWidth = document.body.clientWidth;
            if (bodyWidth)
                jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
            else
                window.setTimeout(ScaleSlider, 30);
        }
        ScaleSlider();
    
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        var interVal = runSlider();
        $('.jssora01r').click(function(){
            activeSlider++;
            changeActiveTab(activeSlider);
        })
        $('.jssora01l').click(function(){
            activeSlider--;
            changeActiveTab(activeSlider);
        })
        var activeSlider = 1;
        changeActiveTab(activeSlider);
        $('.slider-pagination ul li').click(function(){
            clearInterval(interVal);
            activeSlider = parseInt($(this).data('offset'));
            jssor_slider1.$PlayTo(activeSlider -1);
            changeActiveTab(activeSlider);
            interVal = runSlider();
        })
        //responsive code end
    }
    if ($('#slider_container').length > 0) {
        var jssor_slider2 = new $JssorSlider$("slider_container", options);
        var interVal = runSlider();
        $('.jssora01r').click(function(){
            activeSlider++;
            changeActiveTab(activeSlider);
        })
        $('.jssora01l').click(function(){
            activeSlider--;
            changeActiveTab(activeSlider);
        })
        var activeSlider = 1;
        changeActiveTab(activeSlider);
        $('.slider-pagination ul li').click(function(){
            clearInterval(interVal);
            activeSlider = parseInt($(this).data('offset'));
            jssor_slider2.$PlayTo(activeSlider -1);
            changeActiveTab(activeSlider);
            interVal = runSlider();
        })
    }
    
    $('.list-others-news ul').owlCarousel({
        loop: false,
        nav:false,
        dots:false,
        autoplay: true,
        autoplayTimeout:3000,
        smartSpeed:1000,
        margin: 20,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items: 4
            },
            600:{
                items: 4
            },
            1000:{
                items: 4
            }
        },
    })
    $('.list-others-news .prev').click(function() {
        $('.list-others-news  ul').trigger('prev');
    })
    $('.list-others-news .next').click(function() {
        $('.list-others-news  ul').trigger('next');
    })
       
    $('.list-doitac ul').owlCarousel({
        loop: false,
        nav:false,
        dots:true,
        autoplay: true,
        autoplayTimeout:3000,
        smartSpeed:1000,
        margin: 10,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        },
    })
    
    $('.list-supplier-index ul').owlCarousel({
        loop: false,
        nav:false,
        dots:false,
        autoplay: true,
        autoplayTimeout:3000,
        smartSpeed:1000,
        margin: 10,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:8
            },
            600:{
                items:8
            },
            1000:{
                items:8
            }
        },
    })
    
    var activeContact = 0;
    $('.title-map ul li').click(function(){
        activeContact = $(this).data('offset');
        $('.list-map ul li').fadeOut();
        $('.list-info-contact ul li').fadeOut();
        $('.list-map ul li:nth-child('+activeContact+')').fadeIn();
        $('.list-info-contact ul li:nth-child('+activeContact+')').fadeIn();
    })
    $('#activeTabContact').trigger('click');
    
    $('#form-lienhe').submit(function(e){
        e.preventDefault();
        var value = $('#form-lienhe').serialize();
        var html = $(this).html();
        var content = $(this);
        content.html('<div class="loading" style="font-size:13px; text-align:center; color:#454545"><img src="public/default/img/icon/loading.gif" alt="" /><div class="clr10"></div><span>Đang xử lý, vui lòng đợi...</span></div>');
        setTimeout(function(){
            $.post(base_url+'default/contact/send',value).done(function(data){
                alertify.alert(data);
                content.html(html);
            });
        },1500);
    })
    $('.print').click(function() {
        console.log('ahihi');
        printDiv('printableArea');
    })
    var href = window.location.href;
    if (href !== base_url) {
        $("body, html").animate({ 
          scrollTop: 495
        }, 600);
    }
    
    $('#subscribe').click(function() {
        email = $('#user_email').val();
        if (email) {
            $.post(base_url+'default/index/follow', {email: email}, function(data) {
                alertify.alert(data);
            });
        } else {
            alertify.alert('Vui lòng nhập email');
        }
    })
    $('#file').change(function(e){
        var fileName = e.target.files[0].name;
        $(this).parent().find('label').html(fileName);
    });
})
$(window).load(function(){
    $(".scroll").mCustomScrollbar();
})
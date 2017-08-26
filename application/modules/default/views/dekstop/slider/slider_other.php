<div class="slider-pagination">
    <ul>
        <?php if (!isset($sliders) || (isset($sliders) && count($sliders) == 0)) { $sliders = $this->mslider->listAll(); $forder_slider = 'slider'; } $i = 1; foreach($sliders as $slider){ ?>
        <li data-offset="<?php echo $i; $i++; ?>"></li>
        <?php } ?>
    </ul>
</div>
<div id="slider1_container" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1280px; height: 375px; overflow: hidden;">
    <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 1280px; height: 375px; overflow: hidden;">
        <?php
            foreach($sliders as $s){
                echo '
                    <div class="list-slider">
                        <a href="'.$s['link'].'">
                            <img src="public/'.$forder_slider.'/'.$s['image'].'" class="center" />
                        </a>
                    </div>
                ';
            } 
        ?>
    </div>
    <div class="bt-slider">
        <span u="arrowleft" class="jssora01l" style="width: 1px; height: 1px;"></span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora01r" style="width: 1px; height: 1px;"></span>
    </div>
</div>
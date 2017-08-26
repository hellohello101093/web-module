<div class="fix">
    <div class="slider-index">
        <div class="service-slider">
            <ul>
                <?php $sliders = $this->mservice->getSlider(5); foreach($sliders as $slider){ $link = 'dich-vu/chi-tiet/'.$slider['link']; if ($slider['type'] == 1) $link = 'dich-vu/'.$slider['link']; ?>
                <li>
                    <a href="<?php echo $link ?>">
                        <div class="desc-service-title">
                            <?php echo $slider['title'] ?>
                        </div>
                        <div class="desc-service-slider ckeditor scroll">
                            <?php echo $slider['desc'] ?>
                        </div>
                        <div class="chitiet-text">
                            <span>Chi tiết</span>
                        </div>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="slider-pagination">
            <ul>
                <?php $i = 1; foreach($sliders as $slider){ ?>
                <li data-offset="<?php echo $i; $i++; ?>"></li>
                <?php } ?>
            </ul>
        </div>
        <div id="slider_container" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 700px; height: 325px; overflow: hidden;">
            <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 700px; height: 325px; overflow: hidden;">
                <?php
                    foreach($sliders as $s){
                        $link = 'dich-vu/chi-tiet/'.$s['link']; if ($s['type'] == 1) $link = 'dich-vu/'.$s['link'];
                        echo '
                            <div class="list-slider">
                                <a href="'.$link.'">
                                    <img src="public/service/'.$s['slider_image'].'" class="center" />
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
    </div>
    <div class="slider-right">
        <div class="check-transport-container">
            <div class="check-transport">
            <form action="kiem-tra-van-don" method="post">
                <div class="title-slider-right">Kiểm tra vận đơn</div>
                <div class="input-check-transport">
                    <input type="text" name="compose_number" placeholder="Vui lòng nhập mã tracking" required="" />
                </div>
                <div class="help-tracking">(Nhập đến 10 mã số trên Phiếu vận chuyển)</div>
                <div class="button-check-transport">
                    <button>Tìm kiếm</button>
                </div>
            </form>
            </div>
        </div>
        <div class="list-slider-service">
            <div class="title-slider-right">Dịch vụ nổi bật</div>
            <ul>
                <?php foreach($sliders as $service) { $link = 'dich-vu/chi-tiet/'.$service['link']; if ($service['type'] == 1) $link = 'dich-vu/'.$service['link']; ?>
                <li>
                    <a href="<?php echo $link ?>">
                        <?php echo $service['title'] ?>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="clr"></div>
    </div>
    <div class="clr"></div>
</div>
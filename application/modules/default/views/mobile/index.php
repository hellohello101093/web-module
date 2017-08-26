<section>
    <!--<div class="slider">
        <div class="sliderPortrait">
          <?php
              $sliders = $this->mslider_mobile->listAll();
              $i = 0;
              foreach($sliders as $slider) { if ($slider['type'] === 'Portrait') {
          ?>
          <div class="slider-image" data-image="public/slider_mobile/<?php echo $slider['image'] ?>"></div>
          <div class="content-slider">
              <a href="<?php echo $slider['link'] ?>">
                  <div class="title-text-project-slider">
                      <span><?php echo $slider['title'] ?></span>
                  </div>
                  <div class="desc-project-slider ckeditor">
                      <?php echo $slider['description'] ?>
                  </div>
                  <div class="chitiet-text">
                      <span>Chi tiết</span>
                  </div>
              </a>
          </div>
          <div class="dots-slider" data-index="<?php echo $i; $i++ ?>"></div>
          <?php } } ?>
        </div>
        <div class="sliderLandscape">
          <?php
              $i = 0;
              foreach($sliders as $slider) { if ($slider['type'] === 'Landscape') {
          ?>
          <div class="slider-image" data-image="public/slider_mobile/<?php echo $slider['image'] ?>"></div>
          <div class="content-slider">
              <a href="<?php echo $slider['link'] ?>">
                  <div class="title-text-project-slider">
                      <span><?php echo $slider['title'] ?></span>
                  </div>
                  <div class="desc-project-slider ckeditor">
                      <?php echo $slider['description'] ?>
                  </div>
                  <div class="chitiet-text">
                      <span>Chi tiết</span>
                  </div>
              </a>
          </div>
          <div class="dots-slider" data-index="<?php echo $i; $i++ ?>"></div>
          <?php } } ?>
        </div>
    </div>-->
    <div class="services-index">
        <div class="title-component">
            <span>Dịch vụ Nguyên Phát</span>
        </div>
        <div class="services-box">
            <ul>
                <?php $services = $this->mservice->getTopService(999); foreach($services as $service) { $link = 'dich-vu/chi-tiet/'.$service['link']; if ($service['type'] == 1) $link = 'dich-vu/'.$service['link']; ?>
                <li>
                    <a href="<?php echo $link ?>">
                        <div class="image-service">
                            <img src="public/service/<?php echo $service['avatar'] ?>" alt=" " />
                        </div>
                        <div class="title-service">
                            <img src="public/service/<?php echo $service['icon'] ?>" alt=" " />
                            <?php echo $service['title'] ?>
                        </div>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="activity">
        <div class="title-component">
            <span>Tiêu Chí Hoạt động</span>
        </div>
        <div class="list-activities">
            <ul>
                <li>
                    <div class="icon-activity">
                        <img src="public/default/img/icon/fast.png" alt=" " />
                    </div>
                    <div class="text-activity">Nhanh</div>
                    <div class="desc-activity">
                        <?php echo $this->mconfig->getByKey('fast_criteria') ?>
                    </div>
                </li>
                <li>
                    <div class="icon-activity">
                        <img src="public/default/img/icon/price.png" alt=" " />
                    </div>
                    <div class="text-activity">Giá cả hợp lý</div>
                    <div class="desc-activity">
                        <?php echo $this->mconfig->getByKey('price_criteria') ?>
                    </div>
                </li>
                <li>
                    <div class="icon-activity">
                        <img src="public/default/img/icon/quality.png" alt=" " />
                    </div>
                    <div class="text-activity">Chất lượng, uy tín</div>
                    <div class="desc-activity">
                        <?php echo $this->mconfig->getByKey('quality_criteria') ?>
                    </div>
                </li>
            </ul>
            <div class="clr"></div>
        </div>
    </div>
    <div class="clr10"></div>
    <div class="supplier">    
        <div class="title-component">
            <span>Đối tác khách hàng</span>
        </div>
        <div class="clr10"></div>
        <div class="list-supplier-index">
            <ul>
                <?php $supliers = $this->mfooter_slider->listAll(); foreach($supliers as $suplier) { ?>
                <li>
                    <a href="<?php echo $suplier['link'] ?>">
                        <img src="public/footer_slider/<?php echo $suplier['image'] ?>" alt=" " />
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="clr15"></div>
    <div class="ten-cty"><?php echo $this->mconfig->getByKey('company_name') ?></div>
    <div class="clr10"></div>
    <div class="item-contact">
        <div class="icon-contact-footer icon-address"></div>
        <div class="text-contact-footer"><?php echo $this->mconfig->getByKey('address_branch_4') ?></div>
    </div>
    <div class="item-contact">
        <div class="icon-contact-footer icon-phone"></div>
        <div class="text-contact-footer"><?php echo $this->mconfig->getByKey('hotline_branch_4') ?></div>
    </div>
    <div class="item-contact">
        <div class="icon-contact-footer icon-fax"></div>
        <div class="text-contact-footer"><?php echo $this->mconfig->getByKey('fax_branch_4') ?></div>
    </div>
    <div class="item-contact">
        <div class="icon-contact-footer icon-email"></div>
        <div class="text-contact-footer"><?php echo $this->mconfig->getByKey('email_branch_4') ?></div>
    </div>
</section>

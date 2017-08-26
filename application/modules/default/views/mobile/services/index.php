<section>
    <div class="fix">
      <div class="breabcrumb">
        <a href="">Trang chủ</a>
        <img src="public/default/img/mobile/arrow.png" alt=" " class="arrow" />
        <a>Dịch vụ</a>
        <img src="public/default/img/mobile/after.png" alt=" " class="after" />
      </div>
      <div class="services-box">
          <ul>
              <?php foreach($services as $data) { ?>
              <?php $link = ''; if ($data['type'] == 0 || $data['type'] == 2) $link = 'dich-vu/chi-tiet/'.$data['link']; else $link = 'dich-vu/'.$data['link']; ?>
              <li>
                  <a href="<?php echo $link ?>">
                      <div class="image-service">
                          <img src="public/service/<?php echo $data['avatar'] ?>" alt=" " />
                      </div>
                      <div class="title-service">
                          <span><?php echo $data['title'] ?></span>
                      </div>
                  </a>
              </li>
              <?php } ?>
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

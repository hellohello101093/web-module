<section>
    <div class="fix">
      <div class="breabcrumb">
        <a href="">Trang chủ</a>
        <img src="public/default/img/mobile/arrow.png" alt=" " class="arrow" />
        <a>Dự án khách hàng</a>
        <img src="public/default/img/mobile/after.png" alt=" " class="after" />
      </div>
      <div class="box-duan">
          <div class="list-duan">
              <ul>
                  <?php foreach($data as $val){ $images = json_decode($val['image'], true); ?>
                  <li>
                      <a href="du-an-khach-hang/chi-tiet/<?php echo $val['link'] ?>">
                          <div class="image-duan">
                              <img src="public/product/<?php echo $val['id'] ?>/thumbnail/<?php echo $images[$val['avatar']] ?>" alt=" " />
                          </div>
                          <div class="title-duan">
                              <span><?php echo $val['name'] ?></span>
                          </div>
                      </a>
                  </li>
                  <?php } ?>
              </ul>
              <div class="clr10"></div>
          </div>
          <div class="phantrang">
              <ul>
                  <?php echo $pagination ?>
              </ul>
          </div>
      </div>
    <div>
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

<section>
    <div class="fix">
      <div class="breabcrumb">
        <a href="">Trang chủ</a>
        <img src="public/default/img/mobile/arrow.png" alt=" " class="arrow" />
        <a href="du-an-khach-hang">Dự án khách hàng</a>
        <img src="public/default/img/mobile/after.png" alt=" " class="after" />
      </div>
      <div class="page-title"><span><?php echo $data['name'] ?></span></div>
      <div class="clr10"></div>
      <div class="box-duan-detail">
          <div class="detail-left">
              <div class="image-list">
                  <ul>
                      <?php $images = json_decode($data['image'], true); foreach($images as $image){ ?>
                      <li>
                          <img src="public/product/<?php echo $data['id'] ?>/<?php echo $image ?>" alt=" " />
                      </li>
                      <?php } ?>
                  </ul>
              </div>
              <div class="title-duan-detail">
                  <span><?php echo $data['name'] ?></span>
              </div>
              <div class="content-duan-detail ckeditor content-text">
                  <?php echo $data['content'] ?>
              </div>
          </div>
          <div class="detail-right">
              <div class="title-duan-other">
                  <span>Dự án khác</span>
              </div>
              <div class="list-duan">
                  <ul>
                      <?php $duan = $this->mproduct->getRandom(2); foreach($duan as $val){ $images = json_decode($val['image'], true); ?>
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
          </div>
          <div class="clr30"></div>
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

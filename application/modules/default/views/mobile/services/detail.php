<section>
  <div class="fix">
    <div class="breabcrumb">
      <a href="dich-vu">Dịch vụ</a>
      <img src="public/default/img/mobile/arrow.png" alt=" " class="arrow" />
      <a href=""><?php echo $data['title'] ?></a>
      <img src="public/default/img/mobile/after.png" alt=" " class="after" />
    </div>
    <div class="page-content ckeditor">
      <?php echo $data['content'] ?>
    </div>
    <div class="detail-right">
        <div class="title-duan-other">
            <span>Dịch vụ khác</span>
        </div>
        <div class="list-tintuc">
            <ul>
                <?php $duan = $this->mservice->listAll(99, 0); foreach($duan as $val) { if ($val['type'] != 1) { ?>
                  <li>
                      <a href="dich-vu/chi-tiet/<?php echo $val['link'] ?>">
                          <div class="img-tintuc">
                              <img src="public/service/<?php echo $val['avatar'] ?>" alt=" "/>
                          </div>
                          <div class="title-tintuc">
                              <span><?php echo $val['title'] ?></span>
                          </div>
                          <div class="desc-tintuc">
                              <?php echo $val['desc'] ?>
                          </div>
                      </a>
                  </li>
                <?php } } ?>
            </ul>
            <div class="clr10"></div>
        </div>
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

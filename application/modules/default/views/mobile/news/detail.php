<section>
    <div class="fix">
      <div class="breabcrumb">
        <a href="tin-tuc">Tin tức</a>
        <img src="public/default/img/mobile/arrow.png" alt=" " class="arrow" />
        <a><?php echo mb_substr($data['title'], 0, 30).'...' ?></a>
        <img src="public/default/img/mobile/after.png" alt=" " class="after" />
      </div>
        <div class="clr10"></div>
        <div class="detail-left">
            <div class="image-list">
                <ul>
                    <li>
                        <img src="public/duan/<?php echo $data['avatar'] ?>" alt=" " />
                    </li>
                </ul>
            </div>
            <div class="title-duan-detail">
                <span><?php echo $data['title'] ?></span>
            </div>
            <div class="content-duan-detail ckeditor content-text">
                <?php echo $data['content'] ?>
            </div>
            <?php $tags = json_decode($data['tags'], true); if(is_array($tags)) { ?>
            <div class="list-tags">
                <ul>
                    <?php foreach($tags as $tag) { ?>
                    <li><form method="post" action="tin-tuc/tags"><button name="tag" value="<?php echo $tag ?>"><?php echo $tag ?></button></form></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
        </div>
        <div class="detail-right">
            <div class="title-duan-other">
                <span>Tin tức khác</span>
            </div>
            <div class="list-tintuc">
                <ul>
                    <?php $duan = $this->mduan->listAll(2, 0); foreach($duan as $val) { ?>
                      <li>
                          <a href="tin-tuc/chi-tiet/<?php echo $val['link'] ?>">
                              <div class="img-tintuc">
                                  <img src="public/duan/<?php echo $val['avatar'] ?>" alt=" "/>
                              </div>
                              <div class="title-tintuc">
                                  <span><?php echo $val['title'] ?></span>
                              </div>
                              <div class="desc-tintuc">
                                  <?php echo $val['desc'] ?>
                              </div>
                          </a>
                      </li>
                    <?php } ?>
                </ul>
                <div class="clr10"></div>
            </div>
        </div>
        <div class="clr"></div>
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

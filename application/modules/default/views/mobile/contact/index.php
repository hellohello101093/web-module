<section>
    <div class="fix">
      <div class="breabcrumb">
        <a href="">Trang chủ</a>
        <img src="public/default/img/mobile/arrow.png" alt=" " class="arrow" />
        <a>Liên hệ</a>
        <img src="public/default/img/mobile/after.png" alt=" " class="after" />
      </div>
        <div class="contact-left">
            <div class="tab-contact" style="display: none;">
                <ul>
                    <li class="active" data-class="hochiminh-contact">
                        <span>TP. Hồ Chí Minh</span>
                    </li>
                    <li data-class="danang-contact">
                        <span>Đà Nẵng</span>
                    </li>
                    <li data-class="hanoi-contact">
                        <span>Hà Nội</span>
                    </li>
                </ul>
            </div>
            <?php $branchs = $this->mbranch->getAll(); foreach($branchs as $branch) { if ($branch['status'] === 'on') { ?>
            <div class="hochiminh-contact box-contact-info">
                <div class="info-contact">
                    <div class="ten-cty">
                        <span><?php echo $branch['title'] ?></span>
                    </div>
                    <div class="clr5"></div>
                    <div class="item-contact">
                        <div class="icon-contact">
                            <img src="public/default/img/icon/black-address.png" alt=" " />
                        </div>
                        <div class="value-contact">
                            <?php echo $branch['address'] ?>
                        </div>
                    </div>
                    <div class="clr5"></div>
                    <div class="item-contact">
                        <div class="icon-contact">
                            <img src="public/default/img/icon/black-phone.png" alt=" " />
                        </div>
                        <div class="value-contact">
                            <?php echo $branch['phone'] ?>
                        </div>
                        <div class="icon-contact" style="margin-left: 30px;">
                            <img src="public/default/img/icon/black-fax.png" alt=" " />
                        </div>
                        <div class="value-contact">
                            <?php echo $branch['fax'] ?>
                        </div>
                    </div>
                    <div class="clr5"></div>
                    <div class="item-contact">
                        <div class="icon-contact">
                            <img src="public/default/img/icon/black-email.png" alt=" " />
                        </div>
                        <div class="value-contact">
                            <?php echo $branch['email'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clr15"></div>
            <?php } } ?>
        </div>
        <div class="contact-right">
            <form id="form-lienhe" method="post">
                <div class="item-form">
                    <div class="text-form">
                        <span>Họ và tên</span>
                    </div>
                    <div class="input-form">
                        <input name="name" placeholder="Họ và tên" type="text" required="" />
                    </div>
                </div>
                <div class="item-form">
                    <div class="text-form">
                        <span>Địa chỉ</span>
                    </div>
                    <div class="input-form">
                        <input name="address" placeholder="Địa chỉ" type="text" required="" />
                    </div>
                </div>
                <div class="item-form">
                    <div class="text-form">
                        <span>Email</span>
                    </div>
                    <div class="input-form">
                        <input name="email" placeholder="Email" type="email" required="" />
                    </div>
                </div>
                <div class="item-form">
                    <div class="text-form">
                        <span>Điện thoại</span>
                    </div>
                    <div class="input-form">
                        <input name="phone" placeholder="Điện thoại" type="text" required="" />
                    </div>
                </div>
                <div class="item-form">
                    <div class="text-form">
                        <span>Nội dung</span>
                    </div>
                    <div class="input-form" style="margin-left: -15px;">
                        <textarea name="message" required=""></textarea>
                    </div>
                </div>
                <div class="clr"></div>
                <div class="item-form">
                    <button type="submit"><span>Gửi</span></button>
                </div>
            </form>
        </div>
        <div class="clr20"></div>
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

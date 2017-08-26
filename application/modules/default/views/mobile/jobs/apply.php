<section>
    <div class="fix">
      <div class="breabcrumb">
        <a href="tuyen-dung">Tuyển dụng</a>
        <img src="public/default/img/mobile/arrow.png" alt=" " class="arrow" />
        <a><?php echo mb_substr($data['title'], 0, 30).'...' ?></a>
        <img src="public/default/img/mobile/after.png" alt=" " class="after" />
      </div>
        <div class="clr10"></div>
        <div class="detail-left">
            <div class="title-duan-detail">
                <span><?php echo $data['title'] ?></span>
            </div>
            <div class="contact-right">
                <form action="nop-ho-so-ung-tuyen" method="post" enctype="multipart/form-data">
                    <div class="item-form">
                        <div class="text-form">
                            <span>Vị Trí</span>
                        </div>
                        <div class="input-form">
                            <input type="text" required="" name="job_name" value="<?php echo $data['title'] ?>" readonly="" />
                        </div>
                    </div>
                    <div class="item-form">
                        <div class="text-form">
                            <span>Họ và tên</span>
                        </div>
                        <div class="input-form">
                            <input type="text" required="" name="name" value="<?php echo $this->session->userdata('name') ?>" />
                        </div>
                    </div>
                    <div class="item-form">
                        <div class="text-form">
                            <span>Địa chỉ</span>
                        </div>
                        <div class="input-form">
                            <input type="text" required="" name="address" value="<?php echo $this->session->userdata('user_address') ?>" />
                        </div>
                    </div>
                    <div class="item-form">
                        <div class="text-form">
                            <span>Email</span>
                        </div>
                        <div class="input-form">
                            <input type="email" required="" name="email" value="<?php echo $this->session->userdata('user_email') ?>" />
                        </div>
                    </div>
                    <div class="item-form">
                        <div class="text-form">
                            <span>Điện thoại</span>
                        </div>
                        <div class="input-form">
                            <input type="text" required="" name="phone" value="<?php echo $this->session->userdata('user_phone') ?>" />
                        </div>
                    </div>
                    <div class="item-form">
                        <div class="text-form">
                            <span>File CV</span>
                        </div>
                        <div class="input-form">
                            <label for="file">Upload File</label><input type="file" required="" name="cvpdf" id="file" />
                        </div>
                    </div>
                    <div class="clr"></div>
                    <input type="hidden" name="job_id" value="<?php echo $data['id'] ?>" />
                    <div class="item-form">
                        <button type="submit" name="send" value="ok"><span>Gửi</span></button>
                    </div>
                </form>
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

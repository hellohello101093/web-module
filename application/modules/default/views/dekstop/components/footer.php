<div class="clr30"></div>
<div class="supplier">
    <div class="fix">
        <div class="clr10"></div>
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
</div>
<div class="clr30"></div>
<footer>
    <div class="footer-top">
        <div class="fix">
            <div class="name-company"><?php echo $this->mconfig->getByKey('company_name') ?></div>
            <div class="hotline-company">
                <img src="public/default/img/icon/hotline.png" alt=" " />
                <span>HOTLINE: <?php echo $this->mconfig->getByKey('hotline') ?></span>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="footer-mid">
        <div class="fix">
            <ul>
                <li>
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
                    <div class="footer-copyright">
                        &copy; 2008 - 2017 <b>NGUYEN PHAT</b> All rights reserved
                    </div>
                </li>
                <li>
                    <div class="title-item-footer">
                        <span>Dịch vụ cung cấp</span>
                    </div>
                    <?php $services = $this->mservice->getTopService(4); foreach($services as $service) { ?>
                    <div class="item-contact">
                        <div class="icon-row"></div>
                        <div class="text-contact-footer">
                            <a href="dich-vu/chi-tiet/<?php echo $service['link'] ?>"><?php echo $service['title'] ?></a>
                        </div>
                    </div>
                    <?php } ?>
                </li>
                <li>
                    <div class="title-item-footer">
                        <span>Đăng ký nhận thông tin</span>
                    </div>
                    <div class="box-sub">
                        <input type="text" placeholder="Nhập email của bạn" id="user_email" />
                        <button id="subscribe">Gửi</button>
                    </div>
                    <div class="follow">
                        <p>Theo dõi chúng tôi</p>
                        <a href="<?php echo $this->mconfig->getByKey('link_pr') ?>"><img src="public/default/img/icon/pr.png" /></a>
                        <a href="<?php echo $this->mconfig->getByKey('link_fb') ?>"><img src="public/default/img/icon/fb.png" /></a>
                        <a href="<?php echo $this->mconfig->getByKey('link_in') ?>"><img src="public/default/img/icon/in.png" /></a>
                        <a href="<?php echo $this->mconfig->getByKey('link_tw') ?>"><img src="public/default/img/icon/tw.png" /></a>
                        <a href="<?php echo $this->mconfig->getByKey('link_yt') ?>"><img src="public/default/img/icon/yt.png" /></a>
                    </div>
                </li>
            </ul>
            <div class="clr"></div>
        </div>
    </div>
</footer>
</body>
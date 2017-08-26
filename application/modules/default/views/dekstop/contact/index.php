<section>
    <div class="contact-page">
        <div class="fix">
            <div class="breadcrumb border-line-bottom">
                <ul>
                    <li>
                        <a href="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="lien-he">Liên hệ</a>
                    </li>
                </ul>
                <div class="clr"></div>
            </div>
            <div class="clr20"></div>
            <div class="contact-box">
                <div class="contact-map">
                    <div class="list-map">
                        <ul>
                            <li>
                                <iframe
                                  height="400"
                                  width="565"
                                  style="border:none;"
                                  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCJM_HqTUxZFoWhtf7WXL86zWx8yYw699Q&q=<?php echo $this->mconfig->getByKey('address_map') ?>">
                                </iframe>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="contact-form">
                    <div class="form-format">
                        <form id="form-lienhe" method="post">
                            <div class="item-input">
                                <div class="label-input">Họ và tên</div>
                                <div class="input-input"><input name="name" required="" type="text" required="" /></div>
                            </div>
                            <div class="item-input">
                                <div class="label-input">Địa chỉ</div>
                                <div class="input-input"><input name="address" required="" type="text" required="" /></div>
                            </div>
                            <div class="item-input">
                                <div class="label-input">Email</div>
                                <div class="input-input"><input name="email" required="" type="email" required="" /></div>
                            </div>
                            <div class="item-input">
                                <div class="label-input">Điện thoại</div>
                                <div class="input-input"><input name="phone" required="" type="text" required="" /></div>
                            </div>
                            <div class="item-input">
                                <div class="label-input">Nội dung</div>
                                <div class="input-textarea">
                                    <textarea name="message" required=""></textarea>
                                </div>
                            </div>
                            <div class="clr10"></div>
                            <div class="item-button"><button name="signup" value="ok">Gửi</button></div>
                            <div class="clr"></div>
                        </form>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="footer-mid">
        <div class="fix">
            <ul>
                <?php $branchs = $this->mbranch->getAll(); foreach($branchs as $branch) { if ($branch['status'] === 'on') { ?>
                <li>
                    <div class="title-footer-mid"><?php echo $branch['title'] ?></div>
                    <div class="item-contact">
                        <div class="icon-contact-footer icon-address"></div>
                        <div class="text-contact-footer"><?php echo $branch['address'] ?></div>
                    </div>
                    <div class="item-contact">
                        <div class="icon-contact-footer icon-phone"></div>
                        <div class="text-contact-footer"><?php echo $branch['phone'] ?></div>
                    </div>
                    <div class="item-contact">
                        <div class="icon-contact-footer icon-fax"></div>
                        <div class="text-contact-footer"><?php echo $branch['fax'] ?></div>
                    </div>
                    <div class="item-contact">
                        <div class="icon-contact-footer icon-email"></div>
                        <div class="text-contact-footer"><?php echo $branch['email'] ?></div>
                    </div>
                </li>
                <?php } } ?>
            </ul>
            <div class="clr"></div>
        </div>
    </div>
</section>
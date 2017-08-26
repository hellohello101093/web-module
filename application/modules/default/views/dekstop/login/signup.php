<section>
    <div class="box-page">
        <div class="fix">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="">Trang chủ</a>
                    </li>
                    <li>
                        <a>Đăng ký</a>
                    </li>
                </ul>
                <div class="clr"></div>
            </div>
            <div class="page">
                <div class="content-page">
                    <div class="form-format">
                        <form action="dang-ky" method="post">
                            <div class="item-input">
                                <div class="label-input">Username</div>
                                <div class="input-input"><input type="text" required="" name="user_name" value="<?php echo $this->session->userdata('signUpUsername') ?>" /></div>
                            </div>
                            <div class="item-input">
                                <div class="label-input">Mật khẩu</div>
                                <div class="input-input"><input type="password" required="" name="password" value="<?php echo $this->session->userdata('signUpPassword') ?>" /></div>
                            </div>
                            <div class="item-input">
                                <div class="label-input">XN Mật khẩu</div>
                                <div class="input-input"><input type="password" required="" name="password2" value="<?php echo $this->session->userdata('signUpPassword2') ?>" /></div>
                            </div>
                            <div class="item-input">
                                <div class="label-input">Email</div>
                                <div class="input-input"><input type="email" required="" name="email" value="<?php echo $this->session->userdata('signUpEmail') ?>" /></div>
                            </div>
                            <div class="item-input">
                                <div class="label-input">Phone</div>
                                <div class="input-input"><input type="text" required="" name="phone" value="<?php echo $this->session->userdata('signUpPhone') ?>" /></div>
                            </div>
                            <div class="item-input">
                                <div class="label-input">Địa chỉ</div>
                                <div class="input-input"><input type="text" required="" name="address" value="<?php echo $this->session->userdata('signUpAddress') ?>" /></div>
                            </div>
                            <div class="clr10"></div>
                            <div class="item-button"><button name="signup" value="ok">Đăng ký</button></div>
                            <div class="clr"></div>
                        </form>
                    </div>
                </div>
                <div class="menu-page">
                    <div class="box-menu-item">
                        <div class="title-menu-page">Giới thiệu công ty</div>
                        <div class="list-menu-page">
                            <ul>
                                <li><a href="ve-chung-toi">Về chúng tôi</a></li>
                                <li><a href="so-do-to-chuc">Sơ đồ tổ chức</a></li>
                                <li><a href="tam-nhin-su-menh">Tầm nhìn sứ mệnh</a></li>
                                <li><a href="nganh-nghe-kinh-doanh">Ngành nghề kinh doanh</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clr15"></div>
                    <div class="box-menu-item">
                        <div class="title-menu-page">Dịch vụ</div>
                        <div class="list-menu-page">
                            <ul>
                                <?php $type = array(0,1); $services = $this->mservice->getAll($type); foreach($services as $service) { ?>
                                <?php $link = ''; if ($service['type'] == 0) $link = 'dich-vu/chi-tiet/'.$service['link']; else $link = 'dich-vu/'.$service['link']; ?>
                                <li>
                                    <a href="<?php echo $link ?>">
                                        <?php echo $service['title'] ?>
                                    </a>
                                    <?php $childs = $this->mservice->listAllByParent(9999, 0, $service['id']); if(count($childs) > 0) { ?>
                                        <?php foreach($childs as $child) { ?>
                                        <li style="margin-left: 15px;" class="child-item">
                                            <a href="dich-vu/chi-tiet/<?php echo $child['link'] ?>">
                                              <span><?php echo $child['title'] ?></span>
                                            </a>
                                        </li>
                                        <?php } ?>
                                     <?php } ?>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="box-page">
        <div class="fix">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="">Trang chủ</a>
                    </li>
                    <li>
                        <a>Quên mật khẩu</a>
                    </li>
                </ul>
                <div class="clr"></div>
            </div>
            <div class="page">
                <div class="content-page">
                    <div class="form-format">
                        <form action="quen-mat-khau" method="post">
                            <div class="item-input">
                                <div class="label-input">Email tài khoản</div>
                                <div class="input-input"><input type="email" required="" name="email" value="" /></div>
                            </div>
                            <div class="clr10"></div>
                            <div class="item-button"><button name="forgot" value="ok">Gửi Yêu Cầu</button></div>
                            <div class="clr"></div>
                            <div class="item-link">
                                <a href="dang-ky">Đăng ký</a> | <a href="dang-nhap">Đăng nhập</a>
                            </div>
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
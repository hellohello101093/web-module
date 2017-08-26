<section>
    <div class="box-page">
        <div class="fix">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="bang-gia">Bảng giá</a>
                    </li>
                </ul>
                <div class="clr"></div>
            </div>
            <div class="page">
                <div class="content-page">
                    <div class="title-content-page"><?php echo $page['name'] ?></div>
                    <div class="content-content-page ckeditor"><?php echo $page['content'] ?></div>
                </div>
                <div class="menu-page">
                    <div class="box-menu-item">
                        <div class="title-menu-page">Giới thiệu công ty</div>
                        <div class="list-menu-page">
                            <ul>
                                <li class="<?php if($page['code'] === 'vechungtoi') echo 'active'; ?>"><a href="ve-chung-toi">Về chúng tôi</a></li>
                                <li class="<?php if($page['code'] === 'sodotochuc') echo 'active'; ?>"><a href="so-do-to-chuc">Sơ đồ tổ chức</a></li>
                                <li><a href="tam-nhin-su-menh">Tầm nhìn sứ mệnh</a></li>
                                <li class="<?php if($page['code'] === 'nganhnghekinhdoanh') echo 'active'; ?>"><a href="nganh-nghe-kinh-doanh">Ngành nghề kinh doanh</a></li>
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
                    <div class="clr15"></div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="box-page">
        <div class="fix">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="tin-tuc">Tin tức</a>
                    </li>
                    <li>
                        <a><?php echo $data['title'] ?></a>
                    </li>
                </ul>
                <div class="clr"></div>
            </div>
            <div class="page">
                <div class="content-page">
                    <div class="title-content-page"><?php echo $data['title'] ?></div>
                    <div class="content-content-page">
                        <div class="ckeditor"><?php echo $data['content'] ?></div>
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
                    <div class="clr15"></div>
                </div>
                <div class="clr"></div>
            </div>
            <div class="clr20"></div>
            <div class="other-news">
                <div class="title-other">Tin tức khác</div>
                <div class="list-others-news">
                    <ul>
                        <?php foreach($others as $news) { ?>
                        <li>
                            <a href="tin-tuc/chi-tiet/<?php echo $news['link'] ?>">
                                <div class="image-news">
                                    <img src="public/duan/<?php echo $news['avatar'] ?>" alt=" " />
                                </div>
                                <div class="title-news"><?php echo $news['title'] ?></div>
                                <div class="desc-news"><?php echo $news['desc'] ?></div>
                                <div class="time-news"><?php echo date('d/m/Y', $news['created']) ?></div>
                                <div class="seemore">Chi tiết</div>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php if(count($others) > 3) { ?>
                    <div class="button-carousel">
                        <div class="prev"><img src="public/default/img/icon/prev.png" alt=" " /></div>
                        <div class="next"><img src="public/default/img/icon/next.png" alt=" " /></div>
                    </div>
                    <?php } ?>
                    <div class="clr"></div>
                </div>
            </div>
        </div>
    </div>
</section>
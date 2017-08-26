<section>
    <div class="news">
        <div class="fix">
            <div class="breadcrumb border-line-bottom">
                <ul>
                    <li>
                        <a href="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="tin-tuc">Tin tức</a>
                    </li>
                    <?php if(isset($tag_name) && $tag_name != '') { ?>
                    <li>
                        <a>Tags</a>
                    </li>
                    <li>
                        <a><?php echo $tag_name ?></a>
                    </li>
                    <?php } ?>
                </ul>
                <div class="clr"></div>
            </div>
            <div class="clr20"></div>
            <div class="list-news">
                <ul>
                    <?php foreach($data as $val){ ?>
                    <li>
                        <a href="tin-tuc/chi-tiet/<?php echo $val['link'] ?>">
                            <div class="image-news">
                                <img src="public/duan/<?php echo $val['avatar'] ?>" alt=" " />
                            </div>
                            <div class="title-news"><?php echo $val['title'] ?></div>
                            <div class="desc-news"><?php echo $val['desc'] ?></div>
                            <div class="time-news"><?php echo date('d/m/Y', $val['created']) ?></div>
                            <div class="seemore">Chi tiết</div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <div class="clr30"></div>
            </div>
            <?php if (isset($pagination)) { ?>
            <div class="phantrang">
                <ul>
                    <?php echo $pagination ?>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
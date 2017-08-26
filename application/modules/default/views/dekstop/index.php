<section>
    <div class="activity">
        <div class="fix">
            <div class="title-component"><span>Tiêu chí hoạt động</span></div>
            <div class="list-activities">
                <ul>
                    <li>
                        <div class="icon-activity">
                            <img src="public/default/img/icon/fast.png" alt=" " />
                        </div>
                        <div class="text-activity">Nhanh</div>
                        <div class="desc-activity">
                            <?php echo $this->mconfig->getByKey('fast_criteria') ?>
                        </div>
                    </li>
                    <li>
                        <div class="icon-activity">
                            <img src="public/default/img/icon/price.png" alt=" " />
                        </div>
                        <div class="text-activity">Giá cả hợp lý</div>
                        <div class="desc-activity">
                            <?php echo $this->mconfig->getByKey('price_criteria') ?>
                        </div>
                    </li>
                    <li>
                        <div class="icon-activity">
                            <img src="public/default/img/icon/quality.png" alt=" " />
                        </div>
                        <div class="text-activity">Chất lượng, uy tín</div>
                        <div class="desc-activity">
                            <?php echo $this->mconfig->getByKey('quality_criteria') ?>
                        </div>
                    </li>
                </ul>
                <div class="clr"></div>
            </div>
        </div>
    </div>
    <div class="clr25"></div>
    <div class="services-index">
        <div class="fix">
            <div class="title-component">
                <span>Dịch vụ Nguyên Phát</span>
            </div>
            <div class="list-services-index">
                <ul>
                    <?php $services = $this->mservice->getTopService(999); foreach($services as $service) { $link = 'dich-vu/chi-tiet/'.$service['link']; if ($service['type'] == 1) $link = 'dich-vu/'.$service['link']; ?>
                    <li>
                        <a href="<?php echo $link ?>">
                            <div class="image-service">
                                <img src="public/service/<?php echo $service['avatar'] ?>" alt=" " />
                            </div>
                            <div class="title-service">
                                <img src="public/service/<?php echo $service['icon'] ?>" alt=" " />
                                <?php echo $service['title'] ?>
                            </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="clr5"></div>
</section>
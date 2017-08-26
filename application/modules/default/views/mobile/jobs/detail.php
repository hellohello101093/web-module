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
            <div class="content-duan-detail ckeditor content-text">
                <?php echo $data['content'] ?>
            </div>
            <div class="quote-button">
                <a href="nop-ho-so/<?php echo $data['link'] ?>">
                    Nộp Hồ Sơ
                </a>
            </div>
        </div>
        <div class="detail-right">
            <div class="title-duan-other">
                <span>Tuyển dụng khác</span>
            </div>
            <?php $data = $this->mjobs->listAll(10, 0, $data['id']); if (count($data) > 0) { ?>
            <div class="table-tuyendung">
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Nội Dung</th>
                        <th>Số lượng</th>
                        <th>Hạn nộp hồ sơ</th>
                    </tr>
                    <?php $i = 1; foreach($data as $val) { ?>
                    <tr>
                        <td><a href="tuyen-dung/chi-tiet/<?php echo $val['link'] ?>"><?php echo $i; $i++; ?></a></td>
                        <td><a href="tuyen-dung/chi-tiet/<?php echo $val['link'] ?>"><?php echo $val['title'] ?></a></td>
                        <td><a href="tuyen-dung/chi-tiet/<?php echo $val['link'] ?>"><?php echo $val['quantity'] ?></a></td>
                        <td><a href="tuyen-dung/chi-tiet/<?php echo $val['link'] ?>"><?php echo $val['expired'] ?></a></td>                                
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <?php } ?>
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

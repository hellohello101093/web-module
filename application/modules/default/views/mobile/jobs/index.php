<section>
  <div class="fix">
    <div class="breabcrumb">
        <a href="">Trang chủ</a>
        <img src="public/default/img/mobile/arrow.png" alt=" " class="arrow" />
        <a>Tuyển dụng</a>
        <img src="public/default/img/mobile/after.png" alt=" " class="after" />
      </div>
    <div class="clr"></div>
    <div class="page-content">
      <div class="content-page">
        <div class="title-content-page"><?php echo $page['name'] ?></div>
        <div class="content-content-page ckeditor">
            <?php echo $page['content'] ?>
        </div>
        <div class="clr15"></div>
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
        <div class="phantrang">
            <ul>
                <?php echo $pagination ?>
            </ul>
        </div>
    </div>
    </div>
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

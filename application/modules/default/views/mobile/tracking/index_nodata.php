<section>
    <div class="fix">
      <div class="breabcrumb">
        <a href="">Trang chủ</a>
        <img src="public/default/img/mobile/arrow.png" alt=" " class="arrow" />
        <a>Kiểm tra vận đơn</a>
        <img src="public/default/img/mobile/after.png" alt=" " class="after" />
      </div>
      <div class="tracking-box">
        <?php if (isset($response)) { ?>
        <div class="response"><?php echo $response ?></div>
        <?php } ?>
        <div class="box-check-vandon">
            <div class="check-transport check-transport-relative">
            <form action="kiem-tra-van-don" method="post">
                <div class="title-check-transport">Kiểm tra vận đơn</div>
                <div class="input-check-transport">
                    <input type="text" name="compose_number" placeholder="Vui lòng nhập mã tracking" required="" />
                </div>
                <div class="button-check-transport">
                    <button>Tìm kiếm</button>
                </div>
            </form>
            </div>
            <div class="clr"></div>
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

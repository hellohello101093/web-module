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
            <div class="clr15"></div>
            <?php
                $status = '';
                if ($data['status'] === '0') {
                    $status = 'Chưa nhận hàng';
                } else if ($data['status'] === '1') {
                    $status = 'Đã nhận hàng';
                } else if ($data['status'] === '2') {
                    $status = 'Đã nhận phiếu';
                } else {
                    $status = 'Đang vận chuyển';
                }
            ?>
            <div class="info-tracking">
                <table>
                    <tr>
                        <td>
                            <img src="public/default/img/icon/list2.png" alt=" " />
                            <span>Mã vận chuyển: <b><?php echo $data['compose_number'] ?></b></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="public/default/img/icon/list2.png" alt=" " />
                            <span>Tình trạng: <b><?php echo $status ?></b></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="public/default/img/icon/list2.png" alt=" " />
                            <span>Vận chuyển ngày: <?php echo $data['date_start'] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="public/default/img/icon/list2.png" alt=" " />
                            <?php if ($data['product_delivered'] !== '0') { ?>
                            <span>Ngày giao hàng: <?php echo date('d-m-Y', $data['product_delivered']) ?> | Giờ: <?php echo date('H:i', $data['product_delivered']) ?></span>
                            <?php } else { ?>
                            <span>Chưa giao hàng</span>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="public/default/img/icon/list2.png" alt=" " />
                            <span>Ngày dự tính đến: <?php echo $data['date_end'] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="public/default/img/icon/list2.png" alt=" " />
                            <span>Mã khách hàng: Cus-<?php echo $data['customer_id'] ?></span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="clr5"></div>
            <div class="info-schedule-tracking">
                <table>
                    <tr>
                        <th>Ngày</th>
                        <th>Giờ</th>
                        <th>Vị Trí</th>
                    </tr>
                    <?php $schedules = json_decode($data['notes'], true); if (count($schedules) > 0) { foreach($schedules as $note) { $note_data = json_decode($note, true); ?>
                    <tr>
                        <td><?php echo $note_data['date'] ?></td>
                        <td><?php echo $note_data['time'] ?></td>
                        <td class="location"><?php echo $note_data['location'] ?><img data-note="<?php echo $note_data['text'] ?>" src="public/default/img/icon/note.png" alt=" " class="note-img" /></td>
                    </tr>
                    <?php } } else { ?>
                    <tr>
                        <td colspan="3">Dữ liệu đang cập nhật</td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="clr10"></div>
            <div class="popup-info">
                <div class="content-popup">
                    <span><?php echo $note_data['text'] ?></span>
                    <img src="public/default/img/icon/close.png" alt=" " />
                </div>
                <div class="desc-popup">
                    <span>POPUP GHI CHÚ</span>
                </div>
            </div>
            <div class="clr15"></div>
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

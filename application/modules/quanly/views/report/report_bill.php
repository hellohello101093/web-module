<div class="table-responsive">
    <table class="table table-bordered table-hover">

        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>Số Soạn Hàng</th>
                <th>Mã Hàng</th>
                <th>Tên Hàng</th>
                <th>Số Lượng</th>
                <th>Phiếu Xuất Tổng</th>
                <th>Xe Đi</th>
                <th>Ngày Xuất</th>
                <th>Nhận Hàng</th>
                <th>Nhận Phiếu</th>
                <th>Người Tạo</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count ($info) > 0) { foreach($info as $val){ $product = $this->mproduct->getByCode($val['product_id']); $verhicle = $this->mverhicle->getById($val['verhicle_id']); ?>
                <tr>
                    <td><?php echo $val['compose_number'] ?></td>
                    <td><?php echo $product['code'] ?></td>
                    <td><?php echo $product['name'] ?></td>
                    <td><?php echo $val['quantity'] ?></td>
                    <td><?php echo $val['total_votes'] ?></td>
                    <td><?php echo $verhicle['verhicle_number'] ?></td>
                    <td><?php echo date('d-m-Y', $val['created']) ?></td>
                    <td><?php echo $val['product_delivered'] != 0 ? date('d-m-Y', $val['product_delivered']) : 'Not Yet'; ?></td>
                    <td><?php echo $val['bill_delivered'] != 0 ? date('d-m-Y', $val['bill_delivered']) : 'Not Yet'; ?></td>
                    <td>
                        <?php $creator = $this->muser->getUserById($val['creator_id']); echo $creator['name'] ?>
                    </td>
                </tr>
            <?php } } else { ?>
                <tr>
                    <td colspan="10" style="text-align: center;">Opps! No Data!</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </table>
    <?php if (count($info) > 0) { ?>
    <span class="input-group-btn"><a href="<?php echo base_url() ?>quanly/report/export?table=<?php echo $table ?>&start=<?php echo $start ?>&end=<?php echo $end ?>" class="btn red">Xuất Báo Cáo</a></span>
    <?php } ?>
</div>
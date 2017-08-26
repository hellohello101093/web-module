<div class="table-responsive">
    <table class="table table-bordered table-hover">

        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên Tài Xế</th>
                <th>Mã Bằng Lái</th>
                <th>Điện Thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày Tạo</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($info as $val){ ?>
                <tr>
                    <td><?php echo $val['id'] ?></td>
                    <td><?php echo $val['name'] ?></td>
                    <td><?php echo $val['code'] ?></td>
                    <td><?php echo $val['phone'] ?></td>
                    <td><?php echo $val['address'] ?></td>
                    <td><?php echo date('d-m-Y', $val['created']) ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </table>
    <?php if (count($info) > 0) { ?>
    <span class="input-group-btn"><a href="<?php echo base_url() ?>quanly/report/export?table=<?php echo $table ?>&start=<?php echo $start ?>&end=<?php echo $end ?>" class="btn red">Xuất Báo Cáo</a></span>
    <?php } ?>
</div>
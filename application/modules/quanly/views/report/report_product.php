<div class="table-responsive">
    <table class="table table-bordered table-hover">

        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên Hàng Hóa</th>
                <th>Mã Hàng Hóa</th>
                <th>Mã Nhà Phân Phối</th>
                <th>Nhà Phân Phối</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($info as $val){ ?>
                <tr>
                    <td><?php echo $val['id'] ?></td>
                    <td><?php echo $val['name'] ?></td>
                    <td><?php echo $val['code'] ?></td>
                    <td><?php echo $val['supplier_code'] ?></td>
                    <td><?php echo $val['supplier_name'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </table>
    <?php if (count($info) > 0) { ?>
    <span class="input-group-btn"><a href="<?php echo base_url() ?>quanly/report/export?table=<?php echo $table ?>&start=<?php echo $start ?>&end=<?php echo $end ?>" class="btn red">Xuất Báo Cáo</a></span>
    <?php } ?>
</div>
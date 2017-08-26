<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-coffee"></i>Danh Sách Phiếu Giao Hàng
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse">
            </a>
            <a href="javascript:;" class="reload">
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <?php if($this->session->flashdata('ses_flash')!=""){
            echo "<div class='alert alert-success'>";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "<h4>".$this->session->flashdata('ses_flash')." Thành Công!</h4>";
            echo "Bạn đã ".$this->session->flashdata('ses_flash')." thành công 1 Phiếu Giao Hàng.";
            echo "   </div>";
        } ?>
        <div style='margin-left:20px;margin-top:10px;'>

            <div class='row' style="margin-bottom: 10px;">
                <?php $user = $this->session->userdata('user'); if ($user['user_type'] !== 'member') { ?>
                <div class="col-md-2">
                    <a href="<?php echo base_url() ?>quanly/bill/add"  class="btn blue"> Thêm Phiếu <i class='fa-pencil fa'></i></a>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo base_url() ?>quanly/bill/import"  class="btn green"> Nhập CSV <i class='fa-pencil fa'></i></a>
                </div>
                <?php } ?>
                <div class="col-md-1">
                    <a href="<?php echo base_url() ?>quanly/bill/listall"  class="btn blue"> Clear  <i class='fa-pencil fa'></i></a>
                </div>
                <form action="<?php echo base_url() ?>quanly/bill/listall" method="get">
                    <div class="col-md-4">
                        <div class="input-group" >
                            <input type="text" class="form-control" name="s" value="<?php echo $s ?>" />
                            <span class="input-group-btn"><button class="btn blue" type="submit">Tìm Kiếm</button></span>
                        </div>
                    </div>
                </form>

            </div>

        </div>
        <form action="<?php echo base_url() ?>quanly/bill/dellist" method="post" id="delForm">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">

                    <table class='table table-bordered'>
                        <thead>
                        <tr>
                            <th style="width: 30px"><button type="submit" class="btn red" ><i class="fa fa-trash-o"></i></button></th>
                            <th></th>
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
                        <?php foreach($info as $val){ $product = $this->mproduct->getByCode($val['product_id']); $verhicle = $this->mverhicle->getById($val['verhicle_id']); ?>
                            <tr>
                                <td style='text-align: center'>
                                    <input type="checkbox" name="del[]" value="<?php echo $val['id'] ?>">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-list"></i> <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <?php if ($user['user_id'] === $val['creator_id'] || $user['user_type'] === 'administrator') { ?>
                                            <li><a href="<?php echo base_url()."quanly/bill/edit/".$val['id']?>"><i class="fa fa-pencil"></i> Sửa</a></li>
                                            <li><a href="<?php echo base_url()."quanly/bill/del/".$val['id']?>"  class="delButton"><i class="fa fa-trash-o"></i> Xóa</a></li>
                                            <?php } else { ?>
                                            <li><a href="<?php echo base_url()."quanly/bill/view/".$val['id']?>"><i class="fa fa-pencil"></i> Xem</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </td>
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
                        <?php } ?>
                        </tbody>
                    </table>
                    <div class="right" >
                        <ul class="pagination">
                            <?php echo $pagination ?>
                        </ul>
                    </div>
                </table>
            </div>
        </form>
    </div>
</div>






	
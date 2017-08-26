<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i>Chi Tiết Báo Giá
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse">
            </a>
            <a href="javascript:;" class="reload">
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <h2 class="col-md-4">Thông Tin Khách Hàng</h2>
            <div  class="col-md-3" style="margin-top:30px">
                <input type="hidden" value="<?php echo $info['id'] ?>" id="cart-id">
                <select id="cart-status"  >
                    <option value="0" <?php echo (isset($info)&&$info['status']==0)?"selected":"" ?>>Đã Nhận</option>
                    <option value="1" <?php echo (isset($info)&&$info['status']==1)?"selected":"" ?>>Đang Xử Lý</option>
                    <option value="3" <?php echo (isset($info)&&$info['status']==2)?"selected":"" ?>>Hoàn Thành</option>
                    <option value="4" <?php echo (isset($info)&&$info['status']==3)?"selected":"" ?>>Hủy Báo Giá</option>

                </select>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <table class='table table-bordered'>
                    <?php
                        $user_info = json_decode($info['user_info'],true);
                        $user = $this->muser->getUserById($info['user_id']);
                        $service = $this->mservice->getById($info['service_id']);
                    ?>

                    <tr>
                        <th>User ID</th>
                        <td><?php if($info['user_id']!=0) echo $user['user_id']; else echo 'GUEST'; ?></td>
                        <th>Tài Khoản</th>
                        <td><?php if($info['user_id']!=0) echo $user['user_name']; else echo 'GUEST'; ?></td>
                    </tr>
                    <tr>
                        <th>Họ Tên</th>
                        <td><?php echo $user_info['name'] ?></td>
                        <th>Email</th>
                        <td><?php echo $user_info['email'] ?></td>
                    </tr>
                    <tr>
                        <th>Địa Chỉ</th>
                        <td><?php echo $user_info['address'] ?></td>
                        <th>Điện Thoại</th>
                        <td><?php echo $user_info['phone'] ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Ngày Báo Giá</th>
                        <td><?php echo date('H:i:s  d-m-Y', $info['created']) ?></td>
                    </tr>

                </table>
            </table>
        </div>
        <h2>Chi Tiết Đơn Hàng</h2>
        <div class="row">
            <div class="col-md-6">
                <table class='table'>
                    <tr>
                        <th class="col-md-3">Mã Đơn Hàng</th>
                        <td><?php echo 'ORD-'.$info['id'] ?></td>
                    </tr>
                    <tr>
                        <th>Loại Khách Hàng</th>
                        <td><?php echo $info['user_id'] != 0  ? 'Thành viên Website' : 'Khách'?></td>
                    </tr>
                    <tr>
                        <th>Dịch Vụ</th>
                        <?php if (isset($service['link'])){ ?>
                        <td><a href="<?php echo base_url() ?>dich-vu/chi-tiet/<?php echo $service['link'] ?>" target="_blank"><?php echo $service['title'] ?></a></td>
                        <?php } else { ?>
                        <td><a>Dịch vụ đã bị xóa</a></td>
                        <?php } ?>
                    </tr>
                </table>
            </div>
        </div>

        <a href="<?php echo base_url() ?>admin/order/listall"  class="btn btn-primary" > Quay Lại  <i class='fa-back fa'></i></a>

    </div>

</div>
<script>
    $(document).ready(function(){
        $("#cart-status").change(function(){
            var cart_id = $("#cart-id").val();
            var value = $(this).val();
            $.post( url + "admin/order/changeStatus", { id : cart_id,data : value })

        })
    })
</script>


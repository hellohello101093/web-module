<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-coffee"></i>Danh Sách Báo Giá
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse">
            </a>
            <a href="javascript:;" class="reload">
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">


<?php if($this->session->flashdata('ses_flash')!=""){
    echo "<div class='alert alert-success'>";
    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
    echo "<h4>".$this->session->flashdata('ses_flash')." Thành Công!</h4>";
    echo "Bạn đã ".$this->session->flashdata('ses_flash')." thành công 1 Báo Giá .";
    echo "   </div>";
} ?>
<table class='table table-bordered'>
    <thead>
    <tr>
        <th></th>
        <th>ID</th>
        <th>Dịch Vụ</th>
        <th>Loại Khách Hàng</th>
        <th>Tình Trạng</th>
        <th>Ngày Báo Giá</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($info as $val){ ?>
        <tr>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-list"></i> <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()."admin/order/detail/".$val['id']?>"><i class="fa fa-pencil"></i> Chi tiết</a></li>
                        <li><a href="<?php echo base_url()."admin/order/del/".$val['id']?>" class="delButton"><i class="fa fa-trash-o"></i> Xóa</a></li>
                    </ul>
                </div>
            </td>
            <td><?php echo $val['id'] ?></td>
            <td><?php $service = $this->mservice->getById($val['service_id']); echo isset($service['title']) ? $service['title'] : 'No Data' ?></td>
            <td><?php echo $val['user_id'] != 0 ? 'Thành Viên Website' : 'Khách' ?></td>
            <td>
                <?php if($val['status'] == 0) echo 'Đã nhận'; else if($val['status']==1) echo 'Đang Xử Lý'; else if($val['status']==2) echo 'Hoàn Thành'; else echo 'Hủy Báo Giá'; ?>
            </td>
            <td><?php echo date("H:i:s  d-m-Y",$val['created']) ?></td>


        </tr>
    <?php } ?>
    </tbody>
</table>
<div class="right" >
    <ul class="pagination">
        <?php echo $pagination ?>
    </ul>
</div>






	
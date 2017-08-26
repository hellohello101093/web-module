<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-coffee"></i>Danh Sách Nhân Viên
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
    echo "Bạn đã ".$this->session->flashdata('ses_flash')." thành công 1 nhân viên.";
    echo "   </div>";
} ?>
<div style='margin-left:20px;margin-top:10px;'>
    <div class='span7' style="margin-bottom: 10px;">
        <a href="<?php echo base_url() ?>quanly/staff/add"  class="btn btn-primary"> Thêm Nhân Viên  <i class='fa-pencil fa'></i></a>
    </div>

</div>
<table class='table table-bordered'>
    <thead>
    <tr>
        <th></th>
        <th>Tài Khoản</th>
        <th>Họ Tên</th>
        <th>Email</th>
        <th>Địa Chỉ</th>
        <th>Điện Thoại</th>
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
                        <li><a href="<?php echo base_url()."quanly/staff/edit/".$val['user_id']?>"><i class="fa fa-pencil"></i> Sửa</a></li>
                        <li><a href="<?php echo base_url()."quanly/staff/del/".$val['user_id']?>"  class="delButton"><i class="fa fa-trash-o"></i> Xóa</a></li>
                    </ul>
                </div>
            </td>
            <td><?php echo $val['user_name'] ?></td>
            <td><?php echo $val['name'] ?></td>
            <td><?php echo $val['user_email'] ?></td>
            <td><?php echo $val['user_address'] ?></td>
            <td><?php echo $val['user_phone']?></td>


        </tr>
    <?php } ?>
    </tbody>
</table>
<div class="right" >
    <ul class="pagination">
        <?php echo $pagination ?>
    </ul>
</div>





	
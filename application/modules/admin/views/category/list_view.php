<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-coffee"></i>Danh Sách Danh Mục
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
    echo "Bạn đã ".$this->session->flashdata('ses_flash')." thành công 1 Danh Mục .";
    echo "   </div>";
} ?>
<div style='margin-left:20px;margin-top:10px;'>
    <div class='span7 col-md-2' style="margin-bottom: 10px;">
        <a href="<?php echo base_url() ?>admin/category/add"  class="btn btn-primary"> Thêm Danh Mục  <i class='fa-pencil fa'></i></a>
    </div>
</div>
<table class='table table-bordered'>
    <thead>
    <tr>
        <th></th>
        <th>ID</th>
        <th>Tiêu Đề</th>
        <th>Link</th>
        <th>Ảnh Đại Diện</th>
        <th>Sắp Xếp</th>
        <th>Ngày Tạo</th>
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
                        <li><a href="<?php echo base_url()."admin/category/edit/".$val['id']?>"><i class="fa fa-pencil"></i> Sửa</a></li>
                        <li><a href="<?php echo base_url()."admin/category/del/".$val['id']?>"  class="delButton"><i class="fa fa-trash-o"></i> Xóa</a></li>
                    </ul>
                </div>
            </td>
            <td><?php echo $val['id'] ?></td>
            <td><?php echo $val['name'] ?></td>
            <td><?php echo $val['link'] ?></td>
            <td><img src="<?php echo base_url() ?>public/category/<?php echo $val['image'] ?>" alt=" " width="100" /></td>
            <td>
                <input class="ajax-sort" id="<?php echo $val['id'] ?>" size="4" value="<?php echo $val['sort'] ?>" style="text-align: center" >
            </td>
            <td><?php echo date("H:i:s  d-m-Y",$val['created']) ?></td>


        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    $(document).ready(function(){
        $('.ajax-sort').change(function(){
            var id = $(this).attr('id');
            var value = $(this).val();

            $.post( url + "admin/category/sort", { id: id, value: value })
                .done(function( data ) {
                    location.reload();
                });
        })
    })
</script>
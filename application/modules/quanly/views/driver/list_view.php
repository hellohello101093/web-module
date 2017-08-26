<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-coffee"></i>Danh Sách Tài Xế
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
            echo "Bạn đã ".$this->session->flashdata('ses_flash')." thành công 1 Tài Xế.";
            echo "   </div>";
        } ?>
        <div style='margin-left:20px;margin-top:10px;'>

            <div class='row' style="margin-bottom: 10px;">
                <div class="col-md-2">
                    <a href="<?php echo base_url() ?>quanly/driver/add"  class="btn blue"> Thêm Tài Xế <i class='fa-pencil fa'></i></a>
                </div>
                <div class="col-md-1">
                    <a href="<?php echo base_url() ?>quanly/driver/listall"  class="btn blue"> Clear  <i class='fa-pencil fa'></i></a>
                </div>
                <form action="<?php echo base_url() ?>quanly/driver/listall" method="get">
                    <div class="col-md-4">
                        <div class="input-group" >
                            <input type="text" class="form-control" name="s" value="<?php echo $s ?>" />
                            <span class="input-group-btn"><button class="btn blue" type="submit">Tìm Kiếm</button></span>
                        </div>
                    </div>
                </form>

            </div>

        </div>
        <form action="<?php echo base_url() ?>quanly/driver/dellist" method="post" id="delForm">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">

                    <table class='table table-bordered'>
                        <thead>
                        <tr>
                            <th style="width: 30px"><button type="submit" class="btn red" ><i class="fa fa-trash-o"></i></button></th>
                            <th></th>
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
                                <td style='text-align: center'>
                                    <input type="checkbox" name="del[]" value="<?php echo $val['id'] ?>">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-list"></i> <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo base_url()."quanly/driver/edit/".$val['id']?>"><i class="fa fa-pencil"></i> Sửa</a></li>
                                            <li><a href="<?php echo base_url()."quanly/driver/del/".$val['id']?>"  class="delButton"><i class="fa fa-trash-o"></i> Xóa</a></li>
                                        </ul>
                                    </div>
                                </td>
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






	
<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i><?php echo  (isset($info))?"Sửa ":"Thêm " ?>Hàng Hóa
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse">
            </a>
            <a href="javascript:;" class="reload">
            </a>

        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action='<?php echo base_url()?>quanly/product/<?php echo $action ?>/<?php echo  (isset($info['id']))?$info['id']:"" ?>' class="form-horizontal" method="post" enctype="multipart/form-data" id="a">

            <div class="form-body">
                <?php if(validation_errors()!=''){ ?>
                    <div class="note note-danger" >
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <?php echo validation_errors() ?>
                    </div>
                <?php } ?>
                <div class="col-md-offset-2 col-md-10" style="margin-bottom: 20px ; margin-top: 20px">
                    Ghi Chú : Những trường đánh dấu (*) là những trường bắt buộc .
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Tên Hàng Hóa (*)</label>
                    <div class="col-md-4">
                        <input type="text" id='name' required="required" name='name' placeholder="Tên Hàng Hóa ..." class='form-control' value='<?php
                        echo (isset($info))?$info['name']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Mã Hàng Hóa (*)</label>
                    <div class="col-md-4">
                        <input type="text" id='code' required="required" name='code' placeholder="Mã Hàng Hóa ..." class='form-control' value='<?php
                        echo (isset($info))?$info['code']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Tên Nhà Phân Phối (*)</label>
                    <div class="col-md-4">
                        <input type="text" id='supplier_name' required="required" name='supplier_name' placeholder="Tên Nhà Phân Phối ..." class='form-control' value='<?php
                        echo (isset($info))?$info['supplier_name']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Mã Nhà Phân Phối (*)</label>
                    <div class="col-md-4">
                        <input type="text" id='supplier_code' required="required" name='supplier_code' placeholder="Mã Nhà Phân Phối ..." class='form-control' value='<?php
                        echo (isset($info))?$info['supplier_code']:"" ?>' />
                    </div>
                </div>
            </div>
            <div class="form-actions nobg fluid">
                <div class="col-md-offset-3 col-md-9">
                    <a href="<?php if(isset($info) && isset($info['is_copy']) && $info['is_copy']=='true') echo base_url().'quanly/product/del/'.$info['id']; else echo base_url().'quanly/product/listall'; ?>"  class="btn default">Hủy bỏ</a>
                    <button class="btn green" id='btn-ok' name='ok' type='submit'>Xác Nhận</button>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>







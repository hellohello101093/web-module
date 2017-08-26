<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i><?php echo  (isset($info))?"Sửa ":"Thêm " ?>Tài Xế
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
        <form action='<?php echo base_url()?>quanly/driver/<?php echo $action ?>/<?php echo  (isset($info['id']))?$info['id']:"" ?>' class="form-horizontal" method="post" enctype="multipart/form-data" id="a">

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
                    <label class="col-md-2 control-label">Tên Tài Xế (*)</label>
                    <div class="col-md-4">
                        <input type="text" id='name' required="required" name='name' placeholder="Tên Tài Xế ..." class='form-control' value='<?php
                        echo (isset($info))?$info['name']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Mã Bằng Lái (*)</label>
                    <div class="col-md-4">
                        <input type="text" id='code' required="required" name='code' placeholder="Mã Bằng Lái ..." class='form-control' value='<?php
                        echo (isset($info))?$info['code']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Điện Thoại (*)</label>
                    <div class="col-md-4">
                        <input type="text" id='phone' required="required" name='phone' placeholder="Điện Thoại ..." class='form-control' value='<?php
                        echo (isset($info))?$info['phone']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Địa Chỉ (*)</label>
                    <div class="col-md-4">
                        <input type="text" id='address' required="required" name='address' placeholder="Địa Chỉ ..." class='form-control' value='<?php
                        echo (isset($info))?$info['address']:"" ?>' />
                    </div>
                </div>
            </div>
            <div class="form-actions nobg fluid">
                <div class="col-md-offset-3 col-md-9">
                    <a href="<?php if(isset($info) && isset($info['is_copy']) && $info['is_copy']=='true') echo base_url().'quanly/driver/del/'.$info['id']; else echo base_url().'quanly/driver/listall'; ?>"  class="btn default">Hủy bỏ</a>
                    <button class="btn green" id='btn-ok' name='ok' type='submit'>Xác Nhận</button>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>







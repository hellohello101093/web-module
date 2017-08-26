<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i><?php echo  (isset($info))?"Sửa ":"Thêm " ?>Xe
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
        <form action='<?php echo base_url()?>quanly/verhicle/<?php echo $action ?>/<?php echo  (isset($info['id']))?$info['id']:"" ?>' class="form-horizontal" method="post" enctype="multipart/form-data" id="a">

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
                    <label class="col-md-2 control-label">Số Xe (*)</label>
                    <div class="col-md-4">
                        <input type="text" id='verhicle_number' required="required" name='verhicle_number' placeholder="Số Xe ..." class='form-control' value='<?php
                        echo (isset($info))?$info['verhicle_number']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Số ReMoc (*)</label>
                    <div class="col-md-4">
                        <input type="text" id='rmoc_number' required="required" name='rmoc_number' placeholder="Số ReMoc ..." class='form-control' value='<?php
                        echo (isset($info))?$info['rmoc_number']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Tài Xế (*)</label>
                    <div class="col-md-4">
                        <select id='driver_id' name='driver_id'class='form-control' >
                            <?php $drivers = $this->mdriver->getAll(); foreach($drivers as $driver) { ?>
                            <option value="<?php echo $driver['id'] ?>" <?php echo (isset($info['driver_id']) && $info['driver_id'] === $driver['id']) ? 'selected' : ''; ?>><?php echo $driver['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-actions nobg fluid">
                <div class="col-md-offset-3 col-md-9">
                    <a href="<?php if(isset($info) && isset($info['is_copy']) && $info['is_copy']=='true') echo base_url().'quanly/verhicle/del/'.$info['id']; else echo base_url().'quanly/verhicle/listall'; ?>"  class="btn default">Hủy bỏ</a>
                    <button class="btn green" id='btn-ok' name='ok' type='submit'>Xác Nhận</button>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>







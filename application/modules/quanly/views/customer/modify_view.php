
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i><?php echo  (isset($info))?"Sửa ":"Thêm " ?>Khách Hàng
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
            <form action='<?php echo base_url()?>quanly/customer/<?php echo $action ?>/<?php echo  (isset($info) && isset($info['user_id']))?$info['user_id']:"" ?>' class="form-horizontal" method="post">

                <div class="form-body">
                    <?php if(validation_errors()!=''){ ?>
                    <div class="note note-danger" >
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <?php echo validation_errors() ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tài khoản (*)</label>
                        <div class="col-md-4">
                            <input type="text" id='user_name' name='user_name' required="required" placeholder="Tài Khoản…" class='form-control' value='<?php
                            echo (isset($info))?$info['user_name']:"" ?>'>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Họ Tên (*)</label>
                        <div class="col-md-4">
                            <input type="text" id='name' name='name' required="required" placeholder=" Họ Tên…" class='form-control'  value='<?php
                            echo (isset($info))?$info['name']:"" ?>'>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Mật khẩu (*)</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="password" id='user_pass' required="required" name='user_pass' placeholder="Mật khẩu…" class='form-control'  value='<?php
                                echo (isset($info))?$info['user_pass']:"" ?>'>
															<span class="input-group-addon">
																<i class="fa fa-user"></i>
															</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Email (*)</label>
                        <div class="col-md-4">
                            <div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-envelope"></i>
															</span>
                                <input type="text" id='user_email' required="required" name='user_email' placeholder="Email…" class='form-control'  value='<?php
                                echo (isset($info))?$info['user_email']:"" ?>'>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Địa chỉ (*)</label>
                        <div class="col-md-4">
                            <input type="text" id='user_address' required="required" name='user_address' placeholder="Địa chỉ …" class='form-control'  value='<?php
                            echo (isset($info))?$info['user_address']:"" ?>'>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Điện thoại (*)</label>
                        <div class="col-md-4">
                            <input type="text" id='user_phone' name='user_phone' required="required" placeholder="Điện thoại …" class='form-control'  value='<?php
                            echo (isset($info))?$info['user_phone']:"" ?>'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Chi Nhánh (*)</label>
                        <div class="col-md-4">
                            <select  id='user_branch' name='user_branch'class='form-control' >
                                <option  <?php echo (isset($info)&&$info['user_branch']=='hn')?"selected":"" ?> value="hn">Hà Nội</option>
                                <option  <?php echo (isset($info)&&$info['user_branch']=='dn')?"selected":"" ?> value="dn">Đà Nẵng</option>
                                <option  <?php echo (isset($info)&&$info['user_branch']=='hcm')?"selected":"" ?> value="hcm">Hồ Chí Minh</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-actions nobg fluid">
                    <div class="col-md-offset-3 col-md-9">
                        <a href="<?php echo base_url() ?>quanly/customer/listall"  class="btn default">Hủy bỏ</a>
                        <button class="btn green" id='btn-ok' name='ok' type='submit'>Xác Nhận</button>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>


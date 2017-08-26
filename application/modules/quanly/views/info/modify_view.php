
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i><?php echo  (isset($info))?"Sửa ":"Thêm " ?>Thành Viên
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
            <form action='<?php echo base_url()?>quanly/info' class="form-horizontal" method="post">

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
                        <label class="col-md-3 control-label">Cấp Bậc (*)</label>
                        <div class="col-md-4">
                            <select  id='user_type' name='user_type'class='form-control' >
                                <option  <?php echo (isset($info)&&$info['user_type']=='member')?"selected":"" ?> value="member">Thành Viên</option>
                                <option <?php echo (isset($info)&&$info['user_type']=='administrator')?"selected":"" ?> value="administrator">Quản Trị Viên</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Tình Trạng </label>
                        <div class="col-md-4">
                            <input name="status" type="checkbox" <?php echo (isset($info)&&$info['status']=='on')?"checked":"" ?> class="make-switch">
                        </div>
                    </div>
                </div>
                <div class="form-actions nobg fluid">
                    <div class="col-md-offset-3 col-md-9">
                        <a href="<?php echo base_url() ?>quanly"  class="btn default">Hủy bỏ</a>
                        <button class="btn green" id='btn-ok' name='ok' type='submit'>Xác Nhận</button>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>


<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i><?php echo  (isset($info))?"Sửa ":"Thêm " ?>Phiếu Giao Hàng
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
        <form class="form-horizontal">

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
                    <label class="col-md-2 control-label">Số Soạn Hàng (*)</label>
                    <div class="col-md-4">
                        <input type="text" readonly="" id='compose_number' required="required" name='compose_number' placeholder="Số Soạn Hàng ..." class='form-control' value='<?php
                        echo (isset($info))?$info['compose_number']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Hàng Hóa (*)</label>
                    <div class="col-md-4">
                        <select id='product_id' name='product_id'class='form-control' readonly="">
                            <?php $products = $this->mproduct->getAll(); foreach($products as $product) { ?>
                            <option value="<?php echo $product['code'] ?>" <?php echo (isset($info['product_id']) && $info['product_id'] === $product['code']) ? 'selected' : ''; ?>><?php echo $product['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Khách Hàng (*)</label>
                    <div class="col-md-4">
                        <select readonly="" id='customer_id' name='customer_id'class='form-control' >
                            <?php $users = $this->muser->listAllByType(99999, 0, 'member'); foreach($users as $customer) { ?>
                            <option value="<?php echo $customer['user_id'] ?>" <?php echo (isset($info['customer_id']) && $info['customer_id'] === $customer['user_id']) ? 'selected' : ''; ?>><?php echo $customer['user_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Số Lượng (*)</label>
                    <div class="col-md-4">
                        <input readonly="" type="text" id='quantity' required="required" name='quantity' placeholder="Số Lượng ..." class='form-control' value='<?php
                        echo (isset($info))?$info['quantity']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Phiếu Xuất Tổng (*)</label>
                    <div class="col-md-4">
                        <input readonly="" type="text" id='total_votes' required="required" name='total_votes' placeholder="Phiếu Xuất Tổng ..." class='form-control' value='<?php
                        echo (isset($info))?$info['total_votes']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Ngày Vận Chuyển (*)</label>
                    <div class="col-md-4">
                        <input readonly="" type="text" id='date_start' required="required" name='date_start' placeholder="Ngày Vận Chuyển ..." class='form-control' value='<?php
                        echo (isset($info))?$info['date_start']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Ngày Dự Tính Đến (*)</label>
                    <div class="col-md-4">
                        <input readonly="" type="text" id='date_end' required="required" name='date_end' placeholder="Ngày Dự Tính Đến ..." class='form-control' value='<?php
                        echo (isset($info))?$info['date_end']:"" ?>' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Xe Đi (*)</label>
                    <div class="col-md-4">
                        <select readonly="" id='verhicle_id' name='verhicle_id'class='form-control' >
                            <?php $verhicles = $this->mverhicle->getAll(); foreach($verhicles as $verhicle) { ?>
                            <option value="<?php echo $verhicle['id'] ?>" <?php echo (isset($info['verhicle_id']) && $info['verhicle_id'] === $verhicle['id']) ? 'selected' : ''; ?>><?php echo $verhicle['verhicle_number'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Tình Trạng (*)</label>
                    <div class="col-md-4">
                        <select readonly="" id='status' name='status'class='form-control' >
                            <option value="0" <?php echo (isset($info['status']) && $info['status'] == 0) ? 'selected' : ''; ?>>Chưa Nhận Hàng</option>
                            <option value="3" <?php echo (isset($info['status']) && $info['status'] == 3) ? 'selected' : ''; ?>>Đang Vận Chuyển</option>
                            <option value="1" <?php echo (isset($info['status']) && $info['status'] == 1) ? 'selected' : ''; ?>>Đã Nhận Hàng</option>
                            <option value="2" <?php echo (isset($info['status']) && $info['status'] == 2) ? 'selected' : ''; ?>>Đã Nhận Phiếu (Hoàn Thành)</option>
                        </select>
                    </div>
                </div>
                <?php if (isset($info['bill']) && $info['bill'] !== '') { ?>
                 <div class="form-group file-upload-box">
                    <label class="col-md-2 control-label">File Đính Kèm</label>
                    <div class="col-md-5">
                        <a href="<?php echo base_url() ?>/public/hoadon/<?php echo $info['bill'] ?>" class="btn blue" target="_blank">Xem File</a>
                    </div>
                </div>
                <?php } ?>
                <div class="form-group" id="notes">
                    <label class="col-md-2 control-label">Lịch Trình (*)</label>
                    <?php if (isset($info['notes']) && is_array(json_decode($info['notes'], true))) { $notes = json_decode($info['notes'], true); foreach($notes as $note) { $note_data = json_decode($note, true); ?>
                    <div class="col-md-offset-2 col-md-10" style="left: -15px; margin-bottom: 10px;">
                        <div class="col-md-3">
                            <input readonly="" type="text" name='date[]' placeholder="Ngày..." class='form-control datepicker' value="<?php echo $note_data['date'] ?>" />
                        </div>
                        <div class="col-md-3">
                            <input readonly="" type="text" name='time[]' placeholder="Giờ..." class='form-control timepicker' value="<?php echo $note_data['time'] ?>" />
                        </div>
                        <div class="col-md-3">
                            <input readonly="" type="text" name='location[]' placeholder="Vị Trí..." class='form-control' value="<?php echo $note_data['location'] ?>" />
                        </div>
                        <div class="col-md-3">
                            <textarea readonly="" name='text[]' placeholder="Ghi Chú..." class='form-control'><?php echo $note_data['text'] ?></textarea>
                        </div>
                    </div>
                    <?php } } else { ?>
                    <?php } ?>
                </div>
            </div>
            <div class="form-actions nobg fluid">
                <div class="col-md-offset-3 col-md-9">
                    <a href="<?php if(isset($info) && isset($info['is_copy']) && $info['is_copy']=='true') echo base_url().'quanly/bill/del/'.$info['id']; else echo base_url().'quanly/bill/listall'; ?>"  class="btn default">Quay lại</a>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
<div id="copy" style="display: none;">
    <div>
        <div class="col-md-2">
            <button class="btn red remove-note" type='button'>Xóa Lịch Trình</button>
        </div>
        <div class="col-md-10" style="left: -15px; margin-bottom: 10px;">
            <div class="col-md-3">
                <input type="text" name='date[]' placeholder="Ngày..." class='form-control datepicker' />
            </div>
            <div class="col-md-3">
                <input type="text" name='time[]' placeholder="Giờ..." class='form-control timepicker' />
            </div>
            <div class="col-md-3">
                <input type="text" name='location[]' placeholder="Vị Trí..." class='form-control' />
            </div>
            <div class="col-md-3">
                <textarea name='text[]' placeholder="Ghi Chú..." class='form-control'></textarea>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#btn-add').click(function() {
            html = $('#copy').html();
            $('#notes').append(html);
            $('.timepicker').timepicker({
                autoclose: true,
                showSeconds: true,
                minuteStep: 1,
                showMeridian: false
            });
            $('.datepicker').datepicker();
        })
        $('body').on('click','.remove-note', function() {
            $(this).parent().parent().remove();
        })
        $('.select2').select2();
        $('.timepicker').timepicker({
            autoclose: true,
            showSeconds: true,
            minuteStep: 1,
            showMeridian: false
        });
        $('.datepicker').datepicker();
    })
</script>





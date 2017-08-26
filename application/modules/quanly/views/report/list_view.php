<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-coffee"></i>Báo Cáo
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse">
            </a>
            <a href="javascript:;" class="reload">
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div style='margin-left:20px;margin-top:10px;'>
            <div class='row' style="margin-bottom: 10px;">
                <form action="<?php echo base_url() ?>quanly/report" class="form-horizontal" method="get">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Từ ngày (*)</label>
                        <div class="col-md-4">
                            <div class="input-group input-large date-picker input-daterange" id="datepicker" data-date-format="mm/dd/yyyy">
                                <input type="text" class="form-control" required="required" id="start" name="start" value="<?php echo isset($start) ? $start : "" ?>" />
								<span class="input-group-addon">
									 Đến ngày
								</span>
                                <input type="text" class="form-control" id="end" name="end" value="<?php echo isset($end) ? $end : "" ?>" />
                            </div>
                        </div>
                        <label class="col-md-2 control-label">Danh Mục</label>
                        <div class="col-md-2">
                            <select name='table'class='form-control'>
                                <option <?php echo isset($table) && $table === 'bill' ? 'selected' : '' ?> value="bill">Phiếu Giao Hàng</option>
                                <option <?php echo isset($table) && $table === 'product' ? 'selected' : '' ?> value="product">Hàng Hóa</option>
                                <option <?php echo isset($table) && $table === 'driver' ? 'selected' : '' ?> value="driver">Tài Xế</option>
                                <option <?php echo isset($table) && $table === 'verhicle' ? 'selected' : '' ?> value="verhicle">Xe</option>
                            </select>
                        </div>
                        <span class="input-group-btn"><button class="btn blue" type="submit">Tìm Kiếm</button></span>
                    </div>
                </form>
            </div>
        </div>
        <?php if (isset($data_report)) $this->load->view($data_report); ?>
    </div>
</div>






	
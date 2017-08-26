<script>

</script>
<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i><?php echo  (isset($info))?"Sửa ":"Thêm " ?> Phiếu Giao Hàng
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
        <form action='<?php echo base_url()?>quanly/bill/<?php echo $action ?>' class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">File CSV</label>
                    <div class="col-md-4">
                        <input type="file" required=" " name="file" id="news-avatar" title="Tải File CSV" />
                    </div>
                </div>
            </div>
            <div class="form-actions nobg fluid">
                <div class="col-md-offset-3 col-md-9">
                    <a href="<?php echo base_url() ?>admin/slider/listall"  class="btn default">Hủy bỏ</a>
                    <button class="btn green" id='btn-ok' name='ok' type='submit'>Xác Nhận</button>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>





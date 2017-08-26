<!-- BEGIN SIDEBAR MENU -->
<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
<li class="sidebar-toggler-wrapper">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler hidden-phone">
    </div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
</li>
<li class="sidebar-search-wrapper" style="height: 20px">

</li>
<li class="start">
    <a href="<?php echo base_url()?>quanly">
        <i class="fa fa-home"></i>
		<span class="title">
			Trang Chủ
		</span>
		<span class="selected">
		</span>
    </a>
</li>

<!-- News -->
<li>
    <a href="javascript:;">
        <i class="fa fa-credit-card"></i>
		<span class="title">
			Phiếu Giao Hàng
		</span>
		<span class="arrow ">
		</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>quanly/bill/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Hóa Đơn
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>quanly/bill/add">
                <i class="fa fa-pencil"></i>
                Thêm Hóa Đơn
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="<?php echo base_url()?>quanly/report">
        <i class="fa fa-file"></i>
		<span class="title">
			Báo Cáo
		</span>
		<span class="selected">
		</span>
    </a>
</li>
<li>
    <a href="<?php echo base_url()?>quanly/info">
        <i class="fa fa-user"></i>
		<span class="title">
			Thông Tin Tài Khoản
		</span>
		<span class="selected">
		</span>
    </a>
</li>

<li class="last ">
    <a href="<?php echo base_url() ?>quanly/login/logout">
        <i class="fa fa-bar-chart-o"></i>
        <span class="title">
            Logout
        </span>
    </a>
</li>
</ul>
<!-- END SIDEBAR MENU -->
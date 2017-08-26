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
    <a href="<?php echo base_url()?>admin">
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
        <i class="fa fa-list"></i>
						<span class="title">
							Dịch Vụ
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/service/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Dịch Vụ
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/service/add">
                <i class="fa fa-pencil"></i>
                Thêm Dịch Vụ
            </a>
        </li>
    </ul>
</li>
<!-- News -->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Đơn Hàng
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/order/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Đơn Hàng
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Hồ Sơ Ứng Tuyển
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/cv/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Hồ Sơ
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Tuyển Dụng
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/jobs/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Tuyển Dụng
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/jobs/add">
                <i class="fa fa-pencil"></i>
                Thêm Tin Đăng
            </a>
        </li>
    </ul>
</li>
<!-- News -->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Tin Tức
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/duan/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Tin Tức
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/duan/add">
                <i class="fa fa-pencil"></i>
                Thêm Tin Tức
            </a>
        </li>
    </ul>
</li>

<!-- Supplier-->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Đối Tác - Khách Hàng
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/footer_slider/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Đối Tác
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/footer_slider/add">
                <i class="fa fa-pencil"></i>
                Thêm Đối Tác
            </a>
        </li>
    </ul>
</li>
<!-- Page -->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Quản Lý Trang
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <?php $this->load->model('mpage'); $pages = $this->mpage->getAll(); foreach($pages as $p){ ?>
        <li>
            <a href="<?php echo base_url()?>admin/page/info/<?php echo $p['code'] ?>">
                <i class="fa fa-tasks"></i>
                <?php echo $p['name'] ?>
            </a>
        </li>
        <?php } ?>
    </ul>
</li>
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
		<span class="title">
			Slider
		</span>
		<span class="arrow ">
		</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/slider/listall">
                <i class="fa fa-tasks"></i>
                Slider Mặc Định
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/slider_mobile/listall">
                <i class="fa fa-tasks"></i>
                Slider Mobile
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/slider_gioithieu/listall">
                <i class="fa fa-tasks"></i>
                Slider Giới Thiệu
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/slider_dichvu/listall">
                <i class="fa fa-tasks"></i>
                Slider Dịch Vụ
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/slider_duan/listall">
                <i class="fa fa-tasks"></i>
                Slider Tuyển Dụng
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/slider_tintuc/listall">
                <i class="fa fa-tasks"></i>
                Slider Tin Tức
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/slider_lienhe/listall">
                <i class="fa fa-tasks"></i>
                Slider Liên Hệ
            </a>
        </li>
    </ul>
</li>
<!-- Contact -->
<li>
    <a href="<?php echo base_url()?>admin/follow/listall">
        <i class="fa fa-list"></i>
						Danh Sách Đăng Ký
						</span>

    </a>
</li>
<li>
    <a href="<?php echo base_url()?>admin/contact/listall">
        <i class="fa fa-list"></i>
						<span class="title">
							Liên Hệ
						</span>

    </a>
</li>
<!-- User -->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Thành Viên
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/user/listall">
                <i class="fa fa-tasks"></i>
                Danh Sách Thành Viên
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/user/add">
                <i class="fa fa-pencil"></i>
                Thêm Thành Viên
            </a>
        </li>
    </ul>
</li>
<!-- Config -->
<li>
    <a href="javascript:;">
        <i class="fa fa-list"></i>
						<span class="title">
							Cài Đặt
						</span>
						<span class="arrow ">
						</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url()?>admin/config/edit/seo">
                <i class="fa fa-gear"></i>
                SEO
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/config/edit/banner">
                <i class="fa fa-gear"></i>
                Banner
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/config/edit/info">
                <i class="fa fa-gear"></i>
                Thông Tin
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/config/edit/mail">
                <i class="fa fa-gear"></i>
                Mail
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/config/edit/criteria">
                <i class="fa fa-gear"></i>
                Tiêu Chí HĐ
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/branch/listall">
                <i class="fa fa-gear"></i>
                Chi Nhánh
            </a>
        </li>
        <li>
            <a href="<?php echo base_url()?>admin/config/edit/branch_4">
                <i class="fa fa-gear"></i>
                Chi Nhánh Mặc Định
            </a>
        </li>
    </ul>
</li>


<li class="last ">
    <a href="<?php echo base_url() ?>admin/login/logout">
        <i class="fa fa-bar-chart-o"></i>
        <span class="title">
            Logout
        </span>
    </a>
</li>
</ul>
<!-- END SIDEBAR MENU -->
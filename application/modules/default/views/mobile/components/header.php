<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="vi" />
<meta name="keywords" content="<?php echo $keyword ?>" />
<meta name="description" content="<?php echo $description ?>" />
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:url" content="<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; echo $actual_link; ?>" />
<meta property="og:description" content="<?php echo $description ?>" />
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="200" />
<base href="<?php echo base_url(); ?>" />
<link rel="stylesheet" href="public/default/css/style-mobile.css" media="screen" />
<link href="public/default/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<link href="public/default/css/old/owl.carousel.css" rel="stylesheet" />
<link href="public/default/css/old/owl.theme.css" rel="stylesheet" />
<link rel="stylesheet" href="public/default/css/alertify.css" />
<link rel="stylesheet" href="public/default/css/alertify.default.css" />
<link rel="stylesheet" href="public/default/css/jquery.mCustomScrollbar.css" />
<link rel="stylesheet" type="text/css" href="public/default/css/animate.min.css" />

<title><?php echo $title ?></title>

<script>
    var base_url = '<?php echo base_url() ?>';
</script>
<script src="public/default/js/jquery.js" type="application/javascript"></script>
<script src="public/default/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="public/default/js/script_mobile.js" type="text/javascript"></script>
<script src="public/default/js/old/owl.carousel.js"></script>
<script src="public/default/js/alertify.min.js"></script>
<script src="public/default/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="public/default/js/jssor.js"></script>
<script type="text/javascript" src="public/default/js/jssor.slider.js"></script>
<?php if($this->session->flashdata('response')!=''){ ?>
<script>
    $(document).ready(function(){
        alertify.alert('<?php echo $this->session->flashdata('response') ?>');
    })
</script>
<?php $this->session->set_flashdata('response',''); } ?>
<header>
    <div class="fix">
        <div class="icon-menu">
            <img src="public/default/img/mobile/menu.png" alt=" " />
        </div>
        <div class="logo">
            <a href="">
                <img src="public/default/img/mobile/logo.png" alt=" " />
            </a>
        </div>
        <div class="language">
            <a href="" class="active"><span>VI</span></a>
            <a href=""><span>EN</span></a>
        </div>
    </div>
</header>
<div class="menu-box" id="menu-box">
    <div class="content-menu-box">
        <div class="title-menu-box">
            <span>Nguyễn Phát Logistics</span>
            <img src="public/default/img/mobile/menu.png" alt=" " id="hide-menu" />
        </div>
        <div class="search-box">
            <input type="text" placeholder="Nhập nội dung tìm kiếm" />
            <button><img src="public/default/img/mobile/search.png" alt=" " /></button>
        </div>
        <div class="list-menu">
            <ul>
                <li class="<?php if(isset($activeMenu) && $activeMenu === 'home') echo 'active'; ?>">
                    <a href="">
                        <img src="public/default/img/mobile/home.png" alt=" " class="no-active-img icon-img" />
                        <img src="public/default/img/mobile/home2.png" alt=" " class="active-img icon-img" />
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li class="<?php if(isset($activeMenu) && $activeMenu === 'gioi-thieu') echo 'active'; ?>">
                    <a href="gioi-thieu">
                        <img src="public/default/img/mobile/no-active-menu.png" alt=" " class="no-active-img icon-img" />
                        <img src="public/default/img/mobile/active-menu.png" alt=" " class="active-img icon-img" />
                        <span>Giới thiệu</span>
                        <img src="public/default/img/mobile/row.png" alt=" " class="no-active-img row-icon" id="row-icon" />
                        <img src="public/default/img/mobile/row2.png" alt=" " class="active-img row-icon" id="row-icon" />
                    </a>
                    <div class="sub-menu">
                        <div class="item-sub-menu">
                            <a href="ve-chung-toi">
                                <span>Về chúng tôi</span>
                            </a>
                        </div>
                        <div class="item-sub-menu">
                            <a href="so-do-to-chuc">
                                <span>Sơ đồ tổ chức</span>
                            </a>
                        </div>
                        <div class="item-sub-menu">
                            <a href="tam-nhin-su-menh">
                                <span>Tầm nhìn sứ mệnh</span>
                            </a>
                        </div>
                        <div class="item-sub-menu">
                            <a href="nganh-nghe-kinh-doanh">
                                <span>Ngành nghề kinh doanh</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="<?php if(isset($activeMenu) && $activeMenu === 'dich-vu') echo 'active'; ?>">
                    <a href="dich-vu">
                        <img src="public/default/img/mobile/no-active-menu.png" alt=" " class="no-active-img icon-img" />
                        <img src="public/default/img/mobile/active-menu.png" alt=" " class="active-img icon-img" />
                        <span>Dịch vụ</span>
                        <img src="public/default/img/mobile/row.png" alt=" " class="no-active-img row-icon" id="row-icon" />
                        <img src="public/default/img/mobile/row2.png" alt=" " class="active-img row-icon" id="row-icon" />
                    </a>
                    <div class="sub-menu">
                        <?php $services = $this->mservice->getAll(); foreach($services as $service){ ?>
                        <?php if ($service['parent_id'] == 0) { ?>
                        <div class="item-sub-menu">
                            <a href="dich-vu/chi-tiet/<?php echo $service['link'] ?>">
                                <span><?php echo $service['title'] ?></span>
                            </a>
                            <?php if ($service['type'] == 1) { ?>
                            <div class="icon-show">+</div>
                            <?php } ?>
                            <?php if ($service['type'] == 1) { $childs = $this->mservice->listAllByParent(99,0,$service['id']); ?>
                            <div class="box-child">
                                <?php  foreach($childs as $child) { ?>
                                    <div class="item-child-menu">
                                    <a href="dich-vu/chi-tiet/<?php echo $child['link'] ?>">
                                        <span><?php echo $child['title'] ?></span>
                                    </a>    
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </li>
                <li class="<?php if(isset($activeMenu) && $activeMenu === 'tin-tuc') echo 'active'; ?>">
                    <a href="tin-tuc">
                        <img src="public/default/img/mobile/no-active-menu.png" alt=" " class="no-active-img icon-img" />
                        <img src="public/default/img/mobile/active-menu.png" alt=" " class="active-img icon-img" />
                        <span>Tin tức</span>
                    </a>
                </li>
                <li class="<?php if(isset($activeMenu) && $activeMenu === 'bang-gia') echo 'active'; ?>">
                    <a href="bang-gia">
                        <img src="public/default/img/mobile/no-active-menu.png" alt=" " class="no-active-img icon-img" />
                        <img src="public/default/img/mobile/active-menu.png" alt=" " class="active-img icon-img" />
                        <span>Bảng giá</span>
                    </a>
                </li>
                <li class="<?php if(isset($activeMenu) && $activeMenu === 'tuyen-dung') echo 'active'; ?>">
                    <a href="tuyen-dung">
                        <img src="public/default/img/mobile/no-active-menu.png" alt=" " class="no-active-img icon-img" />
                        <img src="public/default/img/mobile/active-menu.png" alt=" " class="active-img icon-img" />
                        <span>Tuyển dụng</span>
                    </a>
                </li>
                <li class="<?php if(isset($activeMenu) && $activeMenu === 'lien-he') echo 'active'; ?>">
                    <a href="lien-he">
                        <img src="public/default/img/mobile/no-active-menu.png" alt=" " class="no-active-img icon-img" />
                        <img src="public/default/img/mobile/active-menu.png" alt=" " class="active-img icon-img" />
                        <span>Liên hệ</span>
                    </a>
                </li>
                <li class="<?php if(isset($activeMenu) && $activeMenu === 'tracking') echo 'active'; ?>">
                    <a href="kiem-tra-van-don">
                        <img src="public/default/img/mobile/no-active-menu.png" alt=" " class="no-active-img icon-img" />
                        <img src="public/default/img/mobile/active-menu.png" alt=" " class="active-img icon-img" />
                        <span>Kiểm tra tracking</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="social">
            <div class="hotline">HOTLINE: <?php echo $this->mconfig->getByKey('hotline'); ?></div>
            <a href="<?php echo $this->mconfig->getByKey('link_fb') ?>"><img src="public/default/img/mobile/icon-fb.png" alt=" " /></a>
            <a href="<?php echo $this->mconfig->getByKey('link_in') ?>"><img src="public/default/img/mobile/icon-instagram.png" alt=" " /></a>
            <a href="<?php echo $this->mconfig->getByKey('link_pr') ?>"><img src="public/default/img/mobile/icon-pinterest.png" alt=" " /></a>
            <a href="<?php echo $this->mconfig->getByKey('link_tw') ?>"><img src="public/default/img/mobile/icon-twitter.png" alt=" " /></a>
            <a href="<?php echo $this->mconfig->getByKey('link_yt') ?>"><img src="public/default/img/mobile/icon-youtube.png" alt=" " /></a>
        </div>
    </div>
</div>

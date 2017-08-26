<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
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
<link rel="stylesheet" href="public/default/css/style.css" media="screen" />
<link href="public/default/css/owl.carousel.css" rel="stylesheet" />
<link href="public/default/css/owl.theme.css" rel="stylesheet" />
<link rel="stylesheet" href="public/default/css/alertify.css" />
<link rel="stylesheet" href="public/default/css/alertify.default.css" />
<link rel="stylesheet" href="public/default/css/jquery.mCustomScrollbar.css" />

<title><?php echo $title ?></title>

<script>
    var base_url = '<?php echo base_url() ?>';
</script>
<script src="public/default/js/jquery.js" type="application/javascript"></script>
<script src="public/default/js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="public/default/js/jssor.js"></script>
<script type="text/javascript" src="public/default/js/jssor.slider.js"></script>
<script src="public/default/js/owl.carousel.js"></script>
<script src="public/default/js/alertify.min.js"></script>
<script src="public/default/js/jquery.mCustomScrollbar.concat.min.js"></script>

<?php if($this->session->flashdata('response')!=''){ ?>
<script>
    $(document).ready(function(){
        alertify.alert('<?php echo $this->session->flashdata('response') ?>');
    })
</script>
<?php $this->session->set_flashdata('response',''); } ?>
</head>

<body>
<header>
    <div class="header-top">
        <div class="fix">
            <div class="logo">
                <a href="">
                    <img src="public/default/img/icon/logo.png" alt=" " />                    
                </a>
            </div>
            <div class="header-top-right">
                <div class="top-menu">
                    <div class="hot-contact">
                        <a href="tel:<?php echo $this->mconfig->getbyKey('hotline'); ?>"><img src="public/default/img/icon/white-phone.png" alt=" " /></a>
                        <a href="mailto:<?php echo $this->mconfig->getbyKey('email_branch_hcm'); ?>"><img src="public/default/img/icon/white-mail.png" alt=" " /></a>
                    </div>
                    <div class="login-menu">
                        <ul>
                            <?php if(!$this->session->userdata('loggedIn')) { ?>
                            <li>
                                <a href="dang-ky">Đăng ký</a>
                            </li>
                            <li>
                                <a href="dang-nhap">Đăng nhập</a>
                            </li>
                            <?php } else { ?>
                            <li><a>Xin chào, <?php echo $this->session->userdata('user_name') ?></a></li>
                            <li><a href="dang-xuat">Đăng xuất</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="language">
                        <a href=""><img src="public/default/img/icon/en.png" /></a>
                        <a href=""><img src="public/default/img/icon/vi.png" /></a>
                    </div>                    
                </div>
                <div class="clr"></div>
                <div class="menu-bar">
                    <ul>
                        <li class="<?php if(isset($activeMenu) && $activeMenu === 'home') echo 'active' ?>">
                            <a href="">Trang chủ</a>
                        </li>
                        <li class="<?php if(isset($activeMenu) && $activeMenu === 'gioi-thieu') echo 'active' ?>">
                            <a href="gioi-thieu">Giới thiệu</a>
                            <div class="sub-menu-bar">
                                <div class="sub-menu-header">
                                    <a href="ve-chung-toi">Về chúng tôi</a>                      
                                </div>
                                <div class="sub-menu-header">
                                    <a href="so-do-to-chuc">Sơ đồ tổ chức</a>                      
                                </div>
                                <div class="sub-menu-header">
                                    <a href="tam-nhin-su-menh">Tầm nhìn sức mệnh</a>                      
                                </div>
                                <div class="sub-menu-header">
                                    <a href="nganh-nghe-kinh-doanh">Ngành nghề kinh doanh</a>                      
                                </div>
                            </div>    
                        </li>
                        <li class="<?php if(isset($activeMenu) && $activeMenu === 'dich-vu') echo 'active' ?>">
                            <a href="dich-vu">Dịch vụ</a>
                            <div class="sub-menu-bar">
                            <?php $services_header = $this->mservice->getAll(); foreach($services_header as $service) { if ($service['parent_id'] == 0) { ?>
                            <div class="sub-menu-header">
                                <?php if ($service['type'] == 1) { ?>
                                <a href="dich-vu/<?php echo $service['link'] ?>"><?php echo $service['title'] ?></a>
                                <img src="public/default/img/icon/row-white.png" class="row-menu" />
                                <div class="child-sub-menu-header">
                                    <?php $childs = $this->mservice->listAllByParent(99,0,$service['id']); foreach($childs as $child) { ?>
                                    <div class="child-header-item">
                                        <a href="dich-vu/chi-tiet/<?php echo $child['link'] ?>"><?php echo $child['title'] ?></a>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php } else { ?>
                                <a href="dich-vu/chi-tiet/<?php echo $service['link'] ?>"><?php echo $service['title'] ?></a>
                                <?php } ?>                               
                                                                
                            </div>
                            <?php } ?>
                            <?php } ?>
                            </div>                       
                        </li>
                        <li class="<?php if(isset($activeMenu) && $activeMenu === 'bang-gia') echo 'active' ?>">
                            <a href="bang-gia">Bảng giá</a>
                        </li>
                        <li class="<?php if(isset($activeMenu) && $activeMenu === 'tin-tuc') echo 'active' ?>">
                            <a href="tin-tuc">Tin tức</a>
                        </li>
                        <li class="<?php if(isset($activeMenu) && $activeMenu === 'tuyen-dung') echo 'active' ?>">
                            <a href="tuyen-dung">Tuyển dụng</a>
                        </li>
                        <li class="<?php if(isset($activeMenu) && $activeMenu === 'lien-he') echo 'active' ?>">
                            <a href="lien-he">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="clr"></div>
    <div class="slider">
        <?php echo $this->load->view($slider_box) ?>
    </div>
</header>
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

</header>
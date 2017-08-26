<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <base href="<?php echo base_url(); ?>" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <title>Order</title>
</head>
<body style="width: 650px; margin: auto; font-family: 'Roboto', sans-serif; color: #454545;">
    <div style="height: 100px; background: #406fa8;">
        <div style="float: left; width: 255px; text-align: center; height: 100px;">
            <img src="public/default/img/icon/logo.png" alt=" " style="margin: 10px auto;" />
        </div>
        <div style="float: left; width: 395px; color: #fff;">
            <div style="line-height: 35px; text-transform: uppercase;">
                <span><?php echo $this->mconfig->getByKey('company_name') ?></span>
            </div>
            <div style="line-height: 20px; font-size: 13px;">
                <span>Địa chỉ: <?php echo $this->mconfig->getByKey('address_branch_4') ?></span>
            </div>
            <div style="line-height: 20px; font-size: 13px;">
                <span>Điện thoại: <?php echo $this->mconfig->getByKey('hotline_branch_4') ?>     -     Fax: <?php echo $this->mconfig->getByKey('fax_branch_4') ?></span>
            </div>
            <div style="line-height: 20px; font-size: 13px;">
                <span>Email: <?php echo $this->mconfig->getByKey('email_branch_4') ?></span>
            </div>
        </div>
    </div>
    <div style="margin: 10px auto; width: 200px; text-align: center; color: #406f8a; text-transform: uppercase; font-size: 15px; border: 1px solid #406f8a; height: 30px; line-height: 30px; font-weight: bold;">
        Tuyển Dụng
    </div>
    <div style="float: right; height: 30px; line-height: 30px;">
        <a href="public/cv/<?php echo $cv ?>">CV Ứng Viên (download tại đây)</a>
    </div>
    <div style="clear: both;"></div>
    <div style="padding: 0 15px; background: #ededf4; line-height: 30px; font-size: 14px; color: #000;">
        Ngày
    </div>
    <div style="padding: 0 15px; line-height: 30px; font-size: 13px; background: #f9f8f8;">
        <?php echo date('d-m-Y', $created) ?>
    </div>
    <div style="padding: 0 15px; background: #ededf4; line-height: 30px; font-size: 14px; color: #000;">
        Vị Trí
    </div>
    <div style="padding: 0 15px; line-height: 30px; font-size: 13px; background: #f9f8f8;">
        <?php $job = $this->mjobs->getById($job_id); echo $job['title'] ?>
    </div>
    <?php $user = json_decode($user_info, true); ?>
    <div style="padding: 0 15px; background: #ededf4; line-height: 30px; font-size: 14px; color: #000;">
        Họ Và Tên
    </div>
    <div style="padding: 0 15px; line-height: 30px; font-size: 13px; background: #f9f8f8;">
        <?php echo $user['name'] ?>
    </div>
    <div style="padding: 0 15px; background: #ededf4; line-height: 30px; font-size: 14px; color: #000;">
        Địa Chỉ
    </div>
    <div style="padding: 0 15px; line-height: 30px; font-size: 13px; background: #f9f8f8;">
        <?php echo $user['address'] ?>
    </div>
    <div style="padding: 0 15px; background: #ededf4; line-height: 30px; font-size: 14px; color: #000;">
        Email
    </div>
    <div style="padding: 0 15px; line-height: 30px; font-size: 13px; background: #f9f8f8;">
        <?php echo $user['email'] ?>
    </div>
</body>

</html>
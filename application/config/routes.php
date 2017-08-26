<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "default/index";
$route['admin'] = "admin/index";
$route['admin/(:any)'] = "admin/$1";
$route['quanly'] = "quanly/index";
$route['quanly/(:any)'] = "quanly/$1";
$route['default/(:any)'] = "default/$1";
$route['gioi-thieu'] = "default/page/index/vechungtoi";
$route['ve-chung-toi'] = "default/page/index/vechungtoi";
$route['tam-nhin-su-menh'] = "default/page/index/tamnhinsumenh";
$route['bang-gia'] = "default/page/banggia";
$route['so-do-to-chuc'] = "default/page/index/sodotochuc";
$route['nganh-nghe-kinh-doanh'] = "default/page/index/nganhnghekinhdoanh";
$route['tuyen-dung'] = "default/jobs/index";
$route['tuyen-dung/chi-tiet/(:any)'] = "default/jobs/detail/$1";
$route['tuyen-dung/(:num)'] = "default/jobs/index/$1";
$route['nop-ho-so/(:any)'] = "default/jobs/apply/$1";
$route['nop-ho-so-ung-tuyen'] = "default/jobs/save";
$route['dich-vu'] = "default/services/index";
$route['dich-vu/chi-tiet/(:any)'] = "default/services/detail/$1";
$route['dich-vu/(:num)'] = "default/services/index/$1";
$route['dich-vu/(:any)'] = "default/services/category/$1";
$route['dich-vu/(:any)/(:num)'] = "default/services/category/$1/$2";
$route['yeu-cau-bao-gia/(:any)'] = "default/services/quote/$1";
$route['bao-gia'] = "default/services/save";
$route['tin-tuc'] = "default/news/index";
$route['tin-tuc/tags'] = "default/news/tags";
$route['tin-tuc/tags/(:any)'] = "default/news/tags/$1";
$route['tin-tuc/chi-tiet/(:any)'] = "default/news/detail/$1";
$route['tin-tuc/(:any)'] = "default/news/index/$1";
$route['dang-ky'] = "default/login/signup";
$route['dang-nhap'] = "default/login/index";
$route['dang-xuat'] = "default/login/signout";
$route['quen-mat-khau'] = "default/login/forgot";
$route['dang-nhap-he-thong'] = "default/login/validate";
$route['du-an-khach-hang/chi-tiet/(:any)'] = "default/product/detail/$1";
$route['du-an-khach-hang/(:any)'] = "default/product/index/$1";
$route['lien-he'] = "default/contact/index";
$route['kiem-tra-van-don'] = "default/tracking/index";

/* End of file routes.php */
/* Location: ./application/config/routes.php */

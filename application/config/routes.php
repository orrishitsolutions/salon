<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route["enquiry"] = 'home/enquiry';
$route["category/(.*)"] = 'category';
$route["product/(.*)"] = 'product';
$route["(.*).html"] = 'page';


$route["blog"] = 'BlogController/blog_view';
$route["(.*).php"] = 'BlogController';


//$route['admin']='admin/admin';
//$route['admin/(.*)']='admin/admin';

/*
// user login
$route['user-login'] = 'welcome/user_login';
//admin Login
$route['admin']='Auth/LoginController/loginPage';
//$route['admin/login'] = 'Auth/LoginController/loginPage';
$route['admin/logged'] = 'Auth/LoginController/loginCheckPageFunction';
$route['logout'] = 'Auth/LoginController/loggedout';
//----------------------------------admin orrish----------------------
$route['admin/dashboard'] = 'Admin/AdminController/index';

//----Abouts--------------------------------------
$route['admin/our-directors'] = 'Admin/AboutController/about_view';
$route['admin/add-directors'] = 'Admin/AboutController/about_add_view';
$route['admin/about-update-Home/(.+)'] = 'Admin/AboutController/update_Home/$1';
$route['admin/del-about/(.+)'] = 'Admin/AboutController/delect_abouts/$1';
$route['admin/add-directors/insertData'] = 'Admin/AboutController/insertData';
$route['admin/edit-directors/(.+)'] = 'Admin/AboutController/edit_directors/$1';
$route['admin/add-directors/UpdateData'] = 'Admin/AboutController/UpdateData';
$route['admin/edit-experience/(.+)'] = 'Admin/AboutController/experience_view/5';
$route['admin/our-team'] = 'Admin/AboutController/team_view';
$route['admin/add-team'] = 'Admin/AboutController/team_add_view';
$route['admin/edit-team/(.+)'] = 'Admin/AboutController/edit_team/$1';
$route['admin/our-testimonials'] = 'Admin/AboutController/testimonials_view';
$route['admin/add-testimonials'] = 'Admin/AboutController/testimonials_add_view';
$route['admin/edit-testimonials/(.+)'] = 'Admin/AboutController/testimonials_team/$1';
$route['admin/our-deal'] = 'Admin/AboutController/deal_view';
$route['admin/add-deal'] = 'Admin/AboutController/deal_add_view';
$route['admin/edit-deal/(.+)'] = 'Admin/AboutController/deal_team/$1';
//------------End of Abouts
//--------------Product-----------------------------------//
//categories
$route['admin/categories'] = 'Admin/CategoriesController/categories';
$route['admin/cat-update-Home/(.+)'] = 'Admin/CategoriesController/update_Home/$1';
$route['admin/cat-delect/(.+)'] = 'Admin/CategoriesController/delect_categories/$1';
$route['admin/add-categories'] = 'Admin/CategoriesController/add_categories';
$route['admin/add-categories/update'] = 'Admin/CategoriesController/insertData';

$route['admin/edit-categories/(.+)'] = 'Admin/CategoriesController/edit_categories/$1';
$route['admin/add-categories/UpdateData'] = 'Admin/CategoriesController/UpdateData';


// Car Style
$route['admin/car-style'] = 'Admin/CarStyleController/car_style';
$route['admin/car-update-Home/(.+)'] = 'Admin/CarStyleController/update_Home/$1';
$route['admin/car-delect/(.+)'] = 'Admin/CarStyleController/delect_car/$1';
$route['admin/add-car-style'] = 'Admin/CarStyleController/add_car_style';
$route['admin/add-car-style/update'] = 'Admin/CarStyleController/insertData';

$route['admin/edit-car-style/(.+)'] = 'Admin/CarStyleController/edit_car_style/$1';
$route['admin/add-car-style/UpdateData'] = 'Admin/CarStyleController/UpdateData';

// all_Stock
$route['admin/all-stock'] = 'Admin/AllStockController/all_stock';
$route['admin/update-Home/(.+)'] = 'Admin/AllStockController/update_Home/$1';
$route['admin/sell_status/(.+)'] = 'Admin/AllStockController/sell_Home/$1';
$route['admin/add-stock'] = 'Admin/AllStockController/view_stock';
$route['admin/add-stock/Add'] = 'Admin/AllStockController/Add_stock';
$route['admin/add-stock/Edit/(.+)'] = 'Admin/AllStockController/Edit/$1';
$route['admin/stock-delect/(.+)'] = 'Admin/AllStockController/delect_stock/$1';
$route['admin/add-stock/Upd'] = 'Admin/AllStockController/UpdateData';

$route['admin/stock-exterior/(.+)'] = 'Admin/AllStockController/view_exterior/$1';
$route['admin/add-exterior/(.+)'] = 'Admin/AllStockController/Add_exterior/$1';
$route['admin/add-exterior/(.+)'] = 'Admin/AllStockController/Add_exterior/$1';
$route['admin/add-insertexterior'] = 'Admin/AllStockController/insertExterior';
$route['admin/exterior-stock/Edit/(.+)'] = 'Admin/AllStockController/ExteriorEdit/$1';
$route['admin/edit-insertexterior'] = 'Admin/AllStockController/UpdateExterior';
$route['admin/exterior-delect/(.+)'] = 'Admin/AllStockController/DelectExterior/$1';


$route['admin/stock-interior/(.+)'] = 'Admin/AllStockController/view_interior/$1';


$route['admin/stock-interior/Edit/(.+)'] = 'Admin/AllStockController/Add_interior/$1';



$route['admin/profile'] = 'Admin/AdminController/profilePage';
$route['admin/profile/update'] ='Admin/AdminController/updateProfilePage';
$route['admin/profile/delete-photo']  = 'Admin/AdminController/deletePhotoFunction';
$route['admin/profile/password-change']  = 'Admin/AdminController/passwordchangeFunction';


///testing Pages Only
$route['admin/basic-elements'] = 'welcome/basic_elements';
$route['admin/advanced-elements'] = 'welcome/advanced_elements';
$route['admin/editors'] = 'welcome/editors';
$route['admin/wizard'] = 'welcome/wizard';
$route['admin/basic-table'] = 'welcome/basic_table';
$route['admin/data-table'] = 'welcome/data_table';
//--------------------------------End Of Admin Orrish--------------


//--------------------- Web-Site Routes ---------------------

$route['about-us'] = 'Website/AboutsController/about_us';
$route['stock-cars'] = 'Website/StockController/stock_cars';
$route['car-detail/(.+)'] = 'Website/StockController/car_detail/$1';
$route['Website/Request'] = 'Website/StockController/Request_A_Call';
// $route['Website/Request'] = 'Website/StockController/submit_request/'; //Ajax Request

$route['insurance'] = 'Website/AllController/insurance';
$route['showroom'] = 'Website/AllController/showroom';
$route['wallpaper'] = 'Website/AllController/wallpaper';
$route['sell-cars'] = 'Website/AllController/sell_cars';
$route['car-service'] = 'Website/AllController/car_service';
$route['blogs'] = 'Website/AllController/blogs';
$route['contact-us'] = 'Website/AllController/contact_us';

//------------------ End Of Website Routes ---------------------
*/

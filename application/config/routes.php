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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Home';
$route['About'] = 'Home/About';
$route['Cart'] = 'Home/Cart';
$route['Services'] = 'Home/Services';
$route['Ecommerce'] = 'Home/Ecommerce';
$route['ContactUs'] = 'Home/ContactUs';
//services
$route['doctor-appointments'] = 'Home/Doctor_appointment';
$route['post-hospital-care'] = 'Home/Post_Hospital_Care';
$route['organizing-health-records'] = 'Home/Organizing_heath_record';
$route['healthcare-navigation'] = 'Home/Healthcare_navigation';
$route['health-education-and-support'] = 'Home/Health_education_support';
$route['24-care-helpline'] = 'Home/helpline';

$route['Terms_conditions'] = 'Home/Terms_conditions';
$route['Privacy_policy'] = 'Home/Privacy_policy';
$route['Refund_policy'] = 'Home/Refund_policy';
$route['Blog'] = 'Home/Blog';
$route['Faq'] = 'Home/Faq';
$route['Packages'] = 'Home/Packages';
$route['HospitalCompanion'] = 'Home/HospitalCompanion';
$route['SingleBlog'] = 'Home/SingleBlog';

$route['SingleBlog/(:num)'] = 'Home/SingleBlog/$1';

$route['Seniorcare'] = 'Home/Seniorcare';
$route['Post_hospitalCare'] = 'Home/Post_hospitalCare';
$route['Maternity_care'] = 'Home/Maternity_care';
$route['Mother_child_care'] = 'Home/Mother_child_care';
$route['Cancer_care'] = 'Home/Cancer_care';
$route['Surgery_care'] = 'Home/Surgery_care';
$route['Critical_care'] = 'Home/Critical_care';
//new
$route['package_checkout'] = 'Home/package_checkout';
$route['plans'] = 'Home/plans';
//backend
//login
$route['login'] = 'Login/index';
$route['signup'] = 'Login/Signup';
$route['signup1'] = 'Login/Signup1';
$route['NewSignup'] = 'Login/NewSignup';
$route['forgetpassword'] = 'Login/ForgetPassword';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

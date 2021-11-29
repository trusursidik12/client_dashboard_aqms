<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


// login
$routes->get('/login', 'Login\Login::loginForm');
$routes->add('/session-in', 'Login\Login::loginProcess');
$routes->add('/session-out', 'Login\Login::logOut');

// user
$routes->get('/user', 'Admin\User::index');
$routes->get('/user/create', 'Admin\User::create');
$routes->post('/user-save', 'Admin\User::save');
$routes->get('/user/edit/(:any)', 'Admin\User::edit/$1');
$routes->post('/user-update', 'Admin\User::update');
$routes->post('/user-delete', 'Admin\User::delete');

// user station
$routes->get('/user/station/(:any)', 'Admin\UserStation::edit/$1');
$routes->add('/station-add', 'Admin\UserStation::add');
$routes->get('/station-list/(:any)', 'Admin\UserStation::list/$1');
$routes->post('/station-remove', 'Admin\UserStation::remove');

// aqm station
$routes->get('/aqm-station', 'Admin\AqmStation::index');
$routes->get('/aqm-station/create', 'Admin\AqmStation::create');
$routes->post('/aqm-station-save', 'Admin\AqmStation::save');
$routes->get('/aqm-station/edit/(:any)', 'Admin\AqmStation::edit/$1');
$routes->post('/aqm-station-update', 'Admin\AqmStation::update');
$routes->post('/aqm-station-delete', 'Admin\AqmStation::delete');

// aqm param
$routes->get('aqm-station/aqm-param/edit/(:any)', 'Admin\AqmParam::edit/$1');
$routes->add('/param-add', 'Admin\AqmParam::add');
$routes->get('/param-list/(:any)', 'Admin\AqmParam::list/$1');
$routes->post('/param-remove', 'Admin\AqmParam::remove');

// aqm param ispu
$routes->get('aqm-station/aqm-param-ispu/edit/(:any)', 'Admin\AqmParamIspu::edit/$1');
$routes->add('/param-ispu-add', 'Admin\AqmParamIspu::add');
$routes->get('/param-ispu-list/(:any)', 'Admin\AqmParamIspu::list/$1');
$routes->post('/param-ispu-remove', 'Admin\AqmParamIspu::remove');

// company profile
$routes->get('/company-profile', 'CompanyProfile::index');
$routes->get('/company-profile/edit/(:any)', 'CompanyProfile::edit/$1');
$routes->post('/company-profile-update', 'CompanyProfile::update');

// aqm data
$routes->get('/aqm-data/station/(:any)', 'AqmData::listData/$1');
$routes->add('ajax/aqm-data/station/(:any)', 'AqmData::ajaxAqmData/$1');

// aqm ispu
$routes->get('/aqm-ispu/station/(:any)', 'AqmIspu::listIspu/$1');
$routes->add('ajax/aqm-ispu/station/(:any)', 'AqmIspu::ajaxAqmIspu/$1');

// change password
$routes->get('/change-password', 'ChangePassword::index');
$routes->post('change-password-update', 'ChangePassword::update');

// indoor
$routes->get('/indoor', 'Indoor\Indoor::index');

// outdoor
$routes->post('/api/public/outdoor', 'Outdoor\Outdoor::station/$1', ['filter' => 'basicauth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

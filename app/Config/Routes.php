<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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


// ================================

// LOGIN

$routes->get('/', 'Dashboard::index');

// AKSES LLDIKTI
$routes->get('/surat_masukl', 'Users\\Surat_masuk::index');
$routes->get('/surat_keluarl', 'Users\\Surat_keluar::index');
$routes->get('/surat_tugas', 'Users\\Surat_tugas::index');
$routes->get('/nota_dinas', 'Users\\Nota_dinas::index');

// AKSES PTS 
$routes->get('/surat_masukp', 'Users\\Surat_masuk::suratMasukp');
$routes->get('/surat_keluarp', 'Users\\Surat_keluar::suratKeluarp');
$routes->get('/surat_tugas', 'Users\\Surat_tugas::index');
$routes->get('/nota_dinas', 'Users\\Nota_dinas::index');

// MENU
$routes->get('/menu', 'Admin\\Menu::index');
$routes->get('/akses', 'Admin\\Levelakses::index');
$routes->post('/createMenu', 'Admin\Menu::create');
$routes->post('/updateMenu', 'Admin\\Menu::update');
$routes->post('/deleteMenu', 'Admin\\Menu::delete');

// SUBMENU
$routes->get('/submenu', 'Admin\\Submenu::index');
$routes->post('/createSubMenu', 'Admin\Submenu::create');
$routes->post('/updateSubMenu', 'Admin\\Submenu::update');
$routes->post('/deleteSubMenu', 'Admin\\Submenu::delete');


// USERS
$routes->get('/akun', 'Admin\\User::index');
$routes->post('/createUser', 'Admin\User::create');
$routes->post('/updateUser', 'Admin\\User::update');
$routes->post('/deleteUser', 'Admin\\User::delete');

// Akses Menu
$routes->get('/akses', 'Admin\\Aksesmenu::index');
$routes->post('/createAksesMenu', 'Admin\Aksesmenu::create');
$routes->post('/updateAksesMenu', 'Admin\\Aksesmenu::update');
$routes->post('/deleteAksesMenu', 'Admin\\Aksesmenu::delete');

//SURAT
$routes->get('/reffSurat', 'Users\\Reffsurat::index');
$routes->post('/createReff', 'Users\Reffsurat::create');
$routes->post('/updateReff', 'Users\\Reffsurat::update');
$routes->post('/deleteReff', 'Users\\Reffsurat::delete');


// ======================

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

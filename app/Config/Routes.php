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

$routes->get('/', 'Admin\\Dashboard::index');

// AKSES LLDIKTI
$routes->get('/surat_masukl', 'Admin\\Surat_masuk::index');
$routes->get('/surat_keluarl', 'Admin\\Surat_keluar::index');
$routes->get('/surat_tugas', 'Admin\\Surat_tugas::index');
$routes->get('/nota_dinas', 'Admin\\Nota_dinas::index');

// AKSES PTS 
$routes->get('/surat_masukp', 'Admin\\Surat_masuk::suratMasukp');
$routes->get('/surat_keluarp', 'Admin\\Surat_keluar::suratKeluarp');
$routes->get('/surat_tugas', 'Admin\\Surat_tugas::index');
$routes->get('/nota_dinas', 'Admin\\Nota_dinas::index');

// MENU
$routes->get('/menu', 'Super\\Menu::index');
$routes->get('/supermen', 'Super\\Levelakses::index');
$routes->post('/createMenu', 'Super\Menu::create');
$routes->post('/updateMenu', 'Super\\Menu::update');
$routes->post('/deleteMenu', 'Super\\Menu::delete');

// SUBMENU
$routes->get('/submenu', 'Super\\Submenu::index');
$routes->post('/createSubMenu', 'Super\Submenu::create');
$routes->post('/updateSubMenu', 'Super\\Submenu::update');
$routes->post('/deleteSubMenu', 'Super\\Submenu::delete');

// Akses Menu
$routes->get('/akses', 'Super\\Aksesmenu::index');
$routes->post('/createAksesMenu', 'Super\Aksesmenu::create');
$routes->post('/updateAksesMenu', 'Super\\Aksesmenu::update');
$routes->post('/deleteAksesMenu', 'Super\\Aksesmenu::delete');

//SURAT
$routes->get('/reffSurat', 'Admin\\Reffsurat::index');
$routes->post('/createReff', 'Admin\Reffsurat::create');
$routes->post('/updateReff', 'Admin\\Reffsurat::update');
$routes->post('/deleteReff', 'Admin\\Reffsurat::delete');


// ======================

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

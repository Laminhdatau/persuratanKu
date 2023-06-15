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
$routes->get('/', 'Auth\\Auth::index');
$routes->get('/dashboard', 'Admin\\Dashboard::index');

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
$routes->post('/createMenu', 'Super\Menu::create');
$routes->post('/updateMenu', 'Super\\Menu::update');
$routes->post('/deleteMenu', 'Super\\Menu::delete');





$routes->add('login/prosesLogin', 'Auth\\Auth::prosesLogin');
$routes->get('/logout', 'Auth\\Auth::logout');

// ======================

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

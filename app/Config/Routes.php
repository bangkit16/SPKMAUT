<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/apaitu', 'Home::apaitu');
$routes->get('/kenapa', 'Home::kenapa');
$routes->get('/kelompok', 'Home::kelompok');
$routes->get('/maut', 'Home::hitungMaut');

// Alternatif
$routes->get('/tambahAlternatif', 'Alternatif::tambahAlternatif');
$routes->post('/addAlt', 'Alternatif::addAlt');
$routes->get('/hapusAlt/(:num)', 'Alternatif::hapusAlt/$1');
$routes->post('editAlt/updateAlt', 'Alternatif::updateAlt');
$routes->get('/editAlt/(:num)', 'Alternatif::editAlt/$1');

// Kriteria
$routes->get('/tambahKriteria', 'Kriteria::tambahKriteria');
$routes->post('/addKrit', 'Kriteria::addKrit');
$routes->get('/hapusKrit/(:num)', 'Kriteria::hapusKrit/$1');
$routes->post('editKrit/updateKrit', 'Kriteria::updateKrit');
$routes->get('/editKrit/(:num)', 'Kriteria::editKrit/$1');

// Perhitungan

$routes->get('/normalisasi', 'Perhitungan::normalisasi');
$routes->get('/perkalian', 'Perhitungan::perkalian');
$routes->get('/perangkingan', 'Perhitungan::perangkingan');

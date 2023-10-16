<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin', 'Home::admin');
$routes->get('/generatePDF', 'QrCodeController::generatePdf');
$routes->get('/primera', 'Home::primera');

$routes->match(['get','post'],'/SearchController/search', 'SearchController::search');
$routes->match(['get','post'],'/SearchController/recetas', 'SearchController::recetas');
$routes->match(['get','post'],'/SearchController/buscarMedicamento', 'SearchController::buscarMedicamento');
$routes->match(['get','post'],'/SearchController/buscarMedicamentoPorId', 'SearchController::buscarMedicamentoPorId');
$routes->match(['get','post'],'/SearchController/guardarDatosReceta', 'SearchController::guardarDatosReceta');




$routes->match(['get','post'],'/SearchController/buscarPacientePorId', 'SearchController::buscarPacientePorId');







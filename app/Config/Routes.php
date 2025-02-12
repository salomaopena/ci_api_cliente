<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('/status', 'Main::status');
$routes->get('/all_products', 'Main::all_products');
$routes->get('/product/(:num)', 'Main::product/$1');
$routes->get('/all_categories', 'Main::all_categories');
$routes->get('/products_from_category/(:alphanum)', 'Main::products_from_category/$1');
$routes->get('/products_with_stock/(:num)/(:num)', 'Main::products_with_stock/$1/$2');
$routes->get('/add_product', 'Main::add_product');
$routes->get('/update_product/(:num)', 'Main::update_product/$1');
$routes->get('/delete_product/(:num)', 'Main::delete_product/$1');

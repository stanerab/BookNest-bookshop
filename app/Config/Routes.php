<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\News;
use App\Controllers\Pages;

$routes->get('news', [News::class, 'index']);
$routes->get('news/(:segment)', [News::class, 'show']);
$routes->get('pages/view', [Pages::class, 'show']);

$routes->get('pages', [Pages::class, 'index']);

$routes->get('pages/(:segment)', [Pages::class, 'show']);

$routes->get('(:segment)', [Pages::class, 'view']);


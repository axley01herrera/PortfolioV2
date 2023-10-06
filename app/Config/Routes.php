<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Main::home');
$routes->get('Main/home', 'Main::home');
$routes->get('Main/contact', 'Main::contact');
$routes->get('Main/projects', 'Main::projects'); 
$routes->get('Main/certifications', 'Main::certifications');
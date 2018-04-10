<?php

// Enable PHP Error level
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Enable debug mode
$app['debug'] = true;

// ServeurAntoine
// Doctrine (db)
$app['db.options'] = array(
     'driver' => 'pdo_mysql',
     'host' => 'mysql.hostinger.com',
     'port' => '',
     'dbname' => 'u267870526_me',
     'user' => 'u267870526_mejn',
     'password' => 'Bue2nVwLPoN2',
);

//Local
//Doctrine (db)
// $app['db.options'] = array(
//     'driver' => 'pdo_mysql',
//     'host' => '127.0.0.1',
//     'port' => '',
//     'dbname' => 'BDD_PokeCard',
//     'user' => 'debian-sys-maint',
//     'password' => 'c16Yt68XhVXj3f1Z',
// );

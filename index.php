<?php
require __DIR__.'/vendor/autoload.php';
$config = require __DIR__.'/app/config.php';

Flight::set('flight.log_errors', $config['debug']);
Flight::set('flight.base_url', $config['base_url']);
Flight::set('flight.settings', $config['settings']);
flight::set('flight.spider_agent',$config['spider_agent']);
Flight::set('flight.views.path', __DIR__.'/app/views');

require __DIR__.'/app/functions.php';
require __DIR__.'/app/routes.php';




Flight::instance('db', 'medoo', [$config['db']]);
//Flight::instance('db_read', 'medoo', [$config['db_read']]);

Flight::start();

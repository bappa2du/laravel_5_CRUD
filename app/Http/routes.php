<?php

$router->get('/', 'HomeController@index');

$router->controller('book','BookController');


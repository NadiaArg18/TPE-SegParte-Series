<?php
require_once 'libs/Router.php';
require_once 'Controller/Episode-Api.controller.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('episodes', 'GET', 'EpisodeApiController', 'getEpisodes');
$router->addRoute('episodes/:ID', 'GET', 'EpisodeApiController', 'getEpisode');
$router->addRoute('episodes', 'POST', 'EpisodeApiController', 'addEpisode');
$router->addRoute('episodes/:ID', 'DELETE', 'EpisodeApiController', 'deleteEpisode');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);


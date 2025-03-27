<?php

use Pecee\SimpleRouter\SimpleRouter; // Importa o SimpleRouter

SimpleRouter::setDefaultNamespace('sistema\Controllers'); // Define o namespace padrão para os controladores

SimpleRouter::get(URL_SITE, 'SiteController@index'); // Rota para a página inicial
SimpleRouter::get(URL_SITE . 'sobre', 'SiteController@sobre'); // Rota para a página sobre

SimpleRouter::start(); // Inicia o roteador
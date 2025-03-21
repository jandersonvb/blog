<?php

  use Pecee\SimpleRouter\SimpleRouter;

  SimpleRouter::setDefaultNamespace('sistema\Controllers');

  SimpleRouter::get(URL_SITE, 'SiteController@index');
  SimpleRouter::get(URL_SITE . 'sobre', 'SiteController@sobre');

  SimpleRouter::start();
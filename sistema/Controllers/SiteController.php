<?php

namespace sistema\Controllers;

use sistema\Nucleo\Controlador;

// SiteController é uma classe que estende a classe Controlador
class SiteController extends Controlador
{ 
  // Construtor da classe SiteController
  public function __construct()
  {
    parent::__construct('templates/site/views');
  }

  public function index(): void
  {
    echo $this->template->renderizar('index.html', [
      'titulo' => 'Hello, PHP!',
      'conteudo' => 'Bem-vindo ao nosso site!'
    ]);
  }

  public function sobre(): void
  {
    echo "Sobre nós";
  }
}
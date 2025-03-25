<?php

namespace sistema\Nucleo; // Nucleo é o núcleo do sistema
 
use sistema\Suporte\Template; // Importa a classe Template do namespace sistema\Suporte

// Classe Controlador é a classe base para todos os controladores do sistema
class Controlador
{
  protected Template $template; // Atributo para armazenar o objeto Template
  
  public function __construct(string $diretorio) // Construtor da classe Controlador
  {
    $this->template = new Template($diretorio); // Cria uma nova instância da classe Template
  }

 
}

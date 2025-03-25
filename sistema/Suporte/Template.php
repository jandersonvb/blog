<?php

namespace sistema\Suporte;


//Class template de suporte para renderizar views com o Twig
class Template
{
    private \Twig\Environment $twig; //Atributo para armazenar o objeto Twig

    public function __construct(string $diretorio) // Construtor da classe
    {
        $loader = new \Twig\Loader\FilesystemLoader($diretorio); // Cria um carregador de arquivos do Twig);
        $this->twig = new \Twig\Environment($loader); // Cria uma instância do ambiente Twig
    }

    // Método para renderizar uma view
    public function renderizar(string $view, array $dados) 
    {
        return $this->twig->render($view, $dados); // Renderiza a view com os dados passados
    }
   
}
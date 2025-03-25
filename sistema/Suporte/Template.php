<?php

namespace sistema\Suporte;
use Twig\Lexer;

use sistema\Nucleo\Helpers;


//Class template de suporte para renderizar views com o Twig
class Template
{
    private \Twig\Environment $twig; //Atributo para armazenar o objeto Twig

    public function __construct(string $diretorio) // Construtor da classe
    {
        $loader = new \Twig\Loader\FilesystemLoader($diretorio); // Cria um carregador de arquivos do Twig);
        $this->twig = new \Twig\Environment($loader); // Cria uma instância do ambiente Twig

        $lexer = new Lexer($this->twig, [
            $this->helpers()
        ]);

        $this->twig->setLexer($lexer);
    }

    // Método para renderizar uma view
    public function renderizar(string $view, array $dados): string
    {
        return $this->twig->render($view, $dados); // Renderiza a view com os dados passados
    }

    private function helpers(): void 
    {
        [
            $this->twig->addFunction(new \Twig\TwigFunction("url", function (string $url = null) {
                return Helpers::url($url);
            })),
            $this->twig->addFunction(new \Twig\TwigFunction("saudacao", function () {
                return Helpers::saudacao();
            })),

        ];
    }
   
}
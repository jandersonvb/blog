<?php

namespace sistema\Suporte; // Define o namespace do arquivo
use Twig\Lexer; // Importa a classe Lexer

use sistema\Nucleo\Helpers; // Importa a classe Helpers


//Class template de suporte para renderizar views com o Twig
class Template
{
    private \Twig\Environment $twig; //Atributo para armazenar o objeto Twig

    public function __construct(string $diretorio) // Construtor da classe
    {
        $loader = new \Twig\Loader\FilesystemLoader($diretorio); // Cria um carregador de arquivos do Twig

        $this->twig = new \Twig\Environment($loader); // Cria uma instância do ambiente Twig

        $lexer = new Lexer($this->twig, [ // Cria um lexer para o ambiente Twig
            $this->helpers()
        ]);

        $this->twig->setLexer($lexer); // Seta o lexer no ambiente Twig
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
            $this->twig->addFunction(new \Twig\TwigFunction("resumirTexto", function (string $texto, int $limite) {
                return Helpers::resumirTexto($texto, $limite);
            })),

        ];
    }
   
}
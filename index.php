<?php

//declare(strict_types=1);
require_once 'sistema/configuracao.php';
include_once 'sistema/Nucleo/helpers.php';
include './sistema/Nucleo/Mensagem.php';

use sistema\Nucleo\Helpers;

// $msg = new Mensagem();

// echo $msg->sucesso('mensagem de sucesso')->renderizar();

// echo (new Mensagem())->sucesso('mensagem de sucesso')->renderizar();

// echo (new Mensagem())->sucesso('texto de alerta');
// $helper = new Helpers();
// echo $helper->saudacao();

echo Helpers::saudacao();
?>
<?php

/** Funçao de url de acordo com o ambiente
 *  @param string $url
 *  @return string
 */
function url(string $url): string
{
  $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
  $ambiente = $servidor == 'localhost' ? URL_DESENVOLVIMENTO : URL_PRODUCAO;

  if (str_starts_with($url, '/')) {
    return $ambiente . $url;
  }

  return $ambiente . '/' . $url;
}

/**
 * função para verificar se é localhost
 * 
 * @return bool
 * 
 */

function localhost(): bool
{
  $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');

  if ($servidor == 'localhost') {
    return true;
  }
  return false;
}

/**
 * valida URL sem filtro
 * 
 * @param string $url
 * @return bool
 */
function validarURL(string $url): bool
{
  if (mb_strlen($url < 10)) {
    return false;
  }
  if (!str_contains($url, '.')) {
    return false;
  }
  if (str_contains($url, 'http://') || str_contains($url, 'https://')) {
    return true;
  }

  return false;
}

/**
 * Validar URL com filtro
 * 
 * @param string $url
 * @return bool
 */

function validarURLComFiltro(string $url): bool
{
  return filter_var($url, FILTER_VALIDATE_URL);
}


/**
 * Validar email
 * 
 * @param string $email
 * @return bool
 */
function validarEmail(string $email): bool
{
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Contar tempo
 * 
 * @param string $data
 * @return string
 */
function contarTempo(string $data): string
{
  $agora = strtotime(date('Y-m-d H:i:s'));

  $tempo = strtotime($data);

  $diferenca = $agora - $tempo;

  $segundos = $diferenca;
  $minutos = round($diferenca / 60);
  $horas = round($diferenca / 3600);
  $dias = round($diferenca / 86400); //3600 * 24horas = 86400
  $semanas = round($diferenca / 604800); //86400 * 7dias = 604800
  $meses = round($diferenca / 2419200); //604800 * 4semanas = 2419200
  $anos = round($diferenca / 29030400);  //2419200 * 12meses = 29030400

  if ($segundos <= 60) {
    return 'agora';
  } elseif ($minutos <= 60) {
    return $minutos == 1 ? 'Há ' . $minutos . ' minuto' : 'Há ' . $minutos . ' minutos';
  } elseif ($horas <= 24) {
    return $horas == 1 ? 'Há ' . $horas . ' hora' : 'Há ' . $horas . ' horas';
  } elseif ($dias <= 7) {
    return  $dias == 1 ? 'Há ' . $dias . ' dia' : 'Há ' . $dias . ' dias';
  } elseif ($semanas <= 4) {
    return $semanas == 1 ? 'Há ' . $semanas . ' semana' : 'Há ' . $semanas . ' semanas';
  } elseif ($meses <= 12) {
    return $meses == 1 ? 'Há ' . $meses . ' mês' : 'Há ' . $meses . ' meses';
  } else {
    return $anos == 1 ? 'Há ' . $anos . ' ano' : 'Há ' . $anos . ' anos';
  }
}

/**
 * Formatar valor monetário
 * 
 * @param float $valor
 * @return string
 */
function formatarValor(float $valor): string
{
  return 'R$ ' . number_format(($valor ? $valor : 0), 2, ',', '.');
}

/**
 * Formatar número
 * 
 * @param int $numero
 * @return string
 */
function formatarNumero(int $numero): string
{
  return number_format($numero ? $numero : 0, 0, '.', '.');
}

/**
 * Saudação de acordo com o horário
 * 
 * @return string
 */

function saudacao(): string
{
  $hora = date('H');

  if ($hora >= 0 && $hora <= 5) {
    $saudacao = "Boa madrugada!";
  } elseif ($hora >= 6 && $hora <= 12) {
    $saudacao = "Bom dia!";
  } elseif ($hora >= 13 && $hora <= 18) {
    $saudacao = "Boa tarde!";
  } else {
    $saudacao = "Boa noite!";
  }
  return $saudacao;
}

/**
 * Resumir texto com limite de caracteres e adicionar continuação
 * 
 * @param string $texto
 * @param int $limite
 * @param string $continue opcional - default '...'
 * @return string
 */

function resumirTexto(string $texto, int $limite, string $continue = '...'): string
{
  $textoLimpo = trim(strip_tags($texto));

  if (mb_strlen($textoLimpo) <= $limite) {
    return $textoLimpo;
  }

  $resumirTexto = mb_substr($textoLimpo, 0, mb_strrpos(mb_substr($textoLimpo, 0, $limite), ' '));

  return $resumirTexto . $continue;
}

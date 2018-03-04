<?php
// commandes2.php for commandes2 in /home/qu_j/MicroShell/qu_j/functions
// 
// Made by QU Juliette
// Login   <qu_j@etna-alternance.net>
// 
// Started on  Sat Oct 24 10:26:55 2015 QU Juliette
// Last update Sat Oct 24 15:41:40 2015 QU Juliette
//
$e = $_ENV;
global	$e;

function        func_env($params)
{
  global        $e;
  foreach ($e as $key => $valeur)
    {
      echo $key . "=" . $valeur . "\n";
    }
}

function        func_setenv($params)
{
  global        $e;
  $cle = $params[1];
  if (empty($params[1]) || empty($params[2]))
    echo "setenv: Invalid arguments\n";
  else if (preg_match("/^([A-Z]+)/", $params[1]) == 0)
    echo "setenv: Invalid arguments\n";
  else 
    $e[$cle] = $params[2];
}

function        func_unsetenv($params)
{
  global        $e;
  $cle = $params[1];
  if (empty($params[1]))
    echo "unsetenv: Invalid arguments\n";
  else if (!empty($params[2]))
    echo "setenv: Invalid arguments\n";
  else if (preg_match("/^([A-Z]+)/", $params[1]) == 0)
    echo "unsetenv: Invalid arguments\n";
  else
    unset($e[$cle]);
}
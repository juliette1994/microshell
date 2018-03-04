<?php
// main.php for main in /home/qu_j/MicroShell/qu_j
// 
// Made by QU Juliette
// Login   <qu_j@etna-alternance.net>
// 
// Started on  Fri Oct 23 10:01:32 2015 QU Juliette
// Last update Sat Oct 24 15:51:43 2015 QU Juliette
//
require_once('functions/readLine.php');
require_once('functions/commandes.php');
require_once('functions/decoupage.php');
require_once('functions/commandes2.php');

$home = $_ENV["HOME"];
$avant = $_ENV["OLDPWD"];
global        $home;
global        $avant;
$i = 0;
$flux = fopen('php://stdin', 'r');
if ($flux != false)
  {
    echo "BIENVENUE DANS LE MICROSHELL DE JULIETTE!\n";
    aff_prompt();
    while (($line = fgets($flux)) !== false && $i == 0)
      {
	$line = trim($line);
	$params = func_decoupage($line);
	$pointeur = 'func_' . $params[0];
	if ($params[0] == "exit")
	  {
	    echo "Au revoir, jeune utilisateur!\n";
	    return;
	  }
	if (function_exists($pointeur))
	    $pointeur($params);
	else if (isset($params[0]))
	    echo "Command not found\n";
	else
	  {
	    $i = 1;
            echo $params[0] . ": Command not found\n";
	  }
	aff_prompt();
      }
    fclose($flux);
  }
<?php
// commandes.php for commandes in /home/qu_j/MicroShell/qu_j/functions
// 
// Made by QU Juliette
// Login   <qu_j@etna-alternance.net>
// 
// Started on  Fri Oct 23 11:15:49 2015 QU Juliette
// Last update Sat Oct 24 13:36:06 2015 QU Juliette
//
function	func_echo($params)
{
  $j = 0;
  $i = 1;
  while (isset($params[$i]))
    {
      if ($params[$i] !== "" && $params[$i] !== "\"" && $j == 0)
	{
	  $params[$i] = str_replace("\"", "", $params[$i]);
	  echo $params[$i] . " ";
	}
      else if ($params[$i] == "\"" && $j == 2)
	{
	  $params[$i] = str_replace("\"", "", $params[$i]);
          echo $params[$i] . " ";
	  $j++;
	}
      $i++;
    }
  echo "\n";
}

function	func_pwd($params)
{
  echo  getcwd(). "\n";
}

function        func_cd($params)
{
  global	$home;
  global	$avant;
  $ok = getcwd();
  $tmp = $avant;
  $avant = $ok;
  $i = 1;
  $p = 0;
  if (($params[$i] == "-") || (!isset($params[$i])))
    chdir($tmp);
  else if ($params[$i] == "~")
    chdir($home);
  else if ($params[$i][0] != ".")
    chdir($params[$i]);
  else
    {
      $j = 0;
      while (isset($params[$i][$j]))
	{
	  if ($params[$i][$j] == ".")
	    $p++;
	  $j++;
	}
      $j = 0;
      while ($j < $p)
	{
	  chdir("..");
	  $j = $j + 2;
	}
    }
}

function	func_cat($params)
{
  $file = fopen($params[1], "r");
  echo fread($file, filesize($params[1])) . "\n";
  fclose($file);
}

function	func_ls($params)
{
  $i = 0;
  if (empty($params[1]))
    $params[1] = getcwd();
   else if ($params[1] == "..")
     {
       chdir("..");
       $params[1] = getcwd();
     }
  if (is_dir($params[1]))
    {
      $tab = scandir(".");
      echo $params[1]. " is a directory.\n";
      while (isset($tab[$i]))
	{
	  if (is_dir($tab[$i]))
	    echo $tab[$i] . "\\\n";
	  else if (is_executable($tab[$i]))
	    echo $tab[$i] . "*\n";
	  else if (is_link($tab[$i]))
	    echo $tab[$i] . "@\n";
	  else
	    echo $tab[$i] . "\n";
	  $i++;
	}
    }
  else
    echo $params[1]. " is not a directory.\n";
}
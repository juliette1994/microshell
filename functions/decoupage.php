<?php
// decoupage.php for decoupage in /home/qu_j/MicroShell/qu_j/functions
// 
// Made by QU Juliette
// Login   <qu_j@etna-alternance.net>
// 
// Started on  Fri Oct 23 10:10:40 2015 QU Juliette
// Last update Fri Oct 23 11:19:24 2015 QU Juliette
//
function	func_decoupage($line)
{
  $delimiter = ' ';
  $string = $line;
  return (explode(' ', $string));
}
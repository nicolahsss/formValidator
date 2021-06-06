<?php

declare(strict_types=1);

###############################################################################################################
###############################################################################################################
##                                                                                                           ##
##  ######################     #####            #####     #####            #####     ######################  ##
##  ######################     #####            #####     #####            #####     ######################  ##
##  ######################     ######           #####     #####            #####     ######################  ##
##  ######################     #######          #####     #####            #####     ######################  ##
##  ######################     ########         #####     #####            #####     ######################  ##
##  #####            #####     #########        #####     #####            #####     #####                   ##
##  #####            #####     ##########       #####     #####            #####     #####     .COM.BR       ##
##  #####            #####     ##### #####      #####     ######################     ######################  ##
##  #####            #####     #####  #####     #####     ######################     ######################  ##
##  ######################     #####   #####    #####     ######################     ######################  ##
##  ######################     #####    #####   #####     ######################     ######################  ##
##  ######################     #####     #####  #####     ######################     ######################  ##
##  ######################     #####      ##### #####     #####            #####                      #####  ##
##  ######################     #####       ##########     #####            #####                      #####  ##
##  #####                      #####        #########     #####            #####     ######################  ##
##  #####                      #####         ########     #####            #####     ######################  ##
##  #####                      #####          #######     #####            #####     ######################  ##
##  #####                      #####           ######     #####            #####     ######################  ##
##  #####                      #####            #####     #####            #####     ######################  ##
##                                                                                                           ##
###############################################################################################################
##                   TODOS OS DIREITOS RESERVADOS  O SENHOR E MEU PASTOR E NADA ME FALTARÁ                   ##
###############################################################################################################
###############################################################################################################
###############################################################################################################
##                                          INICIO CODIGO DE FONTE!                                          ##
###############################################################################################################

use Serafim\FormValidator\Validator;

require '../../vendor/autoload.php';

$form = [
  // Input 1
  "input1" => 1234567890,

  // Input 2
  "input2" => "uma string qualquer",

  // Input 3
  "input3" => 4564.56,

  // Input 4 - Not sent
  //"input4" => "",

  // Input 5
  "input5" => "invalid",
];

$validator = new Validator($form);

/*
 * min_len: Confirm the minimum number of characters desired
 * max_len: Confirm the maximum number of characters desired
 * # Desired error code (Must be integer)
 * : Inform the desired amount
 */
$input1 = $validator->rules('input1', 'min_len:10');
$input2 = $validator->rules('input2', 'max_len:19');
$input3 = $validator->rules('input3', 'min_len:7|max_len:10');
$input4 = $validator->rules('input4', 'min_len:12|max_len:26');
$input5 = $validator->rules('input5', 'min_len:12|max_len:26');

// If there are errors, it returns json with the errors, if everything returns null
$errors = $validator->errors();

//See the result
echo "<pre>";
var_dump([
  "input1" => $input1,
  "input2" => $input2,
  "input3" => $input3,
  "input4" => $input4,
  "input5" => $input5,

  // Erro
  "result" => $errors
]);
echo "</pre>";
<?php
use PNHS\Validator\Validator;
require '../../vendor/autoload.php';

//Pegando POST e transformando em Array
$contents = json_decode(file_get_contents('php://input'), true);

$validator = new Validator($contents);

/*
 * required: obrigatório
 * min: quantidade mínima de caracteres
 * max: quantidade máxima de caracteres
 */
$username = $validator->rules('username', 'required|min:3|max:10');
$password = $validator->rules('password', 'required|min:8');

//Se houver erros, retorna json com os erros, caso esteja tudo retorna null
$errors = $validator->errors();

if (is_null($errors))
  die(json_encode([
    'status' => 'ok'
  ]));

die(json_encode([
  'status' => 'error',
  'errors' => $errors
]));
<?php
use PNHS\Validator\Validator;

require '../../vendor/autoload.php';

$form = [
    "username" => "nicolahsss",
    "password" => "senhasenha"
];

$validator = new Validator($form);

/*
 * required: obrigatório
 * min: quantidade mínima de caracteres
 * max: quantidade máxima de caracteres
 */
$username = $validator->rules('username', 'required|min:3|max:10');
$password = $validator->rules('password', 'required|min:8');

//Se houver erros, retorna json com os erros, caso esteja tudo retorna null
$errors = $validator->errors();

//Veja o resultado
var_dump($username, $password, $errors);

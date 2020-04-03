<?php
use PNHS\Validator\Validator;
require '../../vendor/autoload.php';

$validator = new Validator($_POST);

/*
 * required: obrigatório
 * min: quantidade mínima de caracteres
 * max: quantidade máxima de caracteres
 */
$username = $validator->rules('username', 'required|min:3|max:10');
$password = $validator->rules('password', 'required|min:8');

//Se houver erros, retorna json com os erros, caso esteja tudo retorna null
$errors = $validator->errors();

?>
<form method="post">
    Username: <input type="text" name="username" value="<?=$username;?>" />
    <?=(isset($_POST['username'])?$errors['username']:'');?><br />

    Password: <input type="password" name="password" value="<?=$password;?>" />
    <?=(isset($_POST['username'])?$errors['password']:'');?><br />

    <br /><input type="submit" value="Cadastrar" />
</form>
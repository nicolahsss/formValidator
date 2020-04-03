
# PNHS Form-validator [![Build Status](https://travis-ci.org/nicolahsss/form-validator.png)](https://travis-ci.org/nicolahsss/form-validator)



O Form Validator é uma biblioteca de código aberto para validação de dados recebidos de usuários por formulários ou outros meios. O foco é ser simples e ter uma arquitetura compatível com os recursos mais modernos do PHP.

## Ajude o Projeto a continuar, faça uma doação!


[![Pague com PagSeguro - é rápido, grátis e seguro!](https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/209x48-doar-assina.gif)](https://pag.ae/7VUx6v4sL)

## Basic Example
index
```
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
```
## Instalação
### Composer
Se você já conhece o **Composer** (o que é extremamente recomendado), simplesmente abra o terminal, prompt ou powershell na pasta de seu projeto e digite:
```
composer require pnhs/form-validator:"dev-master"
```

## Contribuição

Toda contribuição é bem vinda. Se você deseja incluir novas regras, fique à vontade para explorar o código, veja como é bastante simples integrar qualquer regra à biblioteca.

## Licença

* MIT License

# PNHS Form-validator [![Build Status](https://travis-ci.org/nicolahsss/form-validator.png)](https://travis-ci.org/nicolahsss/form-validator)

O Form Validator é uma biblioteca de código aberto para validação de dados recebidos de usuários por formulários ou outros meios. O foco é ser simples e ter uma arquitetura compatível com os recursos mais modernos do PHP.

## Ajude o Projeto a continuar, faça uma doação!

[![Pague com PagSeguro - é rápido, grátis e seguro!](https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/209x48-doar-assina.gif)](https://pag.ae/7VUx6v4sL)

## Instalação

### Composer

Se você já conhece o **Composer** (o que é extremamente recomendado), simplesmente abra o terminal, prompt ou powershell na pasta de seu projeto e digite:

```
composer require pnhs/form-validator:"dev-master"
cd form_validator
composer install --no-dev
cd samples
php -S localhost:8888
```

## Como usar

Essa é a melhor parte. Não poderia ser mais simples, veja um exemplo básico:

```php
use PNHS\Validator\Validator;

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
```

Sim, só isso! Basta utilizar as regras de acordo com sua necessidade, se desejar você pode contribuir com o projeto adicionando novas regras.
Na pasta **samples** possui alguns exemplos de uso.

## Regras suportados

Atualmente o PNHS Form Validator funciona com as seguintes regras:
As regras que estão <strike>riscados</strike> são as que ainda não foram implementadas.
Você pode usar o # (hashtag) após a regra para informar o codigo de erro desejado.

```
$validator->rules('username', 'required#2012|min:3#2045|max:10');
//Neste exemplo, caso o valor não seja informado será retornado o codigo de erro 2012 e caso a quantidade de caracteres seja menor que 3 caracteres será retornado o erro 2045.
```

<table>
  <tr>
    <th>Regra</th>
    <th>Descrição</th>
    <th>Código de erro</th>
  </tr>
  <tr>
    <td><b>required</b></td>
    <td>Dado obrigatório</td>
    <td><b>3001</b> * is required</td>
  </tr>
  <tr>
    <td><b>min:x</b></td>
    <td>Quantidade minima de caracteres</td>
    <td><b>3002</b> * must contain at least * characters</td>
  </tr>
  <tr>
    <td colspan="3">
        Altere <b>x</b> pela quantidade minima de caracteres desejado
    </td>
  </tr>
  <tr>
    <td><b>max:x</b></td>
    <td>Quantidade maxima de caracteres</td>
    <td><b>3003</b> must contain a maximum * characters</td>
  </tr>
  <tr>
    <td colspan="3">
        Altere <b>x</b> pela quantidade maxima de caracteres desejado
    </td>
  </tr>
  <tr>
    <td><b>exact</b></td>
    <td>Quantidade exata de caracteres</td>
    <td><b>3004</b> must contain exactly * characters</td>
  </tr>
  <tr>
    <td><b>email</b></td>
    <td>Validar Email</td>
    <td><b>3005</b> is not valid</td>
  </tr>
  <tr>
    <td><b>array</b></td>
    <td>Validar Array</td>
    <td><b>3006</b> is not valid</td>
  </tr>
  <tr>
    <td rowspan="9"><b>password:x</b></td>
    <td rowspan="9">Validar Email</td>
    <td>
      <strike>3007 the password cannot contain repeated characters</strike>
    </td>
  </tr>
  <tr>
    <td><strike>3008 you cannot use this password</strike></td>
  </tr>
  <tr>
    <td><b>3009</b> must contain uppercase characters</td>
  </tr>
  <tr>
    <td><b>3010</b> must contain lowercase characters</td>
  </tr>
  <tr>
    <td><b>3011</b> must contain uppercase characters and numbers</td>
  </tr>
  <tr>
    <td><b>3012</b> must contain numbers</td>
  </tr>
  <tr>
    <td><strike>3013 * must contain special characters</strike></td>
  </tr>
  <tr>
    <td><strike>3014 * must contain special characters and numbers</strike></td>
  </tr>
  <tr>
    <td><strike>3015 * must contain special characters and uppercase characters</strike></td>
  </tr>
  <tr>
    <td colspan="3">
        Altere <b>x</b> por umas destas opçoes<br />
        <strike>0 para verificação basica 3007 e 3008</strike><br />
        <b>1</b> para exigir letras maisculas<br />
        <b>2</b> para exigir letras maisculas e numeros<br />
        <strike>3 para exigir letras maisculas, numeros e caracteres especiais</strike>
    </td>
  </tr>
  <tr>
    <td><b>name</b></td>
    <td>Validar Nome</td>
    <td><strike>3016 is not valid</strike></td>
  </tr>
  <tr>
    <td><b>username:x</b></td>
    <td>Validar Nome de usuário</td>
    <td><strike>3017 is not valid</strike></td>
  </tr>
  <tr>
    <td colspan="3">
        Altere <b>x</b> por umas destas opçoes<br />
        <strike>0 para permitir apenas letras minusculas</strike><br />
        <strike>1 para permitir apenas anteriores e numeros</strike><br />
        <strike>2 para permitir apenas anteriores e underline</strike><br />
        <strike>3 para permitir apenas anteriores e letras maisculas</strike><br />
    </td>
  </tr>
</table>

## Contribuição

Toda contribuição é bem vinda. Se você deseja incluir novas regras, fique à vontade para explorar o código, veja como é bastante simples integrar qualquer regra à biblioteca.

## Licença

- MIT License

# PNHS Form-validator [![Build Status](https://travis-ci.org/nicolahsss/form-validator.png)](https://travis-ci.org/nicolahsss/form-validator)

O Form Validator é uma biblioteca de código aberto para validação de dados recebidos de usuários por formulários ou outros meios. O foco é ser simples e ter uma arquitetura compatível com os recursos mais modernos do PHP.

## Ajude o Projeto a continuar, faça uma doação!

[![Pague com PagSeguro - é rápido, grátis e seguro!](https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/209x48-doar-assina.gif)](https://pag.ae/7VUx6v4sL)

## Instalação

### Composer

Se você já conhece o **Composer** (o que é extremamente recomendado), simplesmente abra o terminal, prompt ou powershell na pasta de seu projeto e digite:

```
composer require pnhs/form-validator:"dev-master"
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

<table>
    <tr>
        <th>Regra</th>
        <th></th>
        <th>Code</th>
    </tr>
    <tr>
        <td>required</td>
        <td>Dado obrigatório</td>
        <td>3001: * is required</th>
    </tr>
    <tr>
        <td>min:x</td>
        <td>Quantidade minima de caracteres</td>
        <td>3002: * must contain at least 8 characters</td>
    </tr>
    <tr>
        <td>max:x</td>
        <td>Quantidade maxima de caracteres</td>
        <td>3003: * must contain a maximum 60 characters</td>
    </tr>
    <tr>
        <td>exact</td>
        <td>Quantidade exata de caracteres</td>
        <td>3004: * must contain exactly 60 characters</td>
    </tr>
</table>

## Contribuição

Toda contribuição é bem vinda. Se você deseja incluir novas regras, fique à vontade para explorar o código, veja como é bastante simples integrar qualquer regra à biblioteca.

## Licença

- MIT License

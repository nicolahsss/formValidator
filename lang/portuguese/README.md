# Form Validator [![Build Status](https://travis-ci.com/seraf-im/formValidator.svg?branch=master)](https://travis-ci.com/seraf-im/formValidator)

<p align = "center">
  <a href="https://github.com/seraf-im/formValidator#form-validator-"> Inglês </a> |
  <span> Português </span>
</p>

O Form Validator é uma biblioteca de código aberto para validação de dados recebidos de usuários por formulários ou outros meios. O foco é ser simples e ter uma arquitetura compatível com os recursos mais modernos do PHP.

Disponibilizamos um exemplo utilizando "Form URL Encoded" (envio através de formulário HTML simples) e um exemplo JSON (envio através do VUE-JS), sugerimos que teste ambos os exemplo fazendo a <b>Instalação para teste</b>, logo abaixo

## Ajude o Projeto a continuar, doe um café!

[![Pague com PagSeguro - é rápido, grátis e seguro!](https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/209x48-doar-assina.gif)](https://pag.ae/7VUx6v4sL)
ou faça PIX c6@seraf.im

## Instalação para teste

Para testar antes de incluir em seu projeto, abra o terminal, prompt ou powershell e rode os comandos abaixo:

```
git clone https://github.com/seraf-im/formValidator.git
cd formValidator
composer install --no-dev
cd samples
php -S localhost:8000
```

Lembrando que é necessário que tenha previamente instalado o PHP e o GIT.

## Instalação em seu projeto

### Composer

Se você já conhece o **Composer** (o que é extremamente recomendado), simplesmente abra o terminal, prompt ou powershell na pasta de seu projeto e digite:

```
composer require pnhs/form_validator
```

## Como usar

Essa é a melhor parte. Não poderia ser mais simples, veja um exemplo básico:

```php
use Pnhs\FormValidator\Validator;

$form = [
    "username" => "nicolahsss",
    "password" => "senhasenha"
];

$validator = new Validator($form);

/*
 * required: É obrigatório
 * no_empty: Não pode ser enviado em branco
 * min_len: Quantidade mínima de caracteres
 * max_len: Quantidade máxima de caracteres
 */
$username = $validator->rules('username', 'required|no_empty|min_len:3|max_len:10');
$password = $validator->rules('password', 'required|no_empty|min_len:8');

//Se houver erros, retorna json com os erros, caso esteja tudo OK retorna NULL
$errors = $validator->errors();

//Veja o resultado
var_dump($username, $password, $errors ?? "OK");
```

Sim, apenas isso! Basta utilizar as regras de acordo com sua necessidade, se desejar você pode contribuir com o projeto adicionando novas regras.
Na pasta **samples** possui exemplos de uso de todas as regras.

## Regras suportados

Atualmente o Form Validator funciona com as seguintes regras, lembre-se você sempre pode adicionar mais:

<table>
  <tr>
    <th>Regra</th>
    <th>Informação</th>
    <th>Detalhe</th>
  </tr>
  <tr>
    <td><b>array</b></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>date</b></td>
    <td>Formato de data padrão Y-m-d</td>
    <td>Se sua data tiver outro padrão por exemplo d/m/Y, basta utilizar desta forma <b>"date:d/m/Y"</b>. O retorno sempre segue o padrão Y-m-d</td>
  </tr>
    <tr>
    <td><b>datetime</b></td>
    <td>Formato de data padrão Y-m-d H:i:s</td>
    <td>Se sua data tiver outro padrão por exemplo d/m/Y H:i:s, basta utilizar desta forma <b>"date:d/m/Y H:i:s"</b>. O retorno sempre segue o padrão Y-m-d H:i:s</td>
  </tr>
  <tr>
    <td><b>decimal</b></td>
    <td>2 casas decimais no padrão</td>
    <td>Se desejar usar numero de casas decimais diferente de 2, use desta forma <b>"decimal:x"</b>, alterando o <b>x</b> pelo numero de casas decimais desejados.</td>
  </tr>
  <tr>
    <td><b>email</b></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>exact:x</b></td>
    <td></td>
    <td>Para definir a quantidade de caracteres altere o <b>x</b> pela quantidade desejada</td>
  </tr>
  <tr>
    <td><b>integer</b></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>max_len:x</b></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>min_len:x</b></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="3">
      Para <b>min_len</b> e <b>max_len</b>, altere o <b>x</b> pela quantidade de caracteres desejado
    </td>
  </tr>
  <tr>
    <td><b>no_empty</b></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>numeric</b></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>required</b></td>
    <td></td>
    <td>Pode ser vazio, se deseja o campo seja requerido e não vazio use as duas regras</td>
  </tr>
  <tr>
    <td><b>string</b></td>
    <td></td>
    <td></td>
  </tr>
</table>

# Código de erro personalizado

Você pode usar o # (cerquilha / Jogo da Velha) após a regra para informar o código de erro personalizado se desejar.

```
$validator->rules('username', 'required#2012|min:3#9999|max:10');
//Neste exemplo, caso o valor não seja informado será retornado o código de erro personalizado "2012", caso a quantidade de caracteres seja menor que 3 será retornado o erro personalizado "9999"
```

## Regras futuras

<ul>
  <li>Usuário</li>
  <li>Política de senha</li>
  <li>Validação de documentos*</li>
  <li>Validação de telefones*</li>
</ul>
*Estamos procurando a melhor maneira de incluir essas regras, pois elas mudam por tipo de documento, estado e país.

## Contribuição

Toda contribuição é bem vinda. Se você deseja incluir novas regras, fique à vontade para explorar o código, veja como é bastante simples integrar qualquer regra à biblioteca.

## Tradução

Colabore também incluindo e corrigindo as traduções

## Licença

- MIT License

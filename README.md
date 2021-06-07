# Form Validator [![Build Status](https://travis-ci.com/seraf-im/formValidator.svg?branch=master)](https://travis-ci.com/seraf-im/formValidator)

<p align = "center">
  <span> English </span> |
  <a href="https://github.com/seraf-im/formValidator/blob/main/lang/README.md#form-validator-"> Portuguese </a>
</p>

Form Validator is an open source library for validating data received from users by forms or other means. The focus is to be simple and have an architecture compatible with the latest features of PHP.

We provide an example using "Form URL Encoded" (submission via simple HTML form) and a JSON example (submission via VUE-JS), we suggest you test both examples by doing <b>Installation for testing</b>, logo bellow

## Help the Project to continue, donate a coffee!

[![Pague com PagSeguro - é rápido, grátis e seguro!](https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/209x48-doar-assina.gif)](https://pag.ae/7VUx6v4sL)
or pix for brazilians: c6@seraf.im

## Installation for testing

To test before including it in your project, open the terminal, prompt or powershell and run the commands below:

```
git clone https://github.com/seraf-im/formValidator.git
cd formValidator
composer install --no-dev
cd samples
php -S localhost:8000
```

Remembering that it is necessary that you have previously installed PHP and GIT.

## Installation in your project

### Composer

If you already know **Composer** (which is highly recommended), simply open the terminal, prompt or powershell in your project folder and type:

```
composer require pnhs/form_validator
```

## How to use

That's the best part. It couldn't be simpler, see a basic example:

```php
use Pnhs\FormValidator\Validator;

$form = [
    "username" => "nicolahsss",
    "password" => "password26"
];

$validator = new Validator($form);

/*
 * required: Is required
 * no_empty: Cannot be sent blank
 * min_len: Minimum number of characters
 * max_len: Maximum number of characters
 */
$username = $validator->rules('username', 'required|no_empty|min_len:3|max_len:10');
$password = $validator->rules('password', 'required|no_empty|min_len:8');

//If there are errors, it returns json with the errors, if everything is fine, it returns NULL
$errors = $validator->errors();

//See the result
var_dump($username, $password, $errors ?? "OK");
```

**Yes, just that!** Just use the rules according to your need, if you wish you can contribute to the project by adding new rules.
In the **samples** folder there are examples of using all the rules.

## Supported Rules

Currently the Form Validator works with the following rules, remember you can always add more:

<table>
  <tr>
    <th>Rule</th>
    <th>Information</th>
    <th>Details</th>
  </tr>
  <tr>
    <td><b>array</b></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>date</b></td>
    <td>Y-m-d standard date format</td>
    <td>If your date has another pattern for example d/m/Y, just use this way <b>"date:d/m/Y"</b>. The return always follows the Y-m-d pattern</td>
  </tr>
    <tr>
    <td><b>datetime</b></td>
    <td>Y-m-d H:i:s standard date format</td>
    <td>If your date has another pattern for example d/m/Y H:i:s, just use this way <b>"date:d/m/Y H:i:s"</b>. The return always follows the pattern Y-m-d H:i:s</td>
  </tr>
  <tr>
    <td><b>decimal</b></td>
    <td>2 standard decimal places</td>
    <td>If you want to use a number of decimal places other than 2, use <b> "decimal: x" </b>, changing <b> x </b> to the desired number of decimal places.</td>
  </tr>
  <tr>
    <td><b>email</b></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><b>exact:x</b></td>
    <td></td>
    <td>To define the number of characters, change the <b>x</b> to the desired amount</td>
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
      For <b> min_len </b> and <b> max_len </b>, change <b> x </b> to the desired number of characters
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
    <td>It can be empty, if you want the field to be required and not empty use both rules</td>
  </tr>
  <tr>
    <td><b>string</b></td>
    <td></td>
    <td></td>
  </tr>
</table>

# Custom error code

You can use the # (hash) after the rule to enter the custom error code if you wish.

```
$validator->rules('username', 'required#2012|min:3#9999|max:10');
//In this example, if the value was not entered, the custom error code "2012" will be returned, if the number of characters is less than 3, the custom error "9999" will be returned.
```

## Future rules

<ul>
  <li>username</li>
  <li>Password policy</li>
  <li>Document Validation*</li>
  <li>Phone validation*</li>
</ul>
*We are looking for the best way to include these rules as they change by document type, state and country.

## Contribution

Every contribution is welcome. If you want to add new rules, feel free to explore the code, see how simple it is to integrate any rule into the library.

## Translation

Also collaborate by including and correcting translations.

## License

- MIT License

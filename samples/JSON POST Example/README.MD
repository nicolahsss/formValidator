
# PNHS Form-validator [![Build Status](https://travis-ci.org/nicolahsss/form-validator.png)](https://travis-ci.org/nicolahsss/form-validator)



O Form Validator é uma biblioteca de código aberto para validação de dados recebidos de usuários por formulários ou outros meios. O foco é ser simples e ter uma arquitetura compatível com os recursos mais modernos do PHP.

## Ajude o Projeto a continuar, faça uma doação!


[![Pague com PagSeguro - é rápido, grátis e seguro!](https://stc.pagseguro.uol.com.br/public/img/botoes/doacoes/209x48-doar-assina.gif)](https://pag.ae/7VUx6v4sL)

## JSON POST Example - Aplicações SPA
frontend
```
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JSON POST Example</title>
  </head>
  <body>
    <div id="app"></div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
      var app = new Vue({
        el: "#app",
        template: `
          <div id="container">
            Username: <input type="text" name="username" v-model="data.username" /> {{error.username}}<br />
            Password: <input type="password" name="password" v-model="data.password" /> {{error.password}}<br />
            <br /><input type="submit" v-on:click="save" value="Cadastrar" /> {{info}}
          </div>
        `,
        data() {
          return {
            error: {
              username: "",
              password: ""
            },
            data: {
              username: "",
              password: ""
            },
            info: ""
          };
        },
        methods: {
          save() {
            console.log(this.username);
            axios
              .post("JSON%20POST%20Example/server.php", this.data)
              .then(response => {
                let data = response.data;
                if (data.status === "ok") {
                  this.info = "Tudo ok, não houve erros";
                  this.error = { username: "", password: "" };
                } else {
                  this.info = "";
                  this.error = data.errors;
                }
              });
          }
        }
      });
    </script>
  </body>
</html>
```

backend
```
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

<?php 

session_start();

include_once('./conexao.php');

if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && !empty($_POST['senha']))
{
  $email = $conecte->escape_string($_POST['email']);
  $senha = $conecte->escape_string($_POST['senha']);

  $sql = "SELECT * FROM users WHERE email=?";

  $dados = $conecte->prepare($sql);

  $dados->bind_param('s', $email);

  $dados->execute();

  $resultad = $dados->get_result();

  if($resultad->num_rows > 0)
  {
    $user =  $resultad->fetch_assoc();

    if($senha === $user['senha'])
    {
      echo 'Deu bom';
    }
    else
    {
      echo 'senha invalida';
    }
  }


}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <!-- JavaScript Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <!-- CSS Projeto -->
    <link rel="stylesheet" href="css/style.css" />
    <title>Login</title>
  </head>
  <body>
    <div class="container col-11 col-md-9" id="form_container">
      <div class="row align-items-center gx-5">
        <div class="col-md-6 order-md-2">
          <h3>Faça o Login para continuar</h3>
          <!-- Formulário -->
          <form method="post">
            <!-- E-mail -->
            <div class="form-floating mb-3">
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Insira seu e-mail"
              />
              <label for="email" class="form-label">Insira seu e-mail</label>
            </div>
            <!-- Senha -->
            <div class="form-floating mb-3">
              <input
                type="password"
                class="form-control"
                id="senha"
                name="senha"
                placeholder="Insira sua senha"
              />
              <label for="senha" class="form-label">Insira sua senha</label>
            </div>
            <!-- Botão -->
            <div class="col-12" id="enviar">
              <input type="submit" class="btn btn-primary" value="Entrar" />
            </div>
          </form>
        </div>
        <!-- Imagem -->
        <div class="col-md-6 order-md-1">
          <div class="col-12">
            <div class="img-fluid"></div>
          </div>
          <!-- Redirecionamento -->
          <div class="col-12" id="link_container">
            <a href="./register/cad.php">Ainda não possuo cadastro</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

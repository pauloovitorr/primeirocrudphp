<?php

session_start();

include_once('../conexao.php');

if(!empty($_SESSION['email']))
{
    if($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['id']))
    {
        $id = $conecte->escape_string($_GET['id']);

        $sql = "SELECT * FROM usuarios WHERE id= $id";

        $acao = $conecte->query($sql);

        if($acao->num_rows > 0)
        {
            $dados = $acao->fetch_assoc();

        }
    }
    elseif($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $id = $conecte->escape_string($_POST['cod']);
        $nome = $conecte->escape_string($_POST['nome']);
        $email =  $conecte->escape_string($_POST['email']);
        $telefone =  $conecte->escape_string($_POST['telefone']);

        $sql = "UPDATE usuarios SET nome='$nome', email = '$email', telefone = '$telefone' WHERE id = $id";

        $conecte->query($sql);

        header('Location:./home.php');
    }
}
else
{
    header('Location:../index.php');
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- CSS Projeto -->
    <link rel="stylesheet" href="../css/style.css" />
    <title>Cadastro</title>
</head>

<body>


    <div class="container col-8 col-md-7" id="form_container">

        <div class="col-md-6 order-md-1 m-0 m-auto">
          <h3>Editando usuário</h3>
          <!-- Formulário -->
          <form method="post">

          <!-- Input do type hidden -->

          <input type="hidden" name="cod" value=<?php echo $dados['id'] ?> >

            <!-- Nome -->
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control"
                id="nome"
                name="nome"
                placeholder="Digite seu nome"
                value= "<?php echo $dados['nome'] ? $dados['nome'] : '' ?>"
              />
              <label for="nome" class="form-label">Digite seu nome completo</label>
            </div>
            
            <!-- E-mail -->
            <div class="form-floating mb-3">
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Digite seu e-mail"
                value= "<?php echo $dados['email'] != '' ? $dados['email'] : '' ?>"
              />
              <label for="email" class="form-label">Digite seu e-mail</label>
            </div>
            <!-- Senha -->
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control"
                id="tel"
                name="telefone"
                placeholder="Digite seu telefone"
                value=" <?php echo $dados['telefone'] != '' ? $dados['telefone'] : '' ?>"
              />
              <label for="senha" class="form-label">Digite seu telefone</label>
            </div>
            <!-- Botão -->
            <div class="col-12" id="enviar">
              <input type="submit" name="editar" class="btn btn-primary" value="Editar" />
            </div>
          </form>
        </div>
        
    </div>

</body>

</html>
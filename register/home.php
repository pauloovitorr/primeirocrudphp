<?php

session_start();



include_once('../conexao.php');

$dados = '';


if (!isset($_SESSION['email'])) {
    unset($_SESSION['email']);
    header('Location:' . '../index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM usuarios";

    $dados = $conecte->query($sql);
}


if($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['nome']))
{
    $nome = $_GET['nome'];

    $sql = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%'";

    $dados =  $conecte->query($sql);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['cod'])) {
    $cod = $conecte->escape_string($_POST['cod']);

    $sql = "DELETE FROM usuarios WHERE id=$cod";

    $conecte->query($sql);

    header('Location:./home.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['sair'])) {


    unset($_SESSION['email']);
    
    session_destroy();

    header('Location:' . '../index.php');

}

$conecte->close();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- CSS Projeto -->
    <link rel="stylesheet" href="../css/style.css" />
    <title>Cadastro</title>
</head>

<body>

</br>


    <form method="get" class="menuu">
        <div><i class="fa-solid fa-user"> <?php echo $_SESSION['nome'] ?></i></div>
        <div><button type="submit" id="btnsair" name="sair" value="sair" class="btn btn btn-secondary">Sair</button></div>
        
    </form>


    <div class="container col-11 col-md-9" id="form_container">
        <h1 class="text-center mt-4">Lista de usuários</h1>

        <!-- form de busca -->
        <form method="get" class="d-flex justify-content-center">
            <div class="form-group col-5 m-1">
                <input type="text" class="form-control" id="exampleInputEmail1" name="nome" placeholder="Buscar usuário por nome">
            </div>
            <button type="submit" class="btn btn-outline-secondary">Buscar</button>
        </form>

        <table class="table caption-top" style="text-align: center;">
            <caption>Tabela de usuários</caption>
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                </tr>
            </thead>
            <tbody >

                <?php

                if ($dados->num_rows > 0) {
                    while ($dados_convetido = $dados->fetch_assoc()) {
                        echo '<tr>' . '<td>' . $dados_convetido['id'] . '</td>';
                        echo '<td>' . $dados_convetido['nome'] . '</td>';
                        echo '<td>' . $dados_convetido['email'] . '</td>';
                        echo '<td>' . $dados_convetido['telefone'] . '</td>';
                        echo '<td>' . "<form action='./editar.php' method='get'><input type='hidden' name='id'  value=\"" . $dados_convetido['id'] . "\"><input id='editar' type='submit'  value='Editar'></form> ." . '</td>';
                        echo '<td>' . "<form action='' method='post'><input type='hidden' name='cod'  value=\"" . $dados_convetido['id'] . "\"><button id='excluir' type={'submit'}>Excluir</button></form> ." . '</td>' . '</tr>';
                    }
                }
                else
                {
                    echo '<h1> Sem usuário </h1>';
                }

                ?>



            </tbody>

        </table>
        <a class="btn btn-primary" href="./cad_usuario.php">Cadastrar</a>
    </div>

</body>

</html>
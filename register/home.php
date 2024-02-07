<?php

session_start();



include_once('../conexao.php');

$dados ='';

if (!isset($_SESSION['email'])) {
    unset($_SESSION['email']);
    header('Location:' . '../index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM usuarios";

    $dados = $conecte->query($sql);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- CSS Projeto -->
    <link rel="stylesheet" href="../css/style.css" />
    <title>Cadastro</title>
</head>

<body>




    <div class="container col-11 col-md-9" id="form_container">
        <h1 class="text-center mt-4">Lista de usuários</h1>

        <table class="table caption-top">
            <caption>Tabela de usuários</caption>
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                </tr>
            </thead>
            <tbody>

                <?php

                    if($dados->num_rows > 0)
                    {
                        while($dados_convetido = $dados->fetch_assoc())
                        {
                            echo '<tr>'.'<td>'.$dados_convetido['id'].'</td>';
                            echo '<td>'.$dados_convetido['nome']. '</td>';
                            echo '<td>'.$dados_convetido['email']. '</td>';
                            echo '<td>'.$dados_convetido['telefone']. '</td>'.'</tr>';
                        }
                    }

                ?>


            </tbody>

        </table>
        <a class="btn btn-primary" href="./cad_usuario.php">Cadastrar</a>
    </div>

</body>

</html>
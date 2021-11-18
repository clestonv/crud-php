<?php     
    include "../controller/validar.php"; 
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/estilo.css">
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cadastro</title>
</head>

<body>

    <?php 

    $pesquisa = $_POST['busca'] ?? '';

    include "../controller/conexao.php";
  
    $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

    $dados = mysqli_query($conn, $sql);  

  ?>

    <div class="container-fluid">
        <header class="colsm-6  mw-100 mt-2 shadow p-3 mb-5 bg-success bg-gradient rounded text-white">
            <h3 class="text-center">Usuários</h3>
            <a href="../controller/logout.php" role="button" class="btn btn-danger btn-sm">Sair</a>
        </header>
        <div class="row justify-content-center mt-5">
            <div class="col-8 colsm-6 shadow-lg p-3 mb-5 bg-body rounded">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <form class="d-flex gap-2" method="post" action="index.php">
                            <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search"
                                name="busca" autofocus>
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                            <a href="../controller/cadastro.php" class="btn btn-primary" >Cadastrar</a>
                        </form>
                    </div>
                </nav>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($linha = mysqli_fetch_assoc($dados) ) {
                            $nome = $linha['nome'];
                            $email = $linha['email'];
                            $codigo = $linha['cod_pessoa'];
                            $foto = $linha['foto'];
                            echo "<tr>
                                    <td><img src='../img/$foto' class='lista_foto'/></td>
                                    <td>$nome</td>
                                    <td>$email</td>
                                    <td><a href='../controller/editar.php?id=$codigo' class='btn btn-success'>Editar</a></td>
                                    <td><button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirma'
                                    onclick=" .'"' ."getdate($codigo, '$nome')" .'"' ." >Deletar</button></td>
                                </tr>";
                        }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../controller/delete.php" method="POST">
                    <div class="modal-body">
                        <p>Deseja Excluir <b id="nome_pessoa">Nome da Pessoa</b>?</p>                     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                        <input type="hidden" id="cod_pessoa" name="cod_pessoa" value="cod_pessoa">
                        <input type="hidden" id="nome_pessoa1" name="nome" value="cod_pessoa">
                        <input type="submit" class="btn btn-danger" value="Excluir" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script type="text/javascript">
    function getdate(id, nome) {
        document.getElementById('nome_pessoa').innerHTML = nome;
        document.getElementById('cod_pessoa').value = id;
        document.getElementById('nome_pessoa1').value = nome;
    }
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../js/validateForm.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
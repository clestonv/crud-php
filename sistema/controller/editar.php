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

    <title>Editar Cadastro</title>
</head>

<body>
    <?php 

    include "conexao.php";
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM pessoas WHERE cod_pessoa = $id";

    $dados = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);
    $foto = $linha['foto'];
    
    ?>
    <div class="container-fluid">
        <header class="mw-100 mt-2 shadow p-3 mb-5 bg-success bg-gradient rounded text-white">
            <h3 class="text-center">Editar Cadastro</h3>
        </header>
        <div class="row justify-content-center mt-5">
            <div class="col-3 colsm-6 shadow-lg p-3 mb-5 bg-body rounded">
                <form method="post" class="needs-validation" novalidate action="update_cad.php">
                    <div class="form-group">
                        <?php echo "<img src='../img/$foto' title='$foto' id='foto_edit' class='foto_edit'/>"; ?>
                        <div class="valid-feedback">
                            Muito Bom!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01" class=".col-form-label text-success">Nome Completo</label>
                        <input type="text" class="form-control mt-1" id="validationCustom01" value="<?php echo $linha['nome']; ?>" required
                            name="nome">
                        <div class="valid-feedback">
                            Muito Bom!
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <label for="validationCustom03" class=".col-form-label text-success">E-mail</label>
                        <input type="email" class="form-control mt-1" id="validationCustom03" required name="email" value="<?php echo $linha['email']; ?>">
                        <div class="invalid-feedback">
                            Digite seu email.
                        </div>
                    </div>

                    <div class="form-group mt-2 gap-2">
                        <button class="btn btn-primary form-control" type="submit">Salvar</button>
                        <a href='../view' class='btn btn-success form-control mt-2'>Voltar</a>
                        <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa']?>">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

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
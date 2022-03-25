<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cadastro</title>
</head>

<body>

    <div class="container-fluid">
        <header class="mw-100 mt-2 shadow p-3 mb-5 bg-success bg-gradient rounded text-white">
            <h3 class="text-center">Teste System</h3>
        </header>
        <div class="row justify-content-center mt-5">

            <div class="col-3 colsm-6 shadow-lg p-3 mb-5 bg-body rounded">
                <h4 class="text-center mt-1 text-success">Login</h4>
                <form class="needs-validation" novalidate action="index.php" method="post">

                    <div class="form-group mt-1">
                        <label for="validationCustomUsername" class=".col-form-label text-success">Login</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" class="form-control" id="validationCustomUsername"
                                aria-describedby="inputGroupPrepend" required name="login">
                            <div class="invalid-feedback">
                                Digite seu nome.
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-1">
                        <label for="validationCustom03" class=".col-form-label text-success">Password</label>
                        <input type="password" class="form-control" id="validationCustom03" required name="senha">
                        <div class="invalid-feedback">
                            Digite uma senha.
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <button class="btn btn-primary form-control" type="submit">Login</button>
                    </div>

                </form>
                
                <!-- SCRIPT PHP -->
                <?php 
                    if(isset($_POST['login'])) {
                    $login = $_POST['login'];
                    $senha = md5($_POST['senha']);

                    include "controller/conexao.php";
                    $sql = "SELECT * FROM `users` WHERE login = '$login' AND senha = '$senha' ";

                        if ($result = mysqli_query($conn, $sql)) {
                            $num_registros = mysqli_num_rows($result);
                                if ($num_registros == 2) {
                                $linha = mysqli_fetch_assoc($result);

                                    if (($login == $linha['login']) and ($senha == $linha['senha'])) {
                                        session_start();
                                        $_SESSION['login'] = $login;   
                                        header("location: view");
                                    } else {
                                        echo "<div class='mt-2 gap-3 alert alert-danger' role='alert'>
                                        Login e Senha Incorretos !!
                                    </div>";
                                    }
                                } else {
                                    echo "<pre>
                                    " . var_dump($num_registros);
                                    "</pre>";
                                    
                                        echo "<div class='mt-2 gap-3 alert alert-danger' role='alert'>
                                        Login e Senha Incorretos !!</div>";
                                }                 
                        } else {
                            echo "<div class='mt-2 gap-3 alert alert-danger' role='alert'>
                            Nenhum Resultado do Banco !!</div>";
                        }    
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="js/validateForm.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
</html>
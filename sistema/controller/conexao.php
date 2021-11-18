<?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "empresa";

    if($conn = mysqli_connect($server, $user, $pass, $bd)) {

    } else {
        echo "Error!";
    }

    function mensagem( $texto, $tipo ) {
        echo "<div class='mt-2 gap-3 alert alert-$tipo' role='alert'>
                $texto
            </div>";
    }

    function mover_foto($vetor_foto) {
        if (!$vetor_foto['error']) {
            $nome_arquivo = date('Ymdhms') .".jpg";
            move_uploaded_file($vetor_foto['tmp_name'], "../img/".$nome_arquivo);
            return $nome_arquivo;
        } else {
            return 0;
        }
    }
?>
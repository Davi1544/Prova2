<?php

    require 'includes/conexao.php';
    $data = str_replace("/", "-", $_POST["data"]);
    $data = date('Y-m-d', strtotime($data));

    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $historico = $_POST['historico'];
    $cheque = $_POST['cheque'];

    $sql = "INSERT INTO fluxo_caixa VALUES(NULL, '$data', '$tipo', '$valor', '$historico', '$cheque')";
    $res = mysqli_query($con, $sql);
    if(mysqli_affected_rows($con) == 1){
        header("Location:index.php");
    } else{
        echo "Falha na gravação do registro<br>";
    }

?>
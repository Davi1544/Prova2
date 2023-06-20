<?php

    require 'includes/conexao.php';
    $data = str_replace("/", "-", $_POST["data"]);
    $data = date('Y-m-d', strtotime($data));

    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $historico = $_POST['historico'];
    $cheque = $_POST['cheque'];

    $sql = "update fluxo_caixa set data = '$data', tipo = '$tipo', valor = '$valor', historico = '$historico', cheque = '$cheque' where id = ".$id;
    $res = mysqli_query($con, $sql);

    if(mysqli_affected_rows($con) == 1){
        header("Location:Listar_fluxo_caixa.php");
    } else{
        echo "Falha na gravação do registro<br>";
    }
?>
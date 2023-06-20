<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Alterar</title>

        <?php
            require "includes/conexao.php";
            $sql = "SELECT * FROM fluxo_caixa where id = ".$_GET['id'];

            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            mysqli_close($con);

            $valor = 0;
            $historico = '';
            $op1 = '<option value="sim">Sim</option>';
            $op2 = '<option value="nao">Não</option>';

            foreach($result as $key => $row){
            
                $data = $row['data'];

                if($row['tipo'] == "entrada"){
                    $ent = "checked";
                    $sa = "";
                }else{
                    $ent = "";
                    $sa = "checked";
                }

                $valor = $row['valor'];
                $historico = $row['historico'];

                if($row['cheque'] == 'sim'){
                    $op1 = '<option value="sim">Sim</option>';
                    $op2 = '<option value="nao">Não</option>';
                }else{
                    $op2 = '<option value="sim">Sim</option>';
                    $op1 = '<option value="nao">Não</option>';
                }
            }

        ?>

</head>
<body>
    <form action="Altera_fluxo_caixa_exe.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
        <br>
        <label for="">Data:</label>
        <input type="date" class="form-control" name="data" placeholder="Data" id="" value="<?php echo $data;?>" required>
        <br>
        <label for="">Tipo:</label>
        <input type="radio" name="tipo" id="" value="entrada" required <?php echo $ent;?>>Entrada
        <input type="radio" name="tipo" id="" value="saida" required <?php echo $sa;?>>Saída

        <br><br>
        <label for="">Valor</label>
        <input type="number" class="form-control" name="valor" placeholder="valor" id="" step=".01" required value="<?php echo $valor;?>">

        <br><br>
        <label for="">Historico</label>
        <input type="text" class="form-control" name="historico" placeholder="historico" id="" required value="<?php echo $historico;?>">

        <br><br>
        <label for="">Cheque</label>
        <select name="cheque" id="" required>
            <?php
                echo $op1;
                echo $op2;
            ?>
        </select>

        <br><br>
        <input type="submit" class="form-control" value="Alterar">
    </form>
</body>
</html>
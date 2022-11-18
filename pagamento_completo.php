<?php
    //Conexão com o banco
    $server = "localhost";
    $user = "root";
    $password = "banco1020";
    $dbname = "clientes_l2";

    $connect = mysqli_connect($server,$user,$password,$dbname);

    // Teste de conexão com o banco:
    //
    // if($connect = mysqli_connect($server, $user, $password, $dbname)) {
    //     echo"Conexão Realizada!";
    // } else {
    //     print "erro";
    // }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 03</title>
</head>
<style>
    table {
        border: 2px solid #000;
    }
    table tr th {
        border: 2px solid #000;
        padding: 5px 10px;
    }
    table tr td {
        border: 2px solid #000;
        padding: 5px 10px;
    }
</style>
<body>
    <table>
        <tr>
            <th>NOME:</th>
            <th>VALOR TOTAL</th>
        </tr>
        <?php
            $exibeDados = "SELECT * FROM pessoas WHERE inadimplencia = 'N'";
            $dadosQuery = mysqli_query($connect, $exibeDados);
            while($dados = mysqli_fetch_array($dadosQuery)) {            
            $puxarInfos = "SELECT * FROM contratos WHERE id=".$dados['id_contrato'].";";
            $infosQuery = mysqli_query($connect, $puxarInfos);
            $dadosContratos = mysqli_fetch_array($infosQuery);
        ?>

        <?php 
            $valorParcela = $dadosContratos['valor_parcela'];
            $qtParcelas = $dadosContratos['parcelas'];
            $resultado = $valorParcela * $qtParcelas;
        ?>
            <tr>
                <td><?php echo $dados['nome'];?></td>
                <td><?php echo $resultado;?></td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>
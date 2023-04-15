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
            <th>DATA:</th>
            <th>VALOR PARCELA:</th>
        </tr>
        <?php
            $exibeDados = "SELECT * FROM pessoas WHERE inadimplencia = 'S'";
            $dadosQuery = mysqli_query($connect, $exibeDados);
            while($dados = mysqli_fetch_array($dadosQuery)) {
            $puxarInfos = "SELECT * FROM pagamentos WHERE id_pessoa=".$dados['id'].";";
            $pegarDados = "SELECT * FROM contratos WHERE id=".$dados['id_contrato'].";";
            $infosQuery = mysqli_query($connect, $puxarInfos);
            $infoDadosQuery = mysqli_query($connect, $pegarDados);
            $dadosContratos = mysqli_fetch_array($infoDadosQuery);
            $dadosPagamentos = mysqli_fetch_array($infosQuery);
        ?>
            <tr>
                <td><?php echo $dados['nome'];?></td>
                <td><?php echo $dadosPagamentos['dt_pagamento'];?></td>
                <td><?php echo $dadosContratos['valor_parcela'];?></td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>

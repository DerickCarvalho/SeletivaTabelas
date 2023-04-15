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
    .botao {
        text-decoration: none;
    }
</style>
<body>
    <table>
        <tr>
            <th>NOME:</th>
            <th>CONTRATO_ID:</th>
            <th>INADIMPLENTE:</th>
            <th>DT_COMPLETO:</th>
        </tr>
        <?php
            $exibeDados = "SELECT * FROM pessoas";
            $dadosQuery = mysqli_query($connect, $exibeDados);
            while($dados = mysqli_fetch_array($dadosQuery)) {
        ?>
            <tr>
                <td><?php echo $dados['nome'];?></td>
                <td><?php echo $dados['id_contrato'];?></td>
                <td><?php echo $dados['inadimplencia'];?></td>
                <td><?php echo $dados['dt_completo'];?></td>
        </tr>
        <?php
            }
        ?>
    </table>
    <a class="botao" href="./inadimplentes.php">Ver Inadimplentes</a>
    <a class="botao" href="./pagamento_completo.php">Ver Pagamentos Completos</a>
</body>
</html>

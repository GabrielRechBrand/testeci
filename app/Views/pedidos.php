<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Pedidos</title>
    <style>
        ul.pagination li {
            display: inline;
        }

        ul.pagination li a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        .active {
            background-color: #4CAF50;
            color: white;
        }

        ul.pagination li a:hover:not(.active) {
            background-color: #ddd;
        }
        a, a:hover {
            color: #4CAF50;
        }
    </style>
    <script>
        function confirma() {
            if(!confirm('Você realmente deseja excluir esse pedido?')) {
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<div class="container mt-5">
    <?php echo anchor(base_url('pedido/create/'), 'Criar novo pedido', ['class' => 'btn btn-success mb-3']) ?>
    <?php echo anchor(base_url('produto/'), 'Acessar os produtos', ['class' => 'btn btn-success mb-3']) ?>
    <?php echo anchor(base_url('fornecedor/'), 'Acessar os fornecedores', ['class' => 'btn btn-success mb-3']) ?>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Chave_NFE</th>
            <th>ID do Fornecedor</th>
            <th>ID do Produto</th>
            <th>Quantidade</th>
            <th>Valor total</th>
            <th>Estado</th>
        </tr>
        <?php foreach($pedidos as $pedido) :?>
            <tr>
                <td><?php echo $pedido['id_pedido']?></td>
                <td><?php echo $pedido['chave_nfe']?></td>
                <td><?php echo $pedido['id_fornecedor']?></td>
                <td><?php echo $pedido['id_produto']?></td>
                <td><?php echo $pedido['quantidade']?></td>
                <td><?php echo $pedido['valor_total']?></td>
                <td><?php echo $pedido['estado']?></td>
                <td>
                    <?php echo anchor('pedido/edit/'.$pedido['id_pedido'], 'Editar') ?>
                    -
                    <?php echo anchor('pedido/delete/'.$pedido['id_pedido'], 'Excluir', ['onclick' => 'return confirma()']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $pager->links(); ?>
</div>
</body>
</html>
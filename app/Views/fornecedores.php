<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Fornecedores</title>
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
        a {
            font-weight: bold;
            font-size: 13px;
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
        <?php echo anchor(base_url('fornecedor/create'), 'Criar novo fornecedor', ['class' => 'btn btn-success mb-3']) ?>
        <?php echo anchor(base_url('pedido/index/id_pedido'), 'Acessar os pedidos', ['class' => 'btn btn-success mb-3']) ?>
        <?php echo anchor(base_url('produto/index/id_produto'), 'Acessar os produtos', ['class' => 'btn btn-success mb-3']) ?>
        <br>
        |
        <?php echo anchor(base_url("/fornecedor/index/id_fornecedor"), 'Ordenar por ID') ?>
        |
        <?php echo anchor(base_url("/fornecedor/index/nome"), 'Ordenar por Nome') ?>
        |
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
            <?php foreach($fornecedores as $fornecedor) :?>
                <tr>
                    <td><?php echo $fornecedor['id_fornecedor']?></td>
                    <td><?php echo $fornecedor['nome']?></td>
                    <td>
                        <?php echo anchor('fornecedor/edit/'.$fornecedor['id_fornecedor'], 'Editar') ?>
                        -
                        <?php echo anchor('fornecedor/delete/'.$fornecedor['id_fornecedor'], 'Excluir', ['onclick' => 'return confirma()']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $pager->links(); ?>
    </div>
</body>
</html>

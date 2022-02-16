<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Home</title>
    <style>
        body {
            background-image: linear-gradient(45deg, #4caf50 1.36%, #ffffff 1.36%, #ffffff 50%, #4caf50 50%, #4caf50 51.36%, #ffffff 51.36%, #ffffff 100%);
            background-size: 1453.81px 1453.81px;
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Olá! Bem vindo ao seu gerenciador de pedidos.</h1>
        <br>
        <?php echo anchor(base_url('pedido/index/id_pedido'), 'Acessar os pedidos', ['class' => 'btn btn-success mb-3']) ?>
        <br>
        <?php echo anchor(base_url('produto/index/id_produto'), 'Acessar os produtos', ['class' => 'btn btn-success mb-3']) ?>
        <br>
        <?php echo anchor(base_url('fornecedores/index/id_produto'), 'Acessar os fornecedores', ['class' => 'btn btn-success mb-3']) ?>
    </div>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Criar um fornecedor</title>
    <style>
        div {
            margin-left: 25px;
            max-width: 800px;
            max-height: 600px;
        }
    </style>
</head>
<body>
    <div class="containter mt-5">
        <?php echo form_open('fornecedor/store') ?>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" value="<?php echo isset($fornecedor['nome']) ? $fornecedor['nome'] : '' ?>" name="nome" id="nome" class="form-control" autocomplete="off">
        </div>
        <div>
            <input type="submit" value="Salvar" class="btn btn-primary">
            <input type="hidden" name="id_fornecedor" value="<?php echo isset($fornecedor['id_fornecedor']) ? $fornecedor['id_fornecedor'] : '' ?>">
        </div>
        <?php echo form_close() ?>
    </div>
</body>
</html>

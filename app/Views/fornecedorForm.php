<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Criar um fornecedor</title>
</head>
<body>
    <div class="containter mt-5">
        <?php echo form_open('fornecedor/store') ?>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" value="<?php echo isset($fornecedor['nome']) ? $fornecedor['nome'] : '' ?>" name="nome" id="nome" class="form-control">
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary">
        <input type="hidden" name="id" value="<?php echo isset($produto['id_produto']) ? $produto['id_produto'] : '' ?>">
        <?php echo form_close() ?>
    </div>
</body>
</html>

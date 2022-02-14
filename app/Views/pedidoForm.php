<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Edição de pedidos</title>
    <style>
    </style>
</head>
<body>
    <div class="containter mt-5">
        <?php echo form_open(base_url('pedido/store/')) ?>
        <div class="form-group">
            <label for="chave_nfe">Chave NFE</label>
            <input type="text" value="<?php echo isset($pedido['chave_nfe']) ? $pedido['chave_nfe'] : '' ?>" name="chave_nfe" id="chave_nfe" class="form-control">
        </div>
        <div class="form-group">
            <label for="fornecedor">Fornecedor</label>
            <input type="fornecedor" value="<?php echo isset($pedido['fornecedor']) ? $pedido['fornecedor'] : '' ?>" name="fornecedor" id="fornecedor" class="form-control">
        </div>
        <div class="form-group">
            <label for="idProduto">ID do Produto</label>
            <input type="idProduto" value="<?php echo isset($pedido['idProduto']) ? $pedido['idProduto'] : '' ?>" name="idProduto" id="idProduto" class="form-control">
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="quantidade" value="<?php echo isset($pedido['quantidade']) ? $pedido['quantidade'] : '' ?>" name="quantidade" id="quantidade" class="form-control">
        </div>
        <div class="form-group">
            <label for="valorTotal">Quantidade</label>
            <input type="valorTotal" value="<?php echo isset($pedido['valorTotal']) ? $pedido['valorTotal'] : '' ?>" name="valorTotal" id="valorTotal" class="form-control">
        </div>
        <div class="form-group">
            <label for="estado">Quantidade</label>
            <input type="estado" value="<?php echo isset($pedido['estado']) ? $pedido['estado'] : '' ?>" name="estado" id="estado" class="form-control">
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary">
        <input type="hidden" name="chave_nfe" value="<?php echo isset($pedido['chave_nfe']) ? $pedido['chave_nfe'] : '' ?>">
        <?php echo form_close() ?>
    </div>
</body>
</html>
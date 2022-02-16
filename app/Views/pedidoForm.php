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
        div {
            margin-left: 25px;
            max-width: 800px;
            max-height: 600px;
        }
        label {
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <div class="containter mt-5">

        <?= \Config\Services::validation()->listErrors(); ?>

        <?php echo form_open('pedido/store') ?>
        <div class="form-group">
            <label for="chave_nfe">Chave NFE</label> <br>
            <input type="text" value="<?php echo isset($pedido['chave_nfe']) ? $pedido['chave_nfe'] : $chave_nfe ?>" name="chave_nfe" id="chave_nfe" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="fornecedor">ID_Fornecedor</label>
            <select id="id_fornecedor" class="form-control" name="id_fornecedor">
                <option value="<?php echo isset($pedido['id_fornecedor']) ? $pedido['id_fornecedor'] : '' ?>"><?php echo isset($pedido['id_fornecedor']) ? $fornecedor['nome'] : 'Selecione um Fornecedor' ?></option>
                <?php foreach ($fornecedores as $fornecedor) :?>
                    <option value=<?php echo $fornecedor['id_fornecedor'] ?>><?php echo $fornecedor['nome'] ?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group">
            <label for="idProduto">Produto</label>
            <select id="id_produto" class="form-control" name="id_produto">
                <option value="<?php echo isset($pedido['id_produto']) ? $pedido['id_produto'] : '' ?>"><?php echo isset($pedido['id_produto']) ? $produto['nome'] : 'Selecione um Produto' ?></option>
                <?php foreach ($produtos as $produto) :?>
                    <option value=<?php echo $produto['id_produto'] ?>><?php echo $produto['nome'] ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label> <br>
            <input type="number" step="1" min="1" max="" name="quantidade" value="<?php echo isset($pedido['quantidade']) ? $pedido['quantidade'] : '1' ?>" title="quantidade" class="input-text quantidade text" size="4" pattern="" inputmode="">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label> <br>
            <select id="estado" class="form-control" name="estado" >
                <option value="<?php echo isset($pedido['estado']) ? $pedido['estado'] : '' ?>"><?php echo isset($pedido['estado']) ? $pedido['estado'] : '' ?></option>
                <option value="Aberto">Aberto</option>
                <option value="Pago">Pago</option>
                <option value="Cancelado">Cancelado</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Salvar" class="btn btn-primary">
            <input type="hidden" name="id_pedido" value="<?php echo isset($pedido['id_pedido']) ? $pedido['id_pedido'] : '' ?>">
        </div>
        <?php echo form_close() ?>
    </div>
</body>
</html>
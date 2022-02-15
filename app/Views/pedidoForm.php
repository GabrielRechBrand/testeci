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
        label {
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <div class="containter mt-5">
        <?php echo form_open('pedido/store') ?>
        <div class="form-group">
            <label for="chave_nfe">Chave NFE</label> <br>
            <?php echo $chave_nfe?>
        </div>
        <div class="form-group">
            <label for="fornecedor">ID_Fornecedor</label>
            <select>
                <option value="">--Escolha uma opção--</option>
                <?php foreach ($fornecedores as $fornecedor) :?>
                    <option value=<?php $fornecedor['id_fornecedor'] ?>><?php echo $fornecedor['nome'] ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="idProduto">Produto</label>
            <select>
                <option value="">--Escolha uma opção--</option>
                <?php foreach ($produtos as $produto) :?>
                <option value=<?php $produto['id_produto'] ?>><?php echo $produto['nome'] ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="quantidade" value="<?php echo isset($pedido['quantidade']) ? $pedido['quantidade'] : '' ?>" name="quantidade" id="quantidade" class="form-control">
        </div>
        <div class="form-group">
            <label for="valorTotal">Valor total</label>
            <label><?php echo $produto['preço'] ?></label>
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary">
        <input type="hidden" name="chave_nfe" value="<?php echo isset($pedido['chave_nfe']) ? $pedido['chave_nfe'] : '' ?>">
        <?php echo form_close() ?>
    </div>
</body>
</html>
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FornecedorModel;
use App\Models\PedidoModel;
use App\Models\ProdutoModel;

class Pedido extends BaseController
{

    private $pedidoModel;
    private $produtoModel;
    private $fornecedorModel;

    public function __construct()
    {
        $this->pedidoModel = new PedidoModel();
        $this->produtoModel = new ProdutoModel();
        $this->fornecedorModel = new FornecedorModel();
    }

    public function index()
    {
        return view('pedidos', [
            'pedidos' => $this->pedidoModel->orderBy("estado", "asc")->paginate(20),
            'pager' => $this->pedidoModel->pager
        ]);
    }

    public function delete($id_pedido)
    {
        if($this->pedidoModel->delete($id_pedido)) {
            echo view('messages', [
                'message' => 'Pedido excluído com sucesso!'
            ]);
        } else {
            echo "Erro.";
        }
    }

    public function create()
    {
        return view('pedidoForm', [
            'produtos' => $this->produtoModel->orderBy("id_produto", "asc")->paginate(20),
            'fornecedores' => $this->fornecedorModel->orderBy("nome", "asc")->paginate(20),
            'pager' => $this->produtoModel->pager,
            'chave_nfe' => $this->generateRandomString(20),
        ]);
    }

    public function store()
    {
        helper(['form', 'url']);
        if (! $this->validate([
            'quantidade' => 'required',
            'id_fornecedor' => 'required',
            'id_produto' => 'required',
            'estado' => 'required'
        ])) {
            echo view('pedidoForm', [
                'validation' => $this->validator,
                'produtos' => $this->produtoModel->orderBy("id_produto", "asc")->findAll(20),
                'fornecedores' => $this->fornecedorModel->orderBy("nome", "asc")->findAll(20),
                'pager' => $this->produtoModel->pager,
                'chave_nfe' => $this->generateRandomString(20)
            ]);
        } else {
            $quantidade = $this->request->getVar('quantidade');
            $id_produto = $this->request->getVar('id_produto');
            $id_pedido = $this->request->getVar('id_pedido');
            $produto = $this->produtoModel->asObject($id_produto);
            $data = [
                'valor_total' => $produto->preço * $quantidade
            ];
            if ($this->pedidoModel->save($this->request->getPost())) {
                $this->pedidoModel->update($id_pedido, $data);
                return view("messages", [
                    'message' => 'Pedido salvo com sucesso'
                ]);
            } else {
                echo "Ocorreu um erro.";
            }
        }
    }

    public function edit($id_pedido)
    {
        return view('pedidoForm', [
            'pedido' => $this->pedidoModel->find($id_pedido),
            'chave_nfe' => $this->generateRandomString(20),
            'produtos' => $this->produtoModel->orderBy("id_produto", "asc")->findAll(20),
            'fornecedores' => $this->fornecedorModel->orderBy("nome", "asc")->findAll()
        ]);
    }

    function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

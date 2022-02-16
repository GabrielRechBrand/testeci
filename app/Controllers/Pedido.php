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

    public function index($orderBy)
    {
        return view('pedidos', [
            'pedidos' => $this->pedidoModel->orderBy($orderBy, 'asc')->paginate(20),
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
            $produto = $this->produtoModel->find($id_produto);
            $valor_total = $produto['preço'] * $quantidade;
            $data = $this->request->getRawInput();
            $data['valor_total'] = $valor_total;
            if ($this->pedidoModel->save($data)) {
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
        $pedido = $this->pedidoModel->find($id_pedido);

        return view('pedidoForm', [
            'pedido' => $this->pedidoModel->find($id_pedido),
            'chave_nfe' => $this->generateRandomString(20),
            'produto' => $this->produtoModel->find($pedido['id_produto']),
            'produtos' => $this->produtoModel->orderBy("id_produto", "asc")->findAll(20),
            'fornecedor' => $this->fornecedorModel->find($pedido['id_fornecedor']),
            'fornecedores' => $this->fornecedorModel->orderBy("nome", "asc")->findAll()
        ]);
    }

    public function search($id_pedido=null) {

        return view('pedidos', [
            'pedidos' => $this->pedidoModel->where('id_pedido', $id_pedido)->paginate(20),
            'pager' => $this->pedidoModel->pager
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

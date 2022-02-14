<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PedidoModel;

class Pedido extends BaseController
{

    private $pedidoModel;

    public function __construct()
    {
        $this->pedidoModel = new PedidoModel();
    }

    public function index()
    {
        return view('pedidos', [
            'pedidos' => $this->pedidoModel->orderBy("estado", "asc")->paginate(20),
            'pager' => $this->pedidoModel->pager
        ]);
    }

    public function delete($chave_nfe)
    {
        if($this->pedidoModel->delete($chave_nfe)) {
            echo view('messages', [
                'message' => 'Pedido excluído com sucesso!'
            ]);
        } else {
            echo "Erro.";
        }
    }

    public function create()
    {
        return view('pedidoForm');
    }

    public function store()
    {
        if ($this->pedidoModel->save($this->request->getPost())) {
            return view("messages", [
                'message' => 'Pedido salvo com sucesso'
            ]);
        } else {
            echo "Ocorreu um erro.";
        }
    }

    public function edit($chave_nfe)
    {
        return view('pedidoForm', [
            'pedido' => $this->pedidoModel->find($chave_nfe)
        ]);
    }

}

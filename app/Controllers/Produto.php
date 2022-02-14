<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdutoModel;

class Produto extends BaseController
{

    private $produtoModel;

    public function __construct()
    {
        $this->produtoModel = new ProdutoModel();
    }

    public function index()
    {
        return view('produtos', [
            'produtos' => $this->produtoModel->paginate(20),
            'pager' => $this->produtoModel->pager
        ]);
    }

    public function delete($id)
    {
        if($this->produtoModel->delete($id)) {
            echo view('messages', [
                'message' => 'Produto excluído com sucesso!'
            ]);
        } else {
            echo "Erro.";
        }
    }

    public function create()
    {
        return view('form');
    }

    public function store()
    {
        if ($this->produtoModel->save($this->request->getPost())) {
            return view("messages", [
                'message' => 'Produto salvo com sucesso'
            ]);
        } else {
            echo "Ocorreu um erro.";
        }
    }

    public function edit($id)
    {
        return view('form', [
            'produto' => $this->produtoModel->find($id)
        ]);
    }

}

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

    public function index($orderBy)
    {
        return view('produtos', [
            'produtos' => $this->produtoModel->orderBy($orderBy, "asc")->paginate(20),
            'pager' => $this->produtoModel->pager
        ]);
    }

    public function delete($id_produto)
    {

        if($this->produtoModel->delete($id_produto)) {
            echo view('messages', [
                'message' => 'Produto excluído com sucesso!'
            ]);
        } else {
            echo "Erro.";
        }
    }

    public function create()
    {
        return view('produtoForm');
    }

    public function find($id_produto)
    {
        return $this->find($id_produto);
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

    public function edit($id_produto)
    {
        return view('produtoForm', [
            'produto' => $this->produtoModel->find($id_produto)
        ]);
    }

}

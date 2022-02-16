<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FornecedorModel;
use App\Models\ProdutoModel;

class Fornecedor extends BaseController
{

    private $fornecedorModel;

    public function __construct()
    {
        $this->fornecedorModel = new FornecedorModel();
    }

    public function index($orderBy)
    {
        return view('fornecedores', [
            'fornecedores' => $this->fornecedorModel->orderBy($orderBy, "asc")->paginate(20),
            'pager' => $this->fornecedorModel->pager
        ]);
    }

    public function delete($id_fornecedor)
    {
        if($this->fornecedorModel->delete($id_fornecedor)) {
            echo view('messages', [
                'message' => 'Fornecedor excluído com sucesso!'
            ]);
        } else {
            echo "Erro.";
        }
    }

    public function create()
    {
        return view('fornecedorForm');
    }

    public function store()
    {
        if ($this->fornecedorModel->save($this->request->getPost())) {
            return view("messages", [
                'message' => 'Fornecedor salvo com sucesso'
            ]);
        } else {
            echo "Ocorreu um erro.";
        }
    }

    public function edit($id_fornecedor)
    {
        return view('fornecedorForm', [
            'fornecedor' => $this->fornecedorModel->find($id_fornecedor)
        ]);
    }

}

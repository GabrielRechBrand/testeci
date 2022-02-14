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
}

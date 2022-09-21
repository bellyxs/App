<?php

namespace App\Controller;

use App\Model\ProdutoModel;
use App\Controller\Controller;

class ProdutoController extends Controller

{   public static function index()
    {
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();
        $model->getAllRows();

        $nome = "";

        parent::render("Produto/ProdutoListar", $model);
    }

    public static function form()
    {
        include 'Model/ProdutoModel.php';
        $model = new ProdutoModel();
 
        if(isset($_GET['id']))
            $model = $model->getById($_GET['id']);

           include 'View/modules/Produto/ProdutoCadastro.php';
    }


    public static function save()
    {

        include 'Model/ProdutoModel.php';

        $produto = new ProdutoModel();
        $produto->id = $_POST['id'];
        $produto->nome = $_POST['nome'];
        $produto->preco = $_POST['preco'];
        $produto->descricao = $_POST['descricao'];


        $produto->save();
        header("Location: /produto");
    }

    public static function delete()
    {
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();

        $model->delete((int) $_GET['id']);

        header("Location: /produto");
    }
}

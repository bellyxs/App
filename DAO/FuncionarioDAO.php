<?php

namespace App\DAO;

use App\Model\FuncionarioModel;
use \PDO;

class FuncionarioDAO extends DAO
{
    function __construct()
    {
        return parent::__construct();
    }


    function insert(FuncionarioModel $model)
    {
        $sql = "INSERT INTO funcionario
                (nome, rg, data_nasc, email, telefone) 
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->rg);       
        $stmt->bindValue(3, $model->data_nascimento);
        $stmt->bindValue(4, $model->email);
        $stmt->bindValue(5, $model->telefone);
        $stmt->execute();
    }

    public function update(FuncionarioModel $model)
    {
        $sql = "UPDATE funcionario SET nome=?, rg=?, data_nasc=?, email=?, telefone=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->rg);        
        $stmt->bindValue(3, $model->data_nascimento);
        $stmt->bindValue(4, $model->email);
        $stmt->bindValue(5, $model->telefone);        
        $stmt->bindValue(6, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM funcionario ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectById(int $id)
    {
        include_once 'Model/FuncionarioModel.php';

        $sql = "SELECT * FROM funcionario WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\FuncionarioModel");
    }


    public function delete(int $id)
    {
        $sql = "DELETE FROM funcionario WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}


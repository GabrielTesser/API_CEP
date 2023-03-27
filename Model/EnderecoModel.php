<?php

namespace App\Model;

use App\DAO\EnderecoDAO;
use App\Controller\Controller;

use Exception;

class EnderecoModel extends Model
{
    public $id_logradouro, $tipo, $rows, $descricao, $id_cidade, $uf, $complemento, $descricao_sem_numero, $descricao_cidade, $codigo_cidade_ibge, $descricao_bairro, $bairro;

    public $arr_cidades;
    
    public function getLogradouroByCep(int $cep)
    {
        try
        {
            $dao = new EnderecoDAO();

            return $dao->selectByCep($cep);
        } catch(Exception $e)
        {
            throw $e;
        }
    }

    public function getCepByLogradouro($logradouro)
    {
        try
        {
            $dao = new EnderecoDao();

            $this->$rows = $dao->selectCepByLogradouro($logradouro);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function getLogradouroByBairroAndCidade(string $bairro, int $id_cidade)
    {
        try
        {
            $dao = new EnderecoDAO();

        }
        catch(Exception $e)
        {
            parent::getExeptionAsJson($e);
        }

    }

    public function getBairrosByIdCidade() : void
    {
        try{
            $id_cidade = parent::getIntFormUrl(isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null);
        
            $model = new EnderecoModel();
            $model->getBairrosByIdCidade($id_cidade);

            parent::getResponsAsJason($e);
        }
        catch(Exception $e)
        {
            parent::getExeptionAsJson($e);
        }
    }

}
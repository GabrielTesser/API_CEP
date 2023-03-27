<?php

namespace App\Controller;

use App\Model\{EnderecoModel, CidadeModel};
use Exception;

class EnderecoController extends Controller
{

  
    public static function getLogradouroByCep() : void
    {
        try
        {
            $logradouro = $_GET['logradouro'];

            $model = new EnderecoModel();
            $model->getCepByLogradouro($logradouro);

            parent::getExceptionAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getLogradouroByBairroAndCidade() : void
    {
        try
        {
            $bairro = parent::getIntFormUrl(isset($_GET['bairro']) ? $_GET['bairro'] : null, 'bairro');

            $id_cidade = parent::getIntFormUrl(isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null, 'cep');

            $model = new EnderecoModel();

            $model->getLogradouroByBairroAndCidade($bairro, $id_cidade);

            parent::getResponseAsJSON($model->rows);
        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getCidadeByUF()
    {
        try
        {
            $uf = $_GET['uf'];

            $model = new CidadeModel();
            $model->getCidadeByUF($uf);

            parent::getResponseAsJSON($model->rows);
        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getBairrosByIdCidade() : void
    {
    try
        {
            $id_cidade = parent::getIntFormUrl(isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null);

            $model = new EnderecoModel();
            $model->getBairrosByIdCidade($id_cidade);

            parent::getResponseAsJSON($model->rows);
        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }   

}
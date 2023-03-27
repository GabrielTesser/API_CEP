<?php

namespace App\Model;

use App\DAO\EnderecoDAO;

class CidadeModel extends CidadeModel
{
    public $id_cidade, $descricao, $uf, $codigo_ibge, $ddd, $rows;

    public function getCidadeByUF($uf)
    {
        $dao = new EnderecoDao();

        $this->rows = $dao->selectCidadeByUf($uf);
    }
}
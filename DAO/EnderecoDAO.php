<?php

namespace APP\DAO;

use APP\Model\EnderecoModel;

class EnderecoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectByCep(int $cep)
    {
        $sql = "SELECT * FROM logradouro WHERE cep = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $cep);
        $stmt->execute();


        $enderco_obj = $stmt->fetchObject("App\MODEl\EnderecoModel");
        $enderco_obj->arr_cidades = $this->selectCidadeByUf($enderco_obj->UF);

        return $enderco_obj;
    }

    public function selectLogradouroByBairroAndCidade(string $bairro, int $id_cidade)
    {
        $sql = "SELECT * FROM logradouro WHERE descricao_bairro = ? AND id_cidade = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $bairro);
        $stmt->bindValue(2, $id_cidade);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectCidadeByUf($uf)
    {
        $sql = "SELECT * FROM cidade WHERE uf = ? ORDER BY descricao ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $uf);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function SelectBairrobyIdCiadade(int $id_cidade)
    {
        $sql = "SELECT descricao_bairro FROM logradouro WHERE id_ciade = ? GROUP BY descricao_bairro";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $$id_cidade);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectCepByLOgradouro($logradouro)
    {
        $sql = "SELECT * FROM logradouro WHERE descricao_sem_numero LIKE :q";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([':q' => '%'. $logradouro. "%"]);

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }


}
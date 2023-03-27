<?php

use App\Controller\EnderecoController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url)
{
    //http://localhost:8000/endereco/by-cep?cep=17210580
    case '/endereco/by-cep':
        EnderecoController::getLogradouroByCep();
    break;

    //http://localhost:8000/logradouro/by-bairro?id_cidade=4874&bairro=Jardim América
    case '/logradouro/by-bairro':
        EnderecoController::getLogradouroByBairroAndCidade();
    break;

    //http://localhost:8000/cep/by-logradouro?logradouro=Rua Raphel de Almeida Leite
    case '/cidade/by-uf':
        EnderecoController::getCidadeByUF();
    break;

    //http://localhost:8000/bairro/by-cidade?id=4874
    case '/bairro/by-cidade':
      EnderecoController::getBairrosByIdCidade();
    break;

    default:
        http_response_code(403);
    break;
}
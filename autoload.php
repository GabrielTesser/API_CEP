<?php

spl_autoload_register(function($nome_de_classe)
{
    $nome_de_classe = str_replace('\\', '/', $nome_de_classe);

    $arquivo = BASEDIR. '/'. $nome_de_classe. '.php';

    if(file_exists($arquivo))
    {
        include $arquivo;
    }else
    exit('Arquivo não encontrado. Arquivo:'. $arquivo . "<br/>");
});
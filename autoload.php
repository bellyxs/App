<?php 


spl_autoload_register(function($nome_da_classe)

{
    $arquivo = dirname(__FILE__,2). '/' . $nome_da_classe . '.php';

    if (file_exists($arquivo))
    {
        include $arquivo;

    } else
        exit('Arquivo não encontrado. Arquivo: ' . $arquivo . "<br />");

});
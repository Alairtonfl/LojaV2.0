<?php
spl_autoload_register(function($nome_arquivo){
    if(file_exists('Class/'.$nome_arquivo.'.php')){
        require 'Class/'.$nome_arquivo.'.php';
    } 
});
?>
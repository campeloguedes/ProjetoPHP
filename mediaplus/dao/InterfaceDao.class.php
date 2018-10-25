<?php

interface InterfaceDao {

   	function salvar($obj);
    function atualizar($objj);
    function listarTodos();
    function listarPorId($id);
    function excluir($id);
    function listarOrdenado($field);  
    function listarOnde($param);
    
}

?>
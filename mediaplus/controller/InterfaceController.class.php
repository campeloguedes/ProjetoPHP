<?php

interface InterfaceController {

   	function salvar($obj);
    function listarTodos();
    function listarPorId($id);
    function excluir($id);

    
}

?>
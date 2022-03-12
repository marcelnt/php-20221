<?php 
    /***********************************************************************
     * Objetivo: Arquivo responsavel por manipular os dados dentro do BD 
     *      (insert, update, select e delete)
     * Autor: Marcel
     * Data: 11/03/2022
     * Versão: 1.0
    ************************************************************************/
    
    // import do arquivo que estavbece a conexão com o BD
    require_once('conexaoMysql.php');

    //Função para realizar o insert no BD
    function insertContato($dadosContato)
    {
        //Abre aconexão com o BD
        $conexao = conexaoMysql();

        //Monta o script para enviar para o BD
        $sql = "insert into tblcontatos 
                    (nome, 
                     telefone, 
                     celular, 
                     email, 
                     obs)
                values 
                    ('".$dadosContato['nome']."', 
                    '".$dadosContato['telefone']."', 
                    '".$dadosContato['celular']."', 
                    '".$dadosContato['email']."', 
                    '".$dadosContato['obs']."');";

       
        //Executa o scriipt no BD
        mysqli_query($conexao, $sql);

    }

    //Função para realizar o update no BD
    function updateContato()
    {

    }

    //Função para excluir no BD
    function deleteContato()
    {

    }

    //Função para listar todos os contatos do BD
    function selectAllContatos()
    {

    }

?>
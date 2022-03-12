<?php 
    /***********************************************************************
     * Objetivo: Arquivo responsavel pela maniupulação de dados de contatos
     *  Obs(Este arquivo fará a ponte entre a View e a Model)
     * Autor: Marcel
     * Data: 04/03/2022
     * Versão: 1.0
    ************************************************************************/

    //Função para receber dados da View e encaminhar para a model (Inserir)
    function inserirContato ($dadosContato)
    {
        //Validação para verificar se o objeto esta vazio
        if(!empty($dadosContato))
        {
            //Validação de caixa vazia dos elementos nome, celular e email, 
            //pois são obrigatórios no BD
            if(!empty($dadosContato['txtNome']) && !empty($dadosContato['txtCelular']) && !empty($dadosContato['txtEmail']))
                {
                    //Criação do array de dados que será encaminhado a model
                    //para inserir no BD, é importante criar este array conforme
                    //as necessidades de manipulação do BD.
                    //OBS: criar as chaves do array conforme os nomes dos atributos
                        //do BD
                    $arrayDados = array (
                        "nome"      => $dadosContato['txtNome'],
                        "telefone"  => $dadosContato['txtTelefone'],
                        "celular"   => $dadosContato['txtCelular'],
                        "email"     => $dadosContato['txtEmail'],
                        "obs"       => $dadosContato['txtObs']
                    );

                    require_once('model/bd/contato.php');
                    insertContato($arrayDados);
                }
                
            else
                echo('Dados incompletos');
        }
    }

    //Função para receber dados da View e encaminhar para a model (Atualizar)
    function atualizarContato ()
    {

    }

    //Função para realizar a exclusão de um contato
    function excluirContato ()
    {

    }

    //Função para solicitar os dados da model e encaminhar a lista 
    //de contatos para a View
    function listarContato ()
    {

    }

?>
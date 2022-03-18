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
            //Validação para veririficar se o script sql esta correto
        if (mysqli_query($conexao, $sql))
        {   
            //Validação para verificar se uma linha foi acrescentada no DB
            if(mysqli_affected_rows($conexao))
                return true;
            else
                return false;
        }
        else
            return false;

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
        //Abre a conexão com o BD
        $conexao = conexaoMysql();

        //script para listar todos os dados do BD
        $sql = "select * from tblcontatos";
        
        //Executa o scrip sql no BD e guarda o retorno dos dados, se houver
        $result = mysqli_query($conexao, $sql);

        //Valida se o BD retornou registros
        if($result)
        {
            //mysqli_fetch_assoc() - permite converter os dados do BD 
            //em um array para manipulação no PHP
            //Nesta repetição estamos, convertendo os dados do BD em um array ($rsDados), além de
            //o próprio while conseguir gerenciar a qtde de vezes que deverá ser feita a repetição
            $cont = 0;
            while ($rsDados = mysqli_fetch_assoc($result))
            {
                //Cria um array com os dados do BD
                $arrayDados[$cont] = array (
                    "nome"      =>  $rsDados['nome'],
                    "telefone"  =>  $rsDados['telefone'],
                    "celular"   =>  $rsDados['celular'],
                    "email"     =>  $rsDados['email'],
                    "obs"       =>  $rsDados['obs']
                );
                $cont++;
            }

            return $arrayDados;
        }

    }

?>
<?php 

    if(isset($_POST["acao"])){
        
        require_once("Model/FilmeDAO.php");

        session_start();
        
        $filmeDAO = new FilmeDAO();
        
        switch($_POST["acao"]){
                
            case "obterTodos":
                
                $listaFilmes = array();

                $listaFilmes = $filmeDAO->obterTodos();

                echo("<tr>");
                echo("<td style='font-weight:bold;'>");
                echo("Nome");
                echo("</td>");
                echo("<td style='font-weight:bold;'>");
                echo("Classificação");
                echo("</td>");
                echo("<td style='font-weight:bold;'>");
                echo("Estúdio");
                echo("</td>");
                echo("<td style='font-weight:bold;'>");
                echo("Atualizar");
                echo("</td>");
                echo("<td style='font-weight:bold;'>");
                echo("Remover");
                echo("</td>");
                echo("</tr>");

                foreach($listaFilmes as $filme){

                    echo("<tr>");
                    echo("<td>");
                    echo($filme->getNome());
                    echo("</td>");
                    echo("<td>");
                    echo($filme->getClassificacao());
                    echo("</td>");
                    echo("<td>");
                    echo($filme->getEstudio());
                    echo("</td>");
                    echo("<td style='text-align:center;'>");
                    echo("<img src='View/Imagens/edit.png' style='width:30px;height:30px;' onclick='obterUm(".$filme->getId().");'>");   
                    echo("</td>");
                    echo("<td style='text-align:center;'>");
                    echo("<img src='View/Imagens/delete.png' style='width:30px;height:30px;' onclick='remover(".$filme->getId().");'>");    
                    echo("</td>");
                    echo("</tr>");

                }    
                
                break;
                
            case "inserir":
                
                $filme = new Filme();

                $filme->setNome($_POST["nome"]);
                $filme->setClassificacao($_POST["classificacao"]);
                $filme->setEstudio($_POST["estudio"]); 
                
                if(!$filmeDAO->inserir($filme)){

                    echo("<font color=red>Erro ao inserir o filme. Verifique se preencheu corretamente os campos</font>");

                }
                
                break;
                
            case "atualizar":
                
                $filme = new Filme();

                $filme->setNome($_POST["nome"]);
                $filme->setClassificacao($_POST["classificacao"]);
                $filme->setEstudio($_POST["estudio"]); 
                
                $filme->setId($_SESSION["id"]);

                if(!$filmeDAO->atualizar($filme)){

                    echo("<font color=red>Erro ao atualizar o filme. Verifique se preencheu corretamente os campos</font>");

                }
                
                break;
                
            case "obterUm":
                
                if(isset($_POST["acao"]) && $_POST["acao"] == "obterUm"){
                    
                    $_SESSION["acao"] = $_POST["acao"];

                    $_SESSION["id"] = $_POST["id"];

                    $filme = new Filme();
                    
                    $filme = $filmeDAO->obterUm($_POST["id"]);
                    
                }
                
                echo(json_encode($filme));
                
                break;
                
            case "remover":
                
                if(isset($_POST["acao"]) && $_POST["acao"] == "remover"){
                    
                    if(!$filmeDAO->remover($_POST["id"])){

                        echo("<font color=red>Erro ao excluir o filme. Verifique se preencheu corretamente os campos</font>");

                    }
                    
                }
                
                break;
                
        }
        
    }

?>
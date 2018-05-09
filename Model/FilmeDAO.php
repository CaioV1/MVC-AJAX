<?php 

    require_once("Controller/Filme.php");

    define("dominio", "localhost");
    define("usuario", "root");
    define("senha", "bcd127");
    define("banco", "db_ajax_mvc_teste");

    class FilmeDAO{
        
        private static function obterConexao(){
            
            try{
                
                $conexao = new PDO("mysql:host=".dominio.";dbname=".banco, usuario, senha);
                
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (Exception $e){
                
                echo("<font color = red>Erro ao conectar com o banco.</font><br>".$e->getMessage());
                
            }
            
            return $conexao;
            
        }
        
        public function inserir(Filme $filme){
            
            $conexao = FilmeDAO::obterConexao();
            
            $SQL = "INSERT INTO tbl_filme(nome, classificacao, estudio) VALUES(?, ?, ?)";
            
            $statement = $conexao->prepare($SQL);
            
            $statement->bindValue(1, $filme->getNome());
            $statement->bindValue(2, $filme->getClassificacao());
            $statement->bindValue(3, $filme->getEstudio());
            
            $envio = $statement->execute();
            
            $conexao = null;
            
            if($envio){
                
                return true;
                
            } else {
                
                return false;
                
            }
            
        }
        
        public function obterUm($id){
            
            $conexao = FilmeDAO::obterConexao();
            
            $SQL = "SELECT * FROM tbl_filme WHERE id = ?";
            
            $statement = $conexao->prepare($SQL);
            
            $statement->bindParam(1, $id);
            
            $statement->execute();
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            
            $resultSet = $statement->fetch();
            
            $conexao = null;
            
            return $resultSet;
            
        }
        
        public function obterTodos(){
            
            $listaFilmes = array();
            
            $conexao = FilmeDAO::obterConexao();
            
            $SQL = "SELECT * FROM tbl_filme";
            
            $statement = $conexao->prepare($SQL);
            
            $statement->execute();
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            
            while($resultSet = $statement->fetch()){
                
                $filme = new Filme();
                
                $filme->setId($resultSet["id"]);
                $filme->setNome($resultSet["nome"]);
                $filme->setClassificacao($resultSet["classificacao"]);
                $filme->setEstudio($resultSet["estudio"]);
                
                $listaFilmes[] = $filme;
                
            }
            
            $conexao = null;
            
            return $listaFilmes;
            
        }
        
        public function atualizar(Filme $filme){
            
            $conexao = FilmeDAO::obterConexao();
            
            $SQL = "UPDATE tbl_filme SET nome = ?, classificacao = ?, estudio = ? WHERE id = ?";
            
            $statement = $conexao->prepare($SQL);
            
            $statement->bindValue(1, $filme->getNome());
            $statement->bindValue(2, $filme->getClassificacao());
            $statement->bindValue(3, $filme->getEstudio());
            $statement->bindValue(4, $filme->getId());
            
            $envio = $statement->execute();
            
            $conexao = null;
            
            if($envio){
                
                return true;
                
            } else {
                
                return false;
                
            }
            
        }
        
        public function remover($id){
            
            $conexao = FilmeDAO::obterConexao();
            
            $SQL = "DELETE FROM tbl_filme WHERE id = ?";
            
            $statement = $conexao->prepare($SQL);
            
            $statement->bindParam(1, $id);
            
            $envio = $statement->execute();
            
            $conexao = null;
            
            if($envio){
                
                return true;
                
            } else {
                
                return false;
                
            }
            
        }
        
    }

?>
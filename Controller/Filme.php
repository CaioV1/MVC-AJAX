<?php 

    class Filme{
        
        private $id;
        private $nome;
        private $classificacao;
        private $estudio;
        
        public function setId($id){
            
            $this->id = $id;
            
        }
        
        public function getId(){
            
            return $this->id;
            
        }
        
        public function setNome($nome){
            
            $this->nome = $nome;
            
        }
        
        public function getNome(){
            
            return $this->nome;
            
        }
        
        public function setClassificacao($classificacao){
            
            $this->classificacao = $classificacao;
            
        }
        
        public function getClassificacao(){
            
            return $this->classificacao;
            
        }
        
        public function setEstudio($estudio){
            
            $this->estudio = $estudio;
            
        }
        
        public function getEstudio(){
            
            return $this->estudio;
            
        }
        
    }

?>
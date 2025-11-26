<?php

    class Produtos{
        private $nome;
        private $categoria;
        private $preco;
        private $desconto;

        //metodos especificos

        public function cadastrar(){
            $this->getNome() && $this->getPreco();
            echo "Produto cadastrado com sucesso";
        }


        //metodo construct

        public function __construct($nome, $categoria, $preco){
            $this->nome = $nom;
            $this->categotia = $cate;
            $this->preco = $prec;
        }

        //getters e setters

        public function setNome($nom){
            $this->nome = $non;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setCategoria($cate){
            $this->categoria = $cate;
        }

        public function getCategoria(){
            return $this->categoria;
        }

        public function setPreco($prec){
            $this->preco = $prec;
        }

        public function getPreco(){
            return $this->preco;
        }

        public function setDesconto($desc){
            $this->desconto = $desc;
        }

        public function getDesconto(){
            return $this->desconto;
        }
    }


?>
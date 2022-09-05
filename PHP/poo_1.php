<?php

 class Livro{
    public $nome = "nome";
    public $autor = "autor";
    public $publicacao;
    public $qtd = 0;
    
    public function addEstoque($q){
        $this->qtd= $this->qtd + $q;
    }
    public function subEstoque($q){
        $this->qtd= $this->qtd - $q;
    }
 }
 
 $livro1 = new Livro();
 $livro2 = new Livro();
 $livro2->autor = "Elaine"; 
 print $livro1->autor;
 print "\n";
 print $livro2->autor;
 print "\n"; 
 $livro1->publicacao = 2022;
 print $livro1->publicacao;
 $livro2->publicacao = $livro1->publicacao;
 print "\n"; 
 print $livro2->publicacao;
 print "\n"; 
 print $livro2->qtd;
 $livro2->addEstoque(10);
 print "\n"; 
 print $livro2->qtd;

 // Atributos e Variáveis
 // camelCase
 // não deve começar com _
 // não é bom começar com Maiúsculo
 // não deve começar com número
 // não pode ter espaço em branco
 // não é bom usar acentos e simbolos especiais

 // Na POO as variaveis são atributos e as funções são metódos
?>


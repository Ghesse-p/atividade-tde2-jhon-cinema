<?php

  abstract class Cinema {
    public $sala;
    public $sessao;
    
  }

  class Filme extends Cinema{
    public $filme;
    public $classificacao;
    public $sessao;
    public $duracao;

    public function __construct($filme, $genero, $classificacao, $duracao){
      $this->filme = $filme;
      $this->genero = $genero;
      $this->classificacao = $classificacao;
      $this->duracao = $duracao;
    
    }
  
  }
$filme1 = new Filme("Duna", "ficcão científica", 14, 162);
echo "Filme: $filme1->filme \n Gênero: $filme1->genero \n Classificação: $filme1->classificacao \n Duração: $filme1->duracao\n";



  class Ingresso extends Filme{
    public $preco;

    public function __construct($filme, $genero, $classificacao, $sessao, $duracao, $sala, $preco){
      $this->filme = $filme;
      $this->genero = $genero;
      $this->classificacao = $classificacao;
      $this->sessao = $sessao;
      $this->duracao = $duracao;
      $this->sala = $sala;
      $this->preco = floatval($preco);
    }

  }

  $ingresso1 = new Ingresso("Duna", "ficcão científica", 14, 2, 162);
  echo "Ingresso:\n Filme: $ingresso1->filme \n sessão: $ingresso1->sessao \n Sala: $ingresso1->sala \n Preço: $ingresso1->preco duração: $ingresso1->duracao\n";


class Cliente extends Ingresso{
  private $nome_cliente;
  private $idade;
  private $email;

  //insere nome do cliente
  public function setNome($nome){
    $this->nome_cliente = $nome;
  }
  //retorna o nome inserido
  public function getNome(){
    return $this->nome_cliente;
  }

  //insere idade
  public function setIdade($idade){
    $this->idade = $idade;
    if($idade < 18){
      echo "Você não pode comprar ingresso. \n";
    }else{
      echo "Você pode comprar ingresso. \n";
    }
  }
  //retorna a idade inserido
  public function getIdade(){
    return $this->idade;
  }

  //insere email
  public function setEmail($email){
    $this->email = $email;
  }
  //retorna o email inserido
  public function getEmail(){
    return $this->email;
  }
}



class Sala extends Ingresso{
  private $numero;
  protected $assentos = 50;

  public function Comprar () {
    $this->assentos -= 1;
  }

  public function __construct($numero, $assentos){
    $this->numero = $numero;
    $this->assentos = $assentos;
  }


  public function getNumero(){
    return $this->numero;
  }

  public function getAssentos(){
    return $this->assentos;
  }
}

//pra rodar tem que ir no main

$filme1 = new Ingresso("Duna 2", 150, $sala1, 10);
$sala1 = new Sala(1, 100);
$ingresso1 = new Ingresso($filme1, $sala1, 10);
$cliente1 = new Cliente("Maria", 25);
$cliente1->Comprar(); //executa a função de compra e decrementa na quant de assentos

echo "Cliente: " . $cliente1->getNome() . "\n";
echo "Filme: " . $ingresso1->getFilme()->getTitulo() . "\n";
echo "Sala: " . $ingresso1->getSala()->getNumero() . "\n";
echo "Preço do Ingresso: $" . $ingresso1->getPreco() . "\n";

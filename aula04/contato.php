<?php

class Contato{
  private $nome = '';
  private $telefone = '';

  private static $contador = 0;

  public function __construct($nome,$telefone){
    $this->setNome($nome);
    $this->setTelefone($telefone);

    self::$contador++;
  }

  public function __destruct() { self::$contador--; }

  public function imprimir(){
    return PHP_EOL . '- Contato - ' . PHP_EOL . 'Nome: ' . $this->getNome() . PHP_EOL . 'Telefone: ' . $this->getTelefone();
  }
  public static function getNumeroContatos(){
    return self::$contador;
  }

  // getters and setters
  public function getNome(){
    return $this->nome;
  }
  public function getTelefone(){
    return $this->telefone;
  }

  public function setNome($nome){
    $this->nome = $nome;
  }
  public function setTelefone($telefone){
    if(is_numeric($telefone)){
      $this->telefone = $telefone;
    }
  }
}

$c = new Contato("POO EM PHP", "04");
echo $c->imprimir();


class ContatoProfissional extends Contato{
  private $email = '';

  public function __construct( $nome, $telefone, $email ){
    parent::__construct( $nome, $telefone );
    $this->setEmail( $email );
  }

  public function getEmail(){
    return $this->email;
  }
  public function setEmail( $email ){
    $contains = mb_strpos($email, "@");
    if($contains != false && $contains != 0 && $contains != mb_strlen($email) - 1){
      $this->email = $email;
    }
  }

  public function imprimir(){
    return parent::imprimir() . ' - Email: ' . $this->getEmail();
  }
}

$c2 = new ContatoProfissional('POO EM PHP - HERANÇA', '04', 'github@email');
echo $c2->imprimir();


echo PHP_EOL . 'Nº de contatos na agenda: ' . Contato::getNumeroContatos();

?>
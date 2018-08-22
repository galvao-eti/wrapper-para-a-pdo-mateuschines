<?php 
namespace Turma3\traits;

trait Hidratacao
{
	public function hydrate(array $dados)
  {
    //obter atributos da class
    $atributos = get_object_vars($this);//recebo um obj como parametro e retorna um array de atributos do obj
    foreach ($dados as $nome => $valor) {
      if (in_array($nome, array_keys($atributos))) {
        $this->$nome = $valor;
      }
    }
  }
}


 ?>
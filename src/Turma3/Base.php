<?php declare(strict_types = 1);

namespace Turma3;

class Base {
  public static $dbh;
  public static $arquivoLog;
  public $id;
  public $nome;


  public function __construct(array $dados, \PDO $dbh) 
  {
    self::$dbh = $dbh;
    $this->hydrate($dados);
  }

  public function conectar(\PDO $dbh)
  {
    self::$dbh = $dbh;
  }

  public function persistir()
  {
    $sql = "INSERT INTO categoria (id, nome) VALUES (NULL, :nome)";

    $sth = self::$dbh->prepare($sql);
    $sth->bindParam(':nome', $this->nome, \PDO::PARAM_STR);
    try {
      $sth->execute();
    } catch (\Exception $e){
      die($e->getMessage());
    }
  }

  public function selecionar()
  {
      $sql = "SELECT * FROM categoria ORDER BY id";
      $sth = self::$dbh->prepare($sql);

      $sth->execute();

      while ($registro = $sth->fetchObject()) {
        $id = $registro->id;
        $nome = $registro->nome;


        echo "<table><tr>
            <td>$id</td>
            <td>$nome</td>
            <td>
					<a href=\"javascript:excluir($id, '$nome')\">(Excluir) 
					</a>
                    
					<a href='ediCategoria.php?id=$id'> (Alterar)</a>

			    </td>
        </tr>
    </table>";
    }
      
  }

  public function ediCategoria($id, $nome)
		{
			$sql = "UPDATE categoria SET nome = :nome WHERE id = :id LIMIT 1";
			$sth = self::$dbh->prepare($sql);
			$sth->bindParam(':nome', $nome, \PDO::PARAM_STR);
			$sth->bindParam(':id', $id, \PDO::PARAM_INT);
			$sth->execute();
		}

  public function delCategoria($id)
  {
    $sql = "DELETE FROM categoria WHERE id = :id LIMIT 1";
    $sth = self::$dbh->prepare($sql);
    $sth->bindParam(':id', $id, \PDO::PARAM_INT);
    try {
      $sth->execute();
    } catch (\Exception $e){
      die($e->getMessage());
    }
  }
    
  public function busca($id)
  {
    $sql = "SELECT * FROM categoria WHERE id = :id LIMIT 1";
    $sth = self::$dbh->prepare($sql);
    $sth->bindParam(':id', $id, \PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetchObject();
  }

  private static function log($evento) 
  {
    $date = new \DateTime();
    self::$arquivoLog = __DIR__ . '/../../data/log/' . $date->format('Y-m-d') . '.log';
    $time = $date->format('H:m:s');
   
    file_put_contents(self::$arquivoLog, sprintf('%s %s'. PHP_EOL, $time, $evento), FILE_APPEND);//salvar o arquivo de log
  }
  
  use Traits\Hidratacao;

  public function __destruct() 
  {
    self::log('destruir objeto');
  }
}

?>

<script type="text/javascript">
	
	function excluir(id,nome){
		
		if ( confirm( "Deseja realmete excluir "+nome+" ? ") ){
			
			link = "delCategoria.php?id="+id;
			
			location.href = link;
		}
	}
</script>
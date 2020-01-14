<?php
class DBAccess
{
  const HOST_DB= 'localhost';
  const user = 'root';
  const pass = '';
  const passDB = 'ephoo8ji4Eegh9xi';
  const db_name = 'tecwebs';

  public $connection=null;

	/* Apre una connessione con il db con le variabili impostate precedentemente */
  public function openConnectionlocal()
  {
    $this->connection = mysqli_connect(static::HOST_DB, static::user, static::pass, static::db_name);
    if (!$this->connection) {
      return false;
    }

    return true;
  }
  public function openConnection()
  {
    $this->connection = mysqli_connect(static::HOST_DB, static::user, static::passDB, static::db_name);
    if (!$this->connection) {
      return false;
    }

    return true;
  }
  private function getQuery($query)
  {
    $result = mysqli_query($this->connection, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
  }



  public function closeConnection()
  {
    if ($this->connectionOpen)
      mysqli_close($this->connection);
  }
}

public function getRicette($stringaCercata){
  $query="SELECT * WHERE titolo=$stringaCercata FROM ricette;";
  $risultati=getQuery($query);
  return $risultati;
}

?>

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
  public function openConnectionlocal() {
    $this->connection = mysqli_connect(static::HOST_DB, static::user, static::pass, static::db_name);
    if (!$this->connection) {
      return false;
    }

    return true;
  }
  public function openConnection() {
    $this->connection = mysqli_connect(static::HOST_DB, static::user, static::passDB, static::db_name);
    if (!$this->connection) {
      return false;
    }

    return true;
  }
  public function closeConnection() {
    if ($this->connectionOpen)
      mysqli_close($this->connection);
  }
  
  public function getQuery($query) {
	$result =$this->connection->query($query);
    if(!$result) {
        throw new Exception("errore query");
    }
    $array_file = [];
    if($result->num_rows > 0) {
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($array_file,$row);
        }
        return $array_file;
    }
    else
        return null;
  }



}

public function getRicette($stringaCercata){
  $query="SELECT * WHERE titolo=$stringaCercata FROM ricette;";
  $risultati=getQuery($query);
  return $risultati;
}

?>

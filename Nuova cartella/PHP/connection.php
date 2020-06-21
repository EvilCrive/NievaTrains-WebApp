<?php
class DBAccess{
	const HOST_DB='localhost';
	const user='root';
	const pass='';
	const db_name='orangetangodb';
	
	private $connection=null;
	
	public function openConnectionlocal() {
		$this->connection = mysqli_connect(static::HOST_DB, static::user, static::pass, static::db_name);
		if (!$this->connection) {
		return false;
		}
		return true;
	}
	
	public function closeConnection() {
		if ($this->connection) mysqli_close($this->connection);
    }
	
	public function getQuery($query) {
		$result =$this->connection->query($query);
        if(!$result) {
            throw new Exception("errore getquery");
        }
        $lista_return = [];
        if($result->num_rows > 0) {
          while($row = $result->fetch_array(MYSQLI_ASSOC)) {
              array_push($lista_return,$row);
            }
            return $lista_return;
        }
        else
            return null;
    }
	public function exeQuery($query) {
		try{
			$result=$this->connection->query($query);
			if(!$result) throw new Exception("errore executeQuery");
		}
		catch(Exception $e){
		}		
	}
}

?>
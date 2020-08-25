<?php
class DBAccess{
	const HOST_DB='localhost';
	const user='root';
	const pass='';
	const db_name='trains';
	
	private $connection=null;
	
	public function openConnection() {
		$this->connection = mysqli_connect(static::HOST_DB, static::user, static::pass, static::db_name);
		if (!$this->connection) {
			return false;
		}
		return true;
	}
	
	public function closeConnection() {
		if ($this->connection) mysqli_close($this->connection);
    }
	public function getConnection() {
		return $this->connection;
	}
	
	public function getQuery($query){
		try{
			$result =$this->connection->query($query);
        	if(!$result)	throw new Exception("errore get query");
        	$listaReturn = [];
        	if($result->num_rows > 0) {
				while($row = $result->fetch_array(MYSQLI_ASSOC)){	
					array_push($listaReturn,$row);
				}
        		return $listaReturn;
        	}else{
				return null;
			}
		}catch(Exception $e){echo $e;}
	}

	public function exeQuery($query){
		try{
			$result=$this->connection->query($query);
			if(!$result) throw new Exception("errore execute query in the db");
			return $result;
		}catch(Exception $e){
			echo $e;
		}		
	}	
}

?>
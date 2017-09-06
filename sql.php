<?php 

class sql extends PDO{

	private $conn;
	
	public function __cunstruct(){

		$this->conn = new PDO("mysql:host=localhost; bdname=dbphp7", "root","b@ncoded@dos");
	}

	private function setParams($statment, $parameters = array()){

		foreach ($parameters as $key => $value) {
			
			$this->setParam($key, $value);
		}		

	} 


	private function setParam($statment, $key, $value){

		$statment->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array()){

		$stmt = $this->conn->prepare($rawQuery);

		$stmt->execute();

		$this->setParams($stmt, $params);
		return $stmt;
	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchALL(PDO ::FETCH_ASSOC);

	}

}



?>
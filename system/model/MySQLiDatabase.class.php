<?php
//include system exception
require_once("system/exception/DatabaseException.class.php");

class  MySQLiDatabase{
	public $MySqli;
	protected $host;
	protected $user;
	protected $password;
	protected $database;
	protected $charset;
	protected $queryCount;

	
	public function __construct($host,$user,$password,$database){
		$this->host=$host;
		$this->user=$user;
		$this->password=$password;
		$this->database=$database;
		//Connecting to mysql server
		$this->connect();
	}

	//database connect
	public function connect(){
$this->MySqli=new mysqli($this->host,$this->user,$this->password,$this->database);
	if(mysqli_connect_errno()){
		throw new DataBaseException("Connecting to MySql server".$this->host." failed",$this);
}
	}
	//select database
	public function selectDatabase(){
		if($this->MySqli->select_db($this->database)===false){
			throw new DataBaseException("Cannot use database".$this->database,$this);
		}
	}
	//create database
	public function CreateDatabase(){
		try{
			$this->selectDatabase();
		}catch(DataBaseException $e){
			try{
				$this->sendQuery("Create database if not exists".$this->database."");
			}catch(DataBaseException $e){
				throw new DataBaseException ("Cannot create database".$this->database,$this);
			}
		}
	}
	//Sendquery to mysql server
	public function sendQuery($query,$errorReporting=true){
		$this->queryCount++;
		$this->result=$this->MySqli->query($query);
		if($this->result===false && $errorReporting===true){
			throw new DataBaseException("invalid SQL: ". $query,$this);
		}
		return $this->result;
	}


}






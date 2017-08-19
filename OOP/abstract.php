<?php
abstract class Database{
	abstract public function connection();
	public function disconnect(){
		//disconnectionn from dbase
	}
}

class Mysql extends Database{
	public function connection(){

	}
}
$mysql = new Mysql();
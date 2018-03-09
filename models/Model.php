<?php
/**
* 
*/
abstract class Model
{
	
	/**function __construct(argument)
	{
		# code...
	}**/
	private static $db;
	private static function initDB(){
		self::$db = new PDO('mysql:host=localhost:3306;dbname=annuaire;charset=utf8','root','');
		self::$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
	}
	protected function getDB(){
		if (self::$db == null) {
			$this->initDB();
			return self::$db;
		}
	}
	protected function getAll($table,$obj){
		$result=[];
		$req=self::$db->prepare('SELECT * FROM '.$table);
		$req->execute();
		while ($data =$req->fetch()) {
			
			$result[]=new $obj($data);
			

		}

		return $result;
		$req->closeCursor();
	}
	protected function getById($table,$obj,$id){

		$result=null;
		
		$req=self::$db->prepare('SELECT * FROM '.$table.' WHERE id = :id');

		$req->execute(array('id' => $id));

		while ($data =$req->fetch()) {
			
			$result=new $obj($data);
			
		}
		return $result;
		$req->closeCursor();
	}
	protected function getByColumn($table,$obj,$search,$column){

		$result=null;
		
		$req=self::$db->prepare('SELECT * FROM '.$table.' WHERE '.$column. ' = :id');

		$req->execute(array('id' => $search));

		while ($data =$req->fetch()) {
			
			$result=new $obj($data);
			
		}
		return $result;
		$req->closeCursor();
	}
	protected function getByLibelle($table,$obj,$libelle){

		$result=null;
		
		$req=self::$db->prepare('SELECT * FROM '.$table.' WHERE libelle = :libelle');

		$req->execute(array('libelle' => $libelle));

		while ($data =$req->fetch()) {
			
			$result=new $obj($data);
			
		}
		return $result;
		$req->closeCursor();
	}
	protected function add($table,$obj,$data,$column,$champs){

		
		$req=self::$db->prepare('INSERT INTO '.$table.' ('.$column.') VALUES('.$champs.')' );
		$result=$req->execute($data);
		
		return $result;
		$req->closeCursor();
	}
	protected function update($table,$obj,$data,$id,$operation){
		
		$req=self::$db->prepare('UPDATE  '.$table.' SET '.$operation.' WHERE id = :id' );
		$result=$req->execute($data);		
		return $result;
		$req->closeCursor();
	}
	protected function getChild($table,$obj,$id){
		$result=[];
		$req=self::$db->prepare('SELECT * FROM '.$table.' WHERE parentid = :id' );
		$req->execute(array('id' => $id));	
		$req->execute();
		while ($data =$req->fetch()) {
			$result[]=new $obj($data);
		}
		return $result;
		$req->closeCursor();
	}
	protected function delete($table,$obj,$id){
		
		$req=self::$db->prepare('DELETE FROM '.$table.' WHERE id= :id_delete' );
		$result=$req->execute(array('id_delete' => $id));
		
		return $result;
		$req->closeCursor();
	}
}

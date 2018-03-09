<?php
/**
* 
*/
class Fiche
{
	
	private $_id;
	
	private $_libelle;
	
	private $_categories=[];

	private $_description;
	
	
	public function __construct(array $data)
	{
		$this->hydrate($data);
	}
	public function hydrate(array $data)
	{
		foreach ($data as $key => $value) {
			$method='set'.ucfirst($key);
			if (method_exists($this,$method)) {
				$this->$method($value);
			}
		}
	}
	public function setId($id){
		$id=(int)$id;
		if ($id > 0) {
			$this->_id=$id;
		}
	}
	public function setLibelle($libelle){
		if (is_string($libelle)) {
			$this->_libelle=$libelle;
		}
	}
	public function setDescription($description){

		if (is_string($description)) {			
			$this->_description=$description;
		}
	}
	public function setCategories($categorie=[]){
		$this->_categories=$categorie;
	}
	public function getId(){
		return $this->_id;
	}
	public function getLibelle(){		
		return $this->_libelle;
	}
	public function getDescription(){

		return $this->_description;
	}
	public function getCategories(){
		return $this->_categories;
	}

	

}
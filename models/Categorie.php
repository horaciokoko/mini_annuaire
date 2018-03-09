<?php
/**
* 
*/
class Categorie
{
	private $_id;
	private $_libelle;
	private $_parentid;
	private $_sous_categories=[];
	private $_ficheid;
	
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
	public function setFicheid($ficheid){
		$ficheid=(int)$ficheid;
		if ($ficheid > 0) {
			$this->_ficheid=$ficheid;
		}
	}
	public function setParentid($parent){
		$this->_parentid=(int)$parent;
	}
	public function setSous_categorie($listeCategories=[]){
		$this->_sous_categories=$listeCategories;
	}
	public function getId(){
		return $this->_id;
	}
	public function getLibelle(){
		return $this->_libelle;
	}
	public function getFicheid(){
		return $this->_ficheid;
	}
	public function getParentid(){
		return $this->_parentid;
	}
	public function getSous_categories(){
		return $this->_sous_categories;
	}

}
<?php 
/**
* 
*/
class FicheManager extends Model
{
	/**
	function __construct(argument)
	{
		# code...
	}
	**/
	public function getFiches(){
		$this->getDB();
		return $this->getAll('fiche','Fiche');
	}
	public function getFichesById($id){

		$this->getDB();
		
		return $this->getById('fiche','Fiche',$id);
	}
	public function addFiche($data){
		$this->getDB();
		
		return $this->add('fiche','Fiche',$data,'id,libelle,description',':id,:libelle,:description');
	}
	public function updateFiche($data,$id){
		$this->getDB();
		
		return $this->update('fiche','Fiche',$data,$id,'libelle = :libelle,description = :description');
	}
	public function getSous_fiches($id){
		$this->getDB();
		
		return $this->getChild('fiche','Fiche',$id);
	}
	public function getFicheByLibelle($libelle){
		$this->getDB();		
		return $this->getBylibelle('fiche','Fiche',$libelle);
	}
	public function deleteFiche($id_delete){
		$this->getDB();
		
		return $this->delete('fiche','Fiche',$id_delete);
	}
}
<?php 
/**
* 
*/
class CategorieManager extends Model
{
	/**
	function __construct(argument)
	{
		# code...
	}
	**/
	public function getCategories(){
		$this->getDB();
		return $this->getAll('categorie','Categorie');
	}
	public function getCategorieById($id){

		$this->getDB();
		
		return $this->getById('categorie','Categorie',$id);
	}
	public function getCategoriesByFicheid($fiche_id){

		$this->getDB();
		
		return $this->getByColumn('categorie','Categorie',$fiche_id,'ficheid');
	}
	public function addCategorie($data){
		$this->getDB();
	
		return $this->add('categorie','Categorie',$data,'id,libelle,parentid,ficheid',':id,:libelle,:parentid,:ficheid');
	}
	public function update_categorie($data,$id){
		$this->getDB();
		
		return $this->update('categorie','Categorie',$data,$id,'libelle = :libelle, parentid = :parentid,ficheid= :ficheid');
	}
	public function getSous_categories($id){
		$this->getDB();
		
		return $this->getChild('categorie','Categorie',$id);
	}
	public function getCategorieByLibelle($libelle){
		$this->getDB();		
		return $this->getBylibelle('categorie','Categorie',$libelle);
	}
	public function delete_categorie($id_delete){
		$this->getDB();
		
		return $this->delete('categorie','Categorie',$id_delete);
	}
}
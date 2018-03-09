<?php
/**
* 
*/
require_once('views/View.php');

class ControllerFiche
{
	private $_ficheManager;
	private $_categorieManager;
	private $_view;
	
	public function __construct($url,$data)
	{		
		
		if (isset($url) && 1 < count($url) && $url[1]!= "") {
			
			
			if (count($url) == 2 ) {


				if ($url[1]=="ajout") {

					
					if (!empty($data)) {


						$this->form_fiche($data);					
					}
					else{
						

						$this->form_fiche([],null);					
					}
				}				
				else {
					
					if ($url[1] != "" && !empty((int)$url[1])) {
						$this->fiche($url[1]);
					}
					else throw new Exception("Error Processing Request", 1);
				}
				


			}
			elseif (count($url) == 3 && $url[1]=="update") {
				
				if ($url[2] == "") {
					throw new Exception("Error Processing Request", 1);
					
				}
					
					if (!empty($data)) {

						$this->update_fiche($data,$url[2]);					
					}
					else{

						$this->form_fiche([],$url[2]);					
					}
			}
			elseif (count($url) == 3 && $url[1]=="delete") {
					$id_delete=(int)$url[2];
					
					if (isset($id_delete)) {
						$this->delete_fiche($id_delete);					
					}
			}
			else throw new Exception("Error Processing Request", 1);
			
			
			
		}
		else {
			$this->fiches();
		}
	}
	private function fiches(){
		$this->_ficheManager=new FicheManager;

		$fiches=$this->_ficheManager->getFiches();		

		$this->generateView(array('fiches' => $fiches),'fiche');
		
	}
	private function fiche($id){

		$this->_ficheManager=new FicheManager;
		$this->_categorieManager=new CategorieManager;

		//$categories=$this->_categorieManager->get
		$fiche=$this->_ficheManager->getFichesById($id);
		$categories=$this->_categorieManager->getCategoriesByFicheid($fiche->getId());
		if (!empty($categories)) {
			$fiche->setCategories([$categories]);	
		}
		else {
			$fiche->setCategories([new Categorie([])]);
		}

		
		if (empty($fiche)) {
			$fiche=new Fiche([]);
		}
	

		$this->generateView(array('fiche' => $fiche),'fiche_details');	
	}
	private function form_fiche($data=null,$id=null){
		$msg="";
		$valeur_champs=new Fiche([]);
		$this->_ficheManager=new FicheManager;
		//si l'on veut la formulaire de modification
		if (!empty($id)) {

			$fiches=$this->_ficheManager->getFichesById($id);
			if (!empty($fiches)) {
				$valeur_champs=$fiches;
				
			}
		}	

		if (!empty($data)) {

			$resultat_ajout=$this->_ficheManager->addFiche($data);
			($resultat_ajout == true)?$msg="Fiche ajouté avec succès":$msg="Une erreur est survenue";
		}
			
		$fiches=$this->_ficheManager->getFiches();	
		//On affiche la vue
		$this->generateView(array('msg' => $msg ,'fiches' => $fiches,'valeur_champs' => $valeur_champs),'fiche_form');	
			
			
	}
	private function update_fiche($data,$id){
		$this->_ficheManager=new FicheManager;
		
		
		$resultat_update=$this->_ficheManager->updateFiche($data,$id);
		if ($resultat_update == false) {
			$msg="Une erreur est survenue";
			$valeur_champs=new Fiche($data);
		}
		else {
			$msg="Fiche mis à jour avec succès";
			$valeur_champs=new Fiche([]);
		}

		$fiches=$this->_ficheManager->getFiches();
		$this->generateView(array('msg' => $msg ,'fiches' => $fiches,'valeur_champs' => $valeur_champs),'fiche_form');	
		
		
	}
	public function delete_fiche($id){
		$this->_ficheManager=new FicheManager;
		$result_deletion=$this->_ficheManager->deleteFiche($id);
		($result_deletion == true)?$msg="Fiche supprimé avec succès":$msg="Une erreur est survenue";
		$fiches=$this->_ficheManager->getFiches();	
		$this->generateView(array('msg' => $msg ,'fiches' => $fiches),'fiche');
		
	}
	
	private function generateView($view_data,$view_name){
		$this->_view=new View($view_name);
		$this->_view->generate($view_data);
	}
}
<?php
/**
* 
*/


class ControllerCategorie
{
	private $_categorieManager;
	private $_ficheManager;
	private $_view;
	
	public function __construct($url,$data=[])
	{
				
		if (!empty($url) && 1 < count($url) && $url[1]!= "") {
			
			
			if (count($url) == 2 ) {


				if ($url[1]=="ajout") {
					
					if (!empty($data)) {

						$this->form_categorie($data);					
					}
					else{

						$this->form_categorie([],null);					
					}
				}
				
				else {
					if ($url[1] != "" && !empty($url[1])) {
						$this->categorie($url[1]);
					}
					else throw new Exception("Page introuvable", 1);
					

					
				}
				


			}
			elseif (count($url) == 3 ) {
					
					if ($url[1]=="update") {
						if (!empty($data)) {

							$this->update_categorie($data,$url[2]);					
						}
						else{

							$this->form_categorie([],$url[2]);					
						}
					}
					else {
						$id_delete=(int)$url[2];
						
						if (isset($id_delete)) {
							$this->delete_category($id_delete);					
						}
					}
			}			
			else throw new Exception("Page introuvable", 1);
			
			
			
		}
		else {
			$this->categories();
		}
	}
	private function categories(){
		$this->_categorieManager=new CategorieManager;

		$categories=$this->_categorieManager->getCategories();
		//require_once('views/viewCategorie.php');
		$this->generateView(array('categories' => $categories),'categorie');
		
	}
	private function categorie($id){

		$this->_categorieManager=new CategorieManager;


		$categorie=$this->_categorieManager->getCategorieById($id);
		$sous_categories=$this->_categorieManager->getSous_categories($id);

		$this->generateView(array('categorie' => $categorie,'sous_categories' => $sous_categories),'categorie_details');	
	}
	private function form_categorie($data=null,$id=null){
		$msg="";
		$valeur_champs=new Categorie([]);
		$this->_categorieManager=new CategorieManager;
		$this->_ficheManager=new FicheManager;
		$fiches=$this->_ficheManager->getFiches();
		$categories=$this->_categorieManager->getCategories();
			
		//si l'on veut la formulaire de modification
		if (!empty($id)) {

			$categorie=$this->_categorieManager->getCategorieById($id);

			if (!empty($categorie)) {
				$valeur_champs=$categorie;
				
				
			}
		}	
		//si l'on veut les données du formulaire est remplis
		if (!empty($data)) {

			$fiche=$this->_ficheManager->getFicheByLibelle($data['ficheid']);
			
			$parent_categorie=$this->_categorieManager->getCategorieByLibelle($data['parentid']);	
			//On teste si la catégorie parent est présent dans les données du formulaire		
			if (!empty($parent_categorie)) {
				//S'il est present on recupère l'ID correspondant
				$data['parentid']=$parent_categorie->getId();
			}
			else $data['parentid']=null;

			if (!empty($fiche)) {
				//S'il est present on recupère l'ID correspondant
				$data['ficheid']=$fiche->getId();
			}
			else $data['ficheid']=null;
			
			$resultat_ajout=$this->_categorieManager->addCategorie($data);			
			($resultat_ajout == true)?$msg="Categorie ajouté avec succès":$msg="Une erreur est survenue";
			
			
		}
		

		//On affiche la vue
		$this->generateView(array('msg' => $msg ,'categories' => $categories,'fiches' => $fiches,'valeur_champs' => $valeur_champs),'categorie_form');	
	}
	private function update_categorie($data,$id){
		$this->_categorieManager=new CategorieManager;
		$parent_categorie=$this->_categorieManager->getCategorieByLibelle($data['parentid']);	
		$this->_ficheManager=new FicheManager;		
		$fiche=$this->_ficheManager->getFicheByLibelle($data['ficheid']);
		if (!empty($parent_categorie)) {
				
				$data['parentid']=$parent_categorie->getId();
			}
		else $data['parentid']=null;
		if (!empty($fiche)) {
				//S'il est present on recupère l'ID correspondant
				$data['ficheid']=$fiche->getId();
			}
			else $data['ficheid']=null;		
		
		$resultat_update=$this->_categorieManager->update_categorie($data,$id);
		if ($resultat_update == false) {
			$msg="Une erreur est survenue";
			$valeur_champs=new Categorie($data);
		}
		else {
			$msg="Categorie mis à jour avec succès";
			$valeur_champs=new Categorie([]);
		}

		$categories=$this->_categorieManager->getCategories();
		$this->generateView(array('msg' => $msg ,'categories' => $categories,'valeur_champs' => $valeur_champs),'categorie_form');	
		
		
	}
	public function delete_category($id){
		$this->_categorieManager=new CategorieManager;
		$result_deletion=$this->_categorieManager->delete_categorie($id);
		($result_deletion == true)?$msg="Categorie supprimé avec succès":$msg="Une erreur est survenue";
		$categories=$this->_categorieManager->getCategories();	
		$this->generateView(array('msg' => $msg ,'categories' => $categories),'categorie');
		
	}
	
	private function generateView($view_data,$view_name){
		$this->_view=new View($view_name);
		$this->_view->generate($view_data);
	}
}
<div class="card">
  <div class="card-header">
    Ajouter/Modifier Categorie
  </div>
  <div class="card-body">
    <form action="" method="POST">
    	<div class="form-group">
        
        <input  value="<?php echo $valeur_champs->getId();?>" type="hidden" class="form-control" id="idCategorie" aria-describedby="emailHelp" placeholder="ID" name="id">
        <small id="idHelp" class="form-text text-muted hidden"></small>
      </div>
      <div class="form-group">
        <label for="libelle">Libelle</label>
        <input type="text" value="<?php echo $valeur_champs->getLibelle();?>" class="form-control" id="libelle" placeholder="Libelle" name="libelle">
      </div>
      <div class="form-group">
        <label for="parentid">Catégorie parent</label>
        <select id="parentid" placeholder="Parent" name="parentid">
          <option  class="form-control" ></option> 
          <?php foreach ($categories as $categorie) : ?>
            <option  class="form-control" ><?php echo $categorie->getLibelle();?></option> 

          <?php endforeach ?>
        </select>
        
      </div>
      <div class="form-group">
        <label for="ficheid">Fiche</label>
        <select id="ficheid" placeholder="Fiche" name="ficheid">
          <option  class="form-control" ></option> 
          <?php foreach ($fiches as $fiche) : ?>
            <option  class="form-control" ><?php echo $fiche->getLibelle();?></option> 

          <?php endforeach ?>
        </select>
        
      </div>
      
      <button type="submit" class="btn btn-primary">Enregistrer</button>
      <caption><?php echo $msg; ?></caption>
    	
    </form>
    <br/>
    <?php include 'views/viewCategorie.php'; ?>
  </div>
</div>
	
<form action="" method="POST">
	<div class="form-group">
    
    <input  value="<?php echo $valeur_champs->getId();?>" type="hidden" class="form-control" id="idFiche" aria-describedby="emailHelp" placeholder="ID" name="id">
    <small id="idHelp" class="form-text text-muted hidden"></small>
  </div>
  <div class="form-group">
    <label for="libelle">Libelle</label>
    <input type="text" value="<?php echo $valeur_champs->getLibelle();?>" class="form-control" id="libelle" placeholder="Libelle" name="libelle">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input id="description" placeholder="Description" name="description"/>
  </div>
  
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <caption><?php echo $msg; ?></caption>
	
</form>
<br/>
<?php include 'views/viewFiche.php'; ?>

	
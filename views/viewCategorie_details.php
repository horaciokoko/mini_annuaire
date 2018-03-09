<div class="card">
  <div class="card-header">
    Détails Categorie
  </div>
  <div class="card-body">
	<table class="table table-dark table-striped table-hover">
		<caption>Détail</caption>
		<thead class="thead-dark">		
			<th scope="col">ID</th>
			<th scope="col">LIBELLE</th>
			<th scope="col">CATEGORIE PARENT</th>
		</thead>
		<tbody>


			
			<tr>
				<th scope="row"><?php echo $categorie->getId(); ?></th>

				<td><?php echo $categorie->getLibelle(); ?></td>

				<td><?php echo $categorie->getParentid(); ?></td>
			</tr>
			<tr>
				<td>
					<div class="btn-group" role="group" aria-label="Basic example">
						<a class="btn btn-primary" href="<?php echo '/phpMVC1/categorie/update/'.$categorie->getId(); ?>">Modifier</a>
						<button id="btn_supp" class="btn btn-primary" data-toggle="modal" data-target="#delete">Supprimer</button>
						
					</div>
				</td>
			</tr>
			
		</tbody>
	</table>
	<table class="table table-striped table-hover">
		<caption>Liste des sous-categories</caption>
		<thead class="thead-dark">		
			<th scope="col">ID</th>
			<th scope="col">LIBELLE</th>
			<th scope="col">ACTIONS</th>
			
		</thead>
		<tbody>
			<?php 

			foreach ($sous_categories as $c) : ?>
				<tr>
					<th scope="row"><?php echo $c->getId(); ?></th>

					<td><?php echo $c->getLibelle(); ?></td>
					<td>
						<div class="btn-group" role="group" aria-label="Basic example">
							<a class="btn btn-primary" href="<?php echo '/phpMVC1/categorie/'.$c->getId(); ?>">Voir</a>
							<a class="btn btn-primary" href="<?php echo '/phpMVC1/update/'.$c->getId(); ?>">Modifier</a>
							<button id="btn_supp" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal<?php echo $c->getId(); ?>">Supprimer</button>
						</td>
					</td>
				</tr>
				<div class="modal fade" id="deleteModal<?php echo $c->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        Voulez-vous vraiment supprimer?
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
					        <a class="btn btn-primary" href="<?php echo '/phpMVC1/categorie/delete/'.$c->getId(); ?>">Oui</a>
					      </div>
				    	</div>
				  	</div>
				</div>

			<?php endforeach ?>
		</tbody>
	</table>
	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        Voulez-vous vraiment supprimer?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
		        <a class="btn btn-primary" href="<?php echo '/phpMVC1/categorie/delete/'.$categorie->getId(); ?>">Oui</a>
		      </div>
	    	</div>
	  	</div>
	</div>
  </div>
  </div>
</div>
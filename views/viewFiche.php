<div class="card">
  <div class="card-header">
    Fiche
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover">
	<caption>Liste des Fiches</caption>
	<p><a class="btn btn-primary" href="<?php echo '/phpMVC1/fiche/ajout'; ?>">Nouveau <span class="badge badge-light"> + </span></a></p>
	<thead class="thead-dark">		
		<th scope="col">ID</th>
		<th scope="col">LIBELLE</th>
		<th scope="col">DESCRIPTION</th>		
		<th scope="col" >ACTIONS</th>
	</thead>
	<tbody>
		<?php 

		foreach ($fiches as $fiche) : ?>
		<tr>
			<th scope="row"><?php echo $fiche->getId(); ?></th>

			<td><?php echo $fiche->getLibelle(); ?></td>
			<td><?php echo $fiche->getDescription(); ?></td>
			<td>
				<div class="btn-group" role="group" aria-label="Basic example">
				  <a class="btn btn-primary" href="<?php echo '/phpMVC1/fiche/'.$fiche->getId(); ?>">Voir</a>
				  <a class="btn btn-primary" href="<?php echo '/phpMVC1/fiche/update/'.$fiche->getId(); ?>">Modifier</a>
				  <button class="btn btn-primary" data-toggle="modal" data-target="#deleteModal<?php echo $fiche->getId(); ?>">Supprimer</button>
				</div>
			</td>
			
		</tr>
		<!-- Modal -->
		<div class="modal fade" id="deleteModal<?php echo $fiche->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
		        <a class="btn btn-primary" href="<?php echo '/phpMVC1/fiche/delete/'.$fiche->getId(); ?>">Oui</a></td>
		      </div>
		    </div>
		  </div>
		</div>
		<?php endforeach ?>
	</tbody>
</table>



  </div>
</div>


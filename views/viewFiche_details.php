<table class="table table-dark table-striped table-hover">
	<caption>Détail</caption>
	<thead class="thead-dark">		
		<th scope="col">ID</th>
		<th scope="col">LIBELLE</th>
		<th scope="col">DESCRIPTION</th>
	</thead>
	<tbody>


		
		<tr>
			<th scope="row"><?php echo $fiche->getId(); ?></th>

			<td><?php echo $fiche->getLibelle(); ?></td>

			<td><?php echo $fiche->getDescription(); ?></td>
		</tr>
		<tr>
			<td colspan="2">
			<div class="btn-group" role="group" aria-label="Basic example">
				<a class="btn btn-primary" href="<?php echo '/phpMVC1/fiche/update/'.$fiche->getId(); ?>">Modifier</a>
				<button class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">Supprimer</button>
			</div>
			</td>
		</tr>
		
	</tbody>
</table>
<table class="table table-striped table-hover">
	<caption>Liste des catégories</caption>
	<thead class="thead-dark">		
		<th scope="col">ID</th>
		<th scope="col">LIBELLE</th>		
		
	</thead>
	<tbody>


		<?php 
		
		foreach ($fiche->getCategories() as $cat) : ?>
			<tr>
				<th scope="row"><?php echo $cat->getId(); ?></th>

				<td><?php echo $cat->getLibelle(); ?></td>			
				
			</tr>
		<?php endforeach ?>
		
	</tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
  </div>
</div>

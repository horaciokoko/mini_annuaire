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
			<td><a class="btn btn-primary" href="<?php echo '/phpMVC1/update/'.$categorie->getId(); ?>">Modifier</a></td>
			<td><a class="btn btn-primary" href="<?php echo '/phpMVC1/delete/'.$categorie->getId(); ?>">Supprimer</a></td>
		</tr>
		
	</tbody>
</table>
<table class="table table-striped table-hover">
	<caption>Liste des sous-categories</caption>
	<thead class="thead-dark">		
		<th scope="col">ID</th>
		<th scope="col">LIBELLE</th>
		
	</thead>
	<tbody>
		<?php 

		foreach ($sous_categories as $categorie) : ?>
		<tr>
			<th scope="row"><?php echo $categorie->getId(); ?></th>

			<td><?php echo $categorie->getLibelle(); ?></td>
			<td><a class="btn btn-primary" href="<?php echo '/phpMVC1/'.$categorie->getId(); ?>">Voir</a></td>
			<td><a class="btn btn-primary" href="<?php echo '/phpMVC1/update/'.$categorie->getId(); ?>">Modifier</a></td>
			<td><a class="btn btn-primary" href="<?php echo '/phpMVC1/delete/'.$categorie->getId(); ?>">Supprimer</a></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
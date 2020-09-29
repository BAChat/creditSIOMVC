<?php 
	require_once 'Metier/Client.php';
?>

<table class="table table-bordered table-striped">
    <thead>
		<th>Numéro</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Rue</th>
		<th>Code Postal</th>
		<th>Ville</th>
		<th>Téléphone</th>
		<th>Mail</th>
    </thead>
	<?php foreach($lesClients as $client):
			$numero = $client->getNumero();
			$nom = $client->getNom();
			$prenom = $client->getPrenom(); ?>
			<tr>
				<td> <?php echo $numero ?> </td>
				<td> <?php echo $nom ?> </td>
				<td> <?php echo $prenom ?> </td>
				<td> <?php echo $client->getRue() ?> </td>
				<td> <?php echo $client->getCodePostal() ?></td>
				<td> <?php echo $client->getVille() ?> </td>
				<td> <?php echo $client->getMobile() ?></td>
				<td> <?php echo $client->getEmail() ?></td>
				<td> <?php echo '<a href=index.php?action=comptes&id=' . $numero . '>Voir les comptes</a>'; ?>
			</tr>
	<?php endforeach ?>
</table>
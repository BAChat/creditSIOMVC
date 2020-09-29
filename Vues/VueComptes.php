<?php
	require_once 'Metier/Client.php';
	require_once 'Metier/Compte.php';

    echo 'Client numéro : ' . $leClient->getNumero() . ' : ' . $leClient->getNom() . ' ' . $leClient->getPrenom();
?>
<table class="table table-bordered table-striped">
    <thead>
		<th>Numéro</th>
		<th>Solde</th>
    </thead>
	<?php
		if(count($lesComptes)) {
			foreach($lesComptes as $compte):?>
				<tr>
					<td> <?php echo $compte->getNumero() ?> </td>
					<td> <?php echo $compte->getSolde() ?> </td>
					<td> <?php echo '<a href=index.php?action=compte&id=' . $compte->getNumero(). '>Voir le compte</a>'; ?>
				</tr>
			<?php
			endforeach;
		}
		else echo 'Ce client ne possède pas de compte !';
     ?>
</table>
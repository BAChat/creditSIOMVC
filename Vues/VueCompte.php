<?php
	require_once 'Metier/Compte.php';

    echo 'Client : ' . $leCompte->getTitulaire()->getNom() . '<BR>';
    echo 'Gérer le compte numéro : ' . $leCompte->getNumero() . '<BR>';
    echo 'Effectuer un virement ou un retrait : <BR>';

    //on stocke son solde dans une variable que l'on affiche
    $solde = $leCompte->getSolde();
    echo 'Solde : ' . $solde . '<BR>';

?>
	<form method="post" action="index.php?action=MAJCompte">
		<p>Saisir le montant : </p>
		<input type="text" name="montant"/><br>
        <?php echo'<input type="hidden" name="idCompte" value="' . $leCompte->getNumero() .'">'; ?>
		<p><select size=1 name="typeoperation">
			<option value="-1">--Type d'opération--</option>
			<option value="Depot">Dépôt</option>
			<option value="Retrait">Retrait</option>
		</select></p>
		<input type="submit" value="Valider"/>
		<input type="reset" value="Reinitialiser"/>
	</form>

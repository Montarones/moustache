<?php

include('global.php');

if ($_POST["pseudo"])
{
	// check
	
	if (success) header('Location: ' . $_GET['ref']);
}

$g_connexion = '
	<form method="post" action="connexion.php?ref=' . $_SERVER['REQUEST_URI'] . '">
	<table>
	<tr>
		<td></td>
		<td><input name="pseudo" type="text" size="30" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input name="pass" type="password" size="30" /></td>
	</tr>
	<tr>
		<td></td>
		<td align="center">
			<input type="submit" class="bouton" value="Connexion" />
			<br /><a href="register.php">Créer</a>
		</td>
	</tr>
	</table>
	</form>
';

include('ui.php');

?>



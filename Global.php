<?php 

function chargerClasse($classe)
{
	require $classe. '.php';
}
spl_autoload_register('ChargerClasse');

$db = new PDO('mysql:host=localhost;
dbname=moustache_db',
'root',
'');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


?> 

<form method='post' action='Global.php'>

<p> Pseudo : </br> </p>
<input type='text' name='pseudo'>
<p> Pass : </br> </p>
<input type='text' name='pass'>
<p> Pseudo2 : </br> </p>
<input type='text' name='pseudo2'>
<p> Pass2 : </br> </p>
<input type='text' name='pass2'>

<input type='submit' value='inserer' name='jakie'>
<input type='submit' value='utiliser' name='utiliser'>
</form>


<?php


$manager = new moustache_userManager($db);



// CREER CE COMPTE
if (isset($_POST['jakie']))
{
	if(!$manager->exists($_POST['pseudo']))
	$perso = new moustache_user(['pseudo' => $_POST['pseudo'], 'password' => $_POST['pass']]);
	$manager->add($perso);
	
	if(!$manager->exists($_POST['pseudo2']))
	$perso2 = new moustache_user(['pseudo' => $_POST['pseudo2'], 'password' => $_POST['pass2']]);
	$manager->add($perso2);
}


// UTILISER CE COMPTE
if (isset($_POST['utiliser']))
{
	$user=$manager->utiliser($_POST['pseudo'], $_POST['pass']);
	$user2=$manager->utiliser($_POST['pseudo2'], $_POST['pass2']);
	
	if (!$manager->estAmi($user->id(), $user2->id())) 
	{
	$manager-> ajoutAmi($user, $user2);
	}
	else
	{
		echo 'Vous êtes déja amis !';
	}
	if ($manager->estAdmin($user->pseudo()))
	{
	echo 'Vous êtes admin !';
	}
	
	
}






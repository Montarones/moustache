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










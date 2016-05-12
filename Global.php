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





include('connexion.php');


?> 








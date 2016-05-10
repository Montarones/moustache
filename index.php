<?php
include('include/user.php');

$user = new user(3);

$g_status = $user->name();
$g_content = "Accueil";

include('ui.php');

?>



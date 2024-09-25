<?php
require_once 'db.php';

$name=isset($_POST['name']) ? $_POST['name'] : null;
if(empty($name)){
	header('location: erledigte_aufgaben.php');
	exit;
}
$db->query("delete from erledigt where nutzer='".$name."'"); ////// uvaga na znatschki

header('location: erledigte_aufgaben.php');
exit;
?>
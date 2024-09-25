<?php
require_once 'db.php';

$name = $_GET['name'];
$bezeichnung=$_GET['bezeichnung'];
	echo $name;
	exit;
$stmt=$db->prepare("INSERT INTO `erledigt` (`id`, `nutzer`, `bezeichnung`, zeitstempel) VALUES 
(NULL, ?, 'assist', current_time)");
$stmt->bind_param('s',$name);
$stmt->execute();
$id=$db->insert_id;

header('Location:index.php');
exit;
?>
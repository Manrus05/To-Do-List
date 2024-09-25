<?php
require_once 'db.php';

$id=isset($_GET['id']) ? (int)$_GET['id'] : 0;
$bezeichnung=isset($_GET['bezeichnung']) ? $_GET['bezeichnung'] : null;
$name=isset($_GET['name']) ? $_GET['name'] : null;

if($id<=0) {
	header("Location: index.php");
	exit;
}

$stmt=$db->prepare("INSERT INTO `erledigt` (`id`, `nutzer`, `bezeichnung`, zeitstempel) VALUES 
(NULL, ?, ?, current_time)");
$stmt->bind_param('ss',$name,$bezeichnung);
$stmt->execute();
$ideses=$db->insert_id;
$db->query("delete from aufgaben where id=".$id);

header("Location: index.php");
exit;
?>
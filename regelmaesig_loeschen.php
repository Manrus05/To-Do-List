<?php
require_once 'db.php';

$id=isset($_GET['id']) ? (int)$_GET['id'] : 0;

if($id<=0) {
	header("Location: regelmaesige_aufgaben.php");
	exit;
}

$db->query("delete from aktuelle where id=".$id);
header("Location: regelmaesige_aufgaben.php");
exit;
?>
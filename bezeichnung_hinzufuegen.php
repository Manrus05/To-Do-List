<?php
require_once 'db.php';
$bezeichnung=isset($_POST['bezeichnung']) ? $_POST['bezeichnung'] : null;
$regelmesigkeit=isset($_POST['fav_language']) ? $_POST['fav_language'] : 0;
if(empty($bezeichnung)) {
	header('Location:index.php');
	exit;
}
if(empty($regelmesigkeit)){
	header('location:index.php');
	exit;
}
if($regelmesigkeit == 'Einmalig'){
	$stmt=$db->prepare("INSERT INTO `aufgaben` (`id`, `bezeichnung`) VALUES 
	(NULL, ?)");
$stmt->bind_param('s',$bezeichnung);
$stmt->execute();
$id=$db->insert_id;
header('Location:index.php');
exit;
}
else{
//	$stmt=$db->prepare("INSERT INTO `aktuelle` (`id`, bezeichnung,`zeitstempel`, `regelmesigkeit`) VALUES (NULL, ?, DATE_ADD(NOW(), INTERVAL ? DAY),?)");
	$stmt=$db->prepare("INSERT INTO `aktuelle` (`id`, bezeichnung,`zeitstempel`, `regelmesigkeit`) VALUES (NULL, ?, current_time,?)");

	$stmt->bind_param('si',$bezeichnung,$regelmesigkeit);
	$stmt->execute();
	$id=$db->insert_id;
	header('Location:index.php');
	exit;
}
header('Location:index.php');
exit;
?>
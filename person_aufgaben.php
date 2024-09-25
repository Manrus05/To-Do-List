<?php
require_once 'db.php';

$nutzer=isset($_GET['nutzer']) ? $_GET['nutzer'] : null;
if(empty($nutzer)){
	header('location: erledigte_aufgaben.php');
	exit;
}
$aufgaben=array();
$result=$db->query("SELECT bezeichnung FROM `erledigt` where nutzer ='$nutzer' order by bezeichnung");
while($aufgabe=$result->fetch_object()){
  $aufgaben[]=$aufgabe;
}
$result->free();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Aufgaben</title>
</head>
<body>
<h1>Aufgaben</h1>
<table border="1" cellspacing="0" style="border-collapse:collapse;">
<tr>
    <th><?= $nutzer ?></th>
  </tr>
<?php
foreach($aufgaben as $aufgabe){
?>
  <tr>
    <td><?= $aufgabe->bezeichnung?></td>
  </tr>
  <?php
}
  ?>
</table>
</body>
</html>
<?php
require_once 'db.php';
$teile=array();
$result=$db->query("SELECT * FROM aktuelle ");
while($t=$result->fetch_object()){
  $teile[]=$t;
}
$result->free();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Aufgabe1-einfach</title>
</head>
<body>
<h1>Aufgabe1-einfach</h1>
<table border="1" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <th></th>
	<td>Bezeichnung</td>
	<th></th>
  </tr>
  <?php
foreach($teile as $t) {
?>
  <tr>
	<td>
	</td>
    <td><?= $t->bezeichnung ?></td>
	<td><a href="regelmaesig_loeschen.php?id=<?= $t->id ?>">erledigt</a></td>
  </tr>
<?php
}
?>
</table>
<a href="index.php">Start Seite</a></br>
<a href="erledigte_aufgaben.php">erledigte aufgaben</a>
</body>
</html>
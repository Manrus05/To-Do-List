<?php
require_once 'db.php';
$teile=array();
$result=$db->query("SELECT nutzer, COUNT(bezeichnung) AS erledigt FROM erledigt group by nutzer;");
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
</br>
<table border="1" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <th>Nutzer</th>
	<td>Bezeichnung</td>
	<th></th>
  </tr>
  <?php
foreach($teile as $t) {
?>
  <tr>
	<td>
	<?= $t->nutzer ?>
	</td>
    <td><?= $t->erledigt ?></td>
	<td><a href="person_aufgaben.php?nutzer=<?= $t->nutzer ?>">erledigte aufgaben</a></td>
  </tr>
<?php
}
?>
</table>
<h4>WG verlassen</h4>
<form action="verlassen.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
<input type="text" name="name" />
<input type="submit" value="Löschen" />
</form>
<h4>Nutzliche Links</h4>
<a href="regelmaesige_aufgaben.php">regelmäsige aufgaben</a></br>
<a href="index.php">start seite</a>
</body>
</html>
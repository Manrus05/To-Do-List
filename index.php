<?php
require_once 'db.php';

$stmt=$db->prepare("update aktuelle set zeitstempel= NOW() where CURRENT_TIME >= DATE_ADD(zeitstempel, INTERVAL regelmesigkeit DAY )");
$stmt->execute();

$teile=array();
$result=$db->query("SELECT * FROM aufgaben ");
while($t=$result->fetch_object()){
  $teile[]=$t;
}
$result->free();
///"SELECT bezeichnung FROM aktuelle WHERE bezeichnung NOT IN (SELECT bezeichnung FROM aufgaben) 
//and CURRENT_TIME = DATE_ADD(zeitstempel, INTERVAL regelmesigkeit DAY )" INSERT INTO `aufgaben` (`bezeichnung`) 
//SELECT bezeichnung FROM aktuelle 
//WHERE bezeichnung NOT IN (SELECT bezeichnung FROM aufgaben) 
//and CURRENT_TIME = DATE_ADD(zeitstempel, INTERVAL regelmesigkeit DAY)

$stmt=$db->prepare("INSERT INTO `aufgaben` (`bezeichnung`) 
SELECT bezeichnung 
FROM aktuelle 
WHERE bezeichnung NOT IN (SELECT bezeichnung FROM aufgaben) 
AND DATE(zeitstempel) = CURRENT_DATE;
");
$stmt->execute();
$id=$db->insert_id;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Aufgabe1-einfach</title>
  <script>
  function ask(id,bezeichnung) {
	  var name = prompt('Name eingeben');
	  if(name) {
		  location.href='bezeichnung_loeschen.php?id='+id+'&bezeichnung='+bezeichnung+'&name='+name;
	  }
	  else{
		  alert('Sie haben keine Namen eingegeben.');
	  }
  }
  </script>
  </head>
<body>
<h1>Aufgabe1-einfach</h1>
<form action="bezeichnung_hinzufuegen.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
	<input type="text" name="bezeichnung" />
	<input type="submit" value="Hinzufügen" /><br>
	
  <input type="radio" id="einmalig" name="fav_language" value="Einmalig">
  <label for="einmalig">einmalig</label><br>
  <input type="radio" id="jeden tag" name="fav_language" value="1">
  <label for="jeden tag">jeden Tag</label><br>
  <input type="radio" id="jede woche" name="fav_language" value="7">
  <label for="jede woche">jede Woche</label><br>
  <input type="radio" id="jeden monat" name="fav_language" value="30">
  <label for="jeden monat">jeden Monat</label>
  
</form><hr/>
</br>
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
	<td><a href="javascript:ask(<?= $t->id ?>,'<?= $t->bezeichnung ?>')">erledigt</a></td>
	</tr>
<?php
}
?>
</table>
 <div id="response"></div>
<a href="regelmaesige_aufgaben.php">regelmäsige aufgaben</a></br>
<a href="erledigte_aufgaben.php">erledigte aufgaben</a>
</body>
</html>
<?php

include_once "db.php";

$carLP = $_POST["carLP"];
$driver= $_POST["driver"];
$carType= $_POST["carType"];
$nextCheckpoint= $_POST["nextCheckpoint"];
$sql = "INSERT INTO `drivers`(`carLP`, `driver`, `carType`, `nextCheckpoint`) VALUES ('$carLP ', '$driver', '$carType','$nextCheckpoint')";
$result = $mysqli->query($sql);
if ($result == 1)
  echo "המידע הוזן בהצלחה";
else
{
echo $sql;
  echo "<br>שגיאה בהזנת נתונים. צור קשר עם _____ לדיווח ידני";
}
?>
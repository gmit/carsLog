<?php
include_once "db.php";

$carLP = $_POST["carLP"];
$sql = "DELETE FROM `drivers` WHERE `carLP` = '".$carLP."'";
$result = $mysqli->query($sql);
if ($result == 1)
{
  echo $sql;
  echo "<br>הרכב הוסר מהמערכת";
}
else
{
echo $sql;
  echo "<br>שגיאה בהזנת נתונים. צור קשר עם _____ לדיווח ידני";
}
?>
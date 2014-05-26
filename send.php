<?php
include_once "db.php";

$kmInput = $_POST["kmInput"];
$carLP = $_POST["carLP"];
$current_timestamp = date("Y-m-d H:i:s", strtotime("now"));
$carlocation = $_POST["carlocation"];
$sql = "INSERT INTO `log`(`carLicensePlate`, `carKM`, `datetime`, `carlocation`) VALUES ('$carLP', '$kmInput', '$current_timestamp','$carlocation')";
$result = $mysqli->query($sql);
if ($result == 1)
  echo "המידע הוזן בהצלחה";
else
  echo "שגיאה בהזנת נתונים. צור קשר עם _____ לדיווח ידני";
?>
<?php
include_once "db.php";

$carLP = $_POST["carLP"];
$driver = $_POST["driver"];
$carType = $_POST["carType"];
$nextCheckpoint = $_POST["nextCheckpoint"];
$email = $_POST["email"];
$licenseExpire = $_POST["licenseExpire"];
$sql = "select 1 from `drivers` where `carLP` = $carLP";
$result = $mysqli->query($sql);
if ($result->num_rows != 1)
{ 
  $sql2 = "INSERT INTO `drivers`(`carLP`, `driver`, `carType`, `nextCheckpoint`) VALUES ('$carLP ', '$driver', '$carType','$nextCheckpoint')";
  $result2 = $mysqli->query($sql2);
  if ($result2)
    echo "המידע הוזן בהצלחה";
  else
  {
    echo "שגיאה בהזנת נתונים. יש ליצור קשר עם ערן להוספה ידנית";
  }
} else {
  $sql2 = "UPDATE `drivers` SET  `driver` =  \"".$driver."\", `carType` =  \"".$carType."\", `nextCheckpoint` =  \"".$nextCheckpoint."\", `NeedCheck` =  '0', `email` =  \"".$email."\", `licenseExpire` =  \"".$licenseExpire."\" WHERE `carLP` =  \"".$carLP."\"";
  $result2 = $mysqli->query($sql2);
  if ($result2)
    echo "המידע עודכן בהצלחה";
  else
  {
    echo "שגיאה בהזנת נתונים. יש ליצור קשר עם ערן לעדכון ידני";
  }
}
?>
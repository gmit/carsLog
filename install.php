<?php
include_once "db.php";
$q[] = "CREATE TABLE IF NOT EXISTS `drivers` (`carLP` varchar(10), `driver` varchar(50), `carType` varchar(30), `nextCheckpoint` varchar(30), `NeedCheck` tinyint(1)) ENGINE=InnoDB DEFAULT CHARSET=" . DB_CHARSET;
$q[] = "CREATE TABLE IF NOT EXISTS `log` (`carLicensePlate` varchar(10), `carKM` int(11), `datetime` timestamp, `carlocation` varchar(50)) ENGINE=InnoDB DEFAULT CHARSET=" . DB_CHARSET;

foreach($q as $iq){
	$result = $mysqli->query($iq);
	echo $iq . " : " . ($result?"succes":"error");
	echo "<br>";
}

echo "Done";
?>
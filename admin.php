<?php include_once "db.php"; ?>
<!DOCTYPE html>
<head>
<title></title>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>
$(function() {
  $(".button").click(function() {
            var dr = $('#driver').val();
            var lp = $('#carLP').val();
            var ct = $('#carType').val();
            var cp = $('#nextCheckpoint').val();
           $.post("addcar.php", { driver : dr, carLP: lp , carType: ct , nextCheckpoint: cp },
                function(data){
                 // $(".ui-content").replaceWith("<div style='align:center;margin: 0;float: right;width: 50%;'><h1>" + data + "</h1><divp>"); 
                  alert(data);
                });
  });
});
$(function() {
  $(".deleteraw").click(function() {

            var lp = $(this).closest("td").attr("id");
           $.post("removecar.php", {  carLP: lp },
                function(data){
                 // $(".ui-content").replaceWith("<div style='align:center;margin: 0;float: right;width: 50%;'><h1>" + data + "</h1><divp>"); 
                  alert(data);
                  $(this).closest("td").remove();
                });
  });
});
</script>
<link rel="stylesheet" href="style.css">
</head>
<body dir ="rtl">

<div id='cssmenu'>

</div>
<div id="divContainer">
<h1 align="right"> רכבים : </h1>
<?php
$sql = "select * from drivers";
$result = $mysqli->query($sql);
?>
<table class='formatHTML5' width='95%'>
<tr>
<th>מספר רישוי</th><th>נהג</th><th>סוג רכב</th><th>טיפול הבא</th><th>ממתין לטיפול</th><th></th><th></th>
</tr>
<?php
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["carLP"] . "</td><td>" . $row["driver"] . "</td><td>" . $row["carType"] . "</td><td>" . $row["nextCheckpoint"] . "</td><td>" . ($row["NeedCheck"]?'<h2>זקוק לטיפול</h2>':'') . "</td><td id='" . $row["carLP"] . "'><div class='deleteraw'><a href='#'>מחק רכב</a></div></td><td>";
$inc = "phpqrcode/?data=" . $row["carLP"];
echo "<a href='$inc'>הדפס מדבקה לרכב</a>";
echo "</td></tr>";
}
?>
<form method="post" action="">
		        <tr><td><input type="number" name="carLP" id="carLP" value="" placeholder="מס רכב" style="margin:0 auto; margin-left:auto; margin-right:auto; align:center; text-align:center;"></td><td>
		        <input type="text" name="driver" id="driver" value="" placeholder="נהג" style="margin:0 auto; margin-left:auto; margin-right:auto; align:center; text-align:center;"></td><td>
		        <input type="text" name="carType" id="carType" value="" placeholder="סוג הרכב" style="margin:0 auto; margin-left:auto; margin-right:auto; align:center; text-align:center;"></td><td>
		        <input type="text" name="nextCheckpoint" id="nextCheckpoint" value="" placeholder="טיפול הבא" style="margin:0 auto; margin-left:auto; margin-right:auto; align:center; text-align:center;"></td><td></td><td>
			<div style="align:center;margin: 0;float: right;width: 50%;">
			<input type="submit" name="submit" class="button" id="submit_btn" value="עדכון" />
			</td><td></td></tr>
		</form>

</table>
</div>
<div id="divContainer">
<h1 align="right"> קילומטרים: </h1>
<?php

$sql = "SELECT * FROM ( SELECT * FROM log WHERE 1 ORDER BY datetime DESC ) as t1 GROUP BY carLicensePlate";
$result = $mysqli->query($sql);
?>
<table class='formatHTML5' width='95%'>
<tr>
<th>מספר רישוי</th><th>ק"מ</th><th>תאריך</th>
</tr>
<?php
while($row = $result->fetch_assoc()) {
echo "<tr><td><a href=?carlp='" . $row["carLicensePlate"] . "'>". $row["carLicensePlate"] . "</a></td><td>" . $row["carKM"] . "</td><td>" . $row["datetime"] . "</td></tr>";
}

?>
</table>

<?php
if (isset($_GET["carlp"]))
{
?>
</div>
<div id="divContainer">
<h1 align="right"> דוח רכב: </h1>
<?php

$sql = "SELECT * FROM log WHERE carLicensePlate = " . $_GET["carlp"] . " ORDER BY datetime DESC";
$result = $mysqli->query($sql);
?>
<table class='formatHTML5' width='95%'>
<tr>
<th>מספר רישוי</th><th>ק"מ</th><th>תאריך</th>
</tr>
<?php
while($row = $result->fetch_assoc()) {
echo "<tr><td>". $row["carLicensePlate"] . "</td><td>" . $row["carKM"] . "</td><td>" . $row["datetime"] . "</td></tr>";
}

?>
</table>

<?php
}
?>
</div>
</body>
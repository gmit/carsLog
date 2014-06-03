<?php
include_once "db.php"; 
$sent = array();
$notSent = array();
$sql = "select * from drivers";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
if ($row['email'] != '')
  {
  $subject = "[cars.bgoldman] - עדכון מד מרחק של רכבך";
  $subject = "=?UTF-8?B?" . base64_encode($subject).'?=';
  $headers = "From: office@bgoldman.co.il\r\n";
  $headers .= "Reply-To: office@bgoldman.co.il\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=utf8\r\n";
  $message = '<html><body>';
  $message .= $row['driver'] . " שלום,<br>";
  $message .= "אנא עדכן את מד המרחק של רכבך !<br>";
  $message .= "ניתן להשתמש בקישור : <a href=\"http://cars.bgoldman-eng.com/?l=" . $row['carLP'] . "\" target=\"_blank\">" . $row['carLP'] . "</a><br><br>";
  $message .= "בברכה,<br>";
  $message .= "עליזה";
  $message .= '</body></html>';
  mail($row['email'],$subject,$message,$headers);
  array_push($sent,$row['driver'] . " , רכב : " . $row['carLP']);
  }
else
  {
  array_push($notSent,$row['driver'] . " , רכב : " . $row['carLP']);
  }
}


$subject = "[cars.bgoldman] - נשלחה תזכורת לגבי מד המרחק של הרכבים";
  $subject = "=?UTF-8?B?" . base64_encode($subject).'?=';
  $headers = "From: office@bgoldman.co.il\r\n";
  $headers .= "Reply-To: office@bgoldman.co.il\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=utf8\r\n";
  $message = '<html><body>';
  $message .= "עליזה שלום,<br>";
  $message .= "<br>נשלחה תזכורת לנהגים הבאים : <br>";
foreach ($sent as $value) {
  $message .= $value . "<br>";
}
  $message .= "<br>לנהגים הבאים לא מוזנת כתובת אימייל :<br>";
foreach ($notSent as $value) {
  $message .= $value . "<br>";
}
  $message .= "בברכה,<br>";
  $message .= "ערן";
  $message .= '</body></html>';
  mail("eran@gmit.co.il",$subject,$message,$headers);
   
?>
<?php
include_once "db.php"; 
$sent = array();
$notSent = array();
$sql = "select * from drivers";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
if ($row['email'] != '')
  {
  $subject = "[cars.bgoldman] - ����� �� ���� �� ����";
  $subject = "=?UTF-8?B?" . base64_encode($subject).'?=';
  $headers = "From: office@bgoldman.co.il\r\n";
  $headers .= "Reply-To: office@bgoldman.co.il\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=utf8\r\n";
  $message = '<html><body>';
  $message .= $row['driver'] . " ����,<br>";
  $message .= "��� ���� �� �� ����� �� ���� !<br>";
  $message .= "���� ������ ������ : <a href=\"http://cars.bgoldman-eng.com/?l=" . $row['carLP'] . "\" target=\"_blank\">" . $row['carLP'] . "</a><br><br>";
  $message .= "�����,<br>";
  $message .= "�����";
  $message .= '</body></html>';
  mail($row['email'],$subject,$message,$headers);
  array_push($sent,$row['driver'] . " , ��� : " . $row['carLP']);
  }
else
  {
  array_push($notSent,$row['driver'] . " , ��� : " . $row['carLP']);
  }
}


$subject = "[cars.bgoldman] - ����� ������ ���� �� ����� �� ������";
  $subject = "=?UTF-8?B?" . base64_encode($subject).'?=';
  $headers = "From: office@bgoldman.co.il\r\n";
  $headers .= "Reply-To: office@bgoldman.co.il\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=utf8\r\n";
  $message = '<html><body>';
  $message .= "����� ����,<br>";
  $message .= "<br>����� ������ ������ ����� : <br>";
foreach ($sent as $value) {
  $message .= $value . "<br>";
}
  $message .= "<br>������ ����� �� ����� ����� ������ :<br>";
foreach ($notSent as $value) {
  $message .= $value . "<br>";
}
  $message .= "�����,<br>";
  $message .= "���";
  $message .= '</body></html>';
  mail("eran@gmit.co.il",$subject,$message,$headers);
   
?>
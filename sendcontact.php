<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Contact form</title>

<link rel="stylesheet" type="text/css" href="design.css">

</head>
<body>


<?php

  $dbuser = "atanase";
  $dbpass = "easy123";
  $db = "SSID";
  $connect = oci_connect($dbuser, $dbpass, $db);

  if(!$connect){
    echo "An error occurred connecting to the database";
    exit;
  }

$contactname = $_POST['contactname'];
$contactemail = $_POST['contactemail'];
$contactsubject = $_POST['contactsubject'];
$contactmessage = $_POST['contactmessage'];

$query_count = "SELECT max(idcontact) FROM contact";

echo "SQL: $query_count<br>";

$stmt = oci_parse($connect, $query_count);

if(!$stmt){
  echo "An error occurred in parsing the sql string.\n";
  exit;
}

oci_execute($stmt);

if (oci_fetch_array($stmt)) {

  $count = oci_result($stmt, 1);
  echo $count."</br>";
    # code...
} else {
  echo "An error occurred in retrieving contact id.\n";
  exit;
}

$count++;
echo $count."</br>";

$query = "INSERT INTO contact (idcontact, contact_name, contact_email, contact_subject, contact_message ) VALUES ($count, '$contactname', '$contactemail', '$contactsubject', '$contactmessage')";

$stmt = oci_parse($connect, $query);
echo "SQL: $query<br>";

if(!$stmt){
  echo "An error has occurred in parsing the sql string.\n";
  exit;
}

oci_execute($stmt);

echo ("<h2 align='center'>Thank you for contacting us using our online form!</h2>");
echo ("<p align='center'>The following email: ".$contactemail." has been registered!</p>");
echo ("<p align='center'>We will contact you shortly!</p>");
echo("<p align='center'>The contact form with ID number ".$count." has been added to the database!</p>");
echo ("<p></p>");

oci_close($connect);
 ?>

<form align=center>
  <input type="button" value="Back to contact page."
  onclick="window.location.href='contactpage.html'" />
</form>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Orders form</title>

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

$orderbook1 = $_POST['orderbook1'];
$orderbook2 = $_POST['orderbook2'];
$orderbook3 = $_POST['orderbook3'];
$orderbook4 = $_POST['orderbook4'];
$orderbook5 = $_POST['orderbook5'];
$orderbook6 = $_POST['orderbook6'];
$ordername = $_POST['ordername'];
$orderphone = $_POST['orderphone'];
$orderemail = $_POST['orderemail'];
$orderunitnr = $_POST['orderunitnr'];
$orderstreet = $_POST['orderstreet'];
$ordercity = $_POST['ordercity'];
$orderzip = $_POST['orderzip'];
$ordercountry = $_POST['ordercountry'];
$ordercardname = $_POST['ordercardname'];
$ordercardnr = $_POST['ordercardnr'];
$ordermonth = $_POST['ordermonth'];
$orderyear = $_POST['orderyear'];
$ordercvc = $_POST['ordercvc'];

$query_count = "SELECT max(idorders) FROM orders";

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
  echo "An error occurred in retrieving order id.\n";
  exit;
}

$count++;
echo $count."</br>";

$query = "INSERT INTO orders (idorders, orderbook1, orderbook2, orderbook3, orderbook4, orderbook5, orderbook6, ordername, orderphone, orderemail, orderunitnr, orderstreet, ordercity, orderzip, ordercountry, ordercardname, ordercardnr, ordermonth, orderyear, ordercvc) VALUES ($count, '$orderbook1', '$orderbook2', '$orderbook3', '$orderbook4', '$orderbook5', '$orderbook6', '$ordername', '$orderphone', '$orderemail', '$orderunitnr', '$orderstreet', '$ordercity', '$orderzip', '$ordercountry',
'$ordercardname', '$ordercardnr', '$ordermonth', '$orderyear', '$ordercvc')";

$stmt = oci_parse($connect, $query);
echo "SQL: $query<br>";

if(!$stmt){
  echo "An error has occurred in parsing the sql string.\n";
  exit;
}

oci_execute($stmt);

echo ("<h2 align='center'>Thank you for ordering from us!</h2>");
echo ("<p align='center'>Your order has been successfully placed!</p>");
echo ("<p align='center'>The order has been placed under the name ".$ordername."!</p>");
echo("<p align='center'> The order with ID number ".$count." has been added to the database!</p>");
echo ("<p></p>");

oci_close($connect);
 ?>


<form align=center>
  <input type="button" value="Back to order page."
  onclick="window.location.href='bookorderpage.html'" />
</form>

</body>
</html>

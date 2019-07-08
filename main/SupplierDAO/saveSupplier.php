<?php
session_start();
include('../../connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
// query
$sql = "INSERT INTO supliers (suplier_name,suplier_address,suplier_contact) VALUES (:a,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c));
header("location: ../supplier.php");


?>
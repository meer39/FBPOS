<?php
// configuration
include('../../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
// query
$sql = "UPDATE supliers 
        SET suplier_name=?, suplier_address=?, suplier_contact=?
		WHERE suplier_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$id));
header("location: ../supplier.php");

?>
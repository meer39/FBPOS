<?php
// configuration
include('../../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['code'];
$b = $_POST['name'];
$c = $_POST['cost'];
$d = $_POST['price'];
$e = $_POST['supplier'];
$g = $_POST['size'];
$h = $_POST['color'];
$i = $_POST['category'];
// query
$sql = "UPDATE products 
        SET product_code=?, product_name=?, cost=?, price=?, supplier=?, size=?, color=?, category=?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$g,$h,$i,$id));
header("location: ../products.php");

?>
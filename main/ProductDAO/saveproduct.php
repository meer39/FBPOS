<?php
session_start();
include('../../connect.php');
$a = $_POST['code'];
$b = $_POST['name'];
$c = $_POST['cost'];
$d = $_POST['price'];
$e = $_POST['supplier'];
$g = $_POST['size'];
$h = $_POST['color'];
$i = $_POST['category'];
// query
$sql = "INSERT INTO products (product_code,product_name,cost,price,supplier,size,color,category) VALUES (:a,:b,:c,:d,:e,:g,:h,:i)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e, ':g'=>$g, ':h'=>$h, ':i'=>$i));

header("location: ../products.php");

?>
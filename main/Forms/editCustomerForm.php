<?php
	include('../../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM customer WHERE customer_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<form action="CustomerDAO/saveEditCustomer.php" method="post">
	<div id="ac">
		<input type="hidden" name="memi" value="<?php echo $id; ?>" />
		<div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Name"  value="<?php echo $row['customer_name']; ?>" required/>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="address" placeholder="Address"  value="<?php echo $row['address']; ?>"/>        
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="contact" placeholder="Contact"  value="<?php echo $row['contact']; ?>"/>
        </div>
        <input class="btn btn-success float-right" type="submit" value="save" />
	</div>
</form>
<?php
}
?>
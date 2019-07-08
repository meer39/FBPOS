<?php
	include('../../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM supliers WHERE suplier_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<form action="SupplierDAO/saveEditSupplier.php" method="post">
	<div id="ac">
	<input type="hidden" name="memi" value="<?php echo $id; ?>" />
		<div class="form-group">        
			<input type="text" name="name" class="form-control" required value="<?php echo $row['suplier_name']; ?>" /><br>
        </div>
		<div class="form-group">        
			<input type="text" name="address" class="form-control" required value="<?php echo $row['suplier_address']; ?>" /><br>
        </div>
		<div class="form-group">        
			<input type="text" name="contact" class="form-control" required value="<?php echo $row['suplier_contact']; ?>" /><br>
        </div>
		<input class="btn btn-success float-right" type="submit" value="save" />
	</div>
</form>
<?php
}
?>
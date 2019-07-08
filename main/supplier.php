<html>
<?php include('head.php'); ?>
<body>
<div id="maintable">
<div style="margin-top: -19px; margin-bottom: 21px;">
<a href="index.php" class="btn btn-danger">Back</a>
</div>
<input type="text" name="filter" value="" id="filter" class="form-control" placeholder="Search Supplier..." autocomplete="off" autofocus />
<a rel="facebox" href="Forms/addSupplierForm.php" class="btn btn-success float-right">Add Supplier</a>
<table id="resultTable" data-responsive="table" class="table table-hover">
	<thead>
		<tr>
			<th> Supplier </th>
			<th> Address </th>
			<th> Contact </th>
			<th> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM supliers ORDER BY suplier_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['suplier_name']; ?></td>
			<td><?php echo $row['suplier_address']; ?></td>
			<td><?php echo $row['suplier_contact']; ?></td>
			<td><a rel="facebox" href="SupplierDAO/editSupplier.php?id=<?php echo $row['suplier_id']; ?>"> Edit </a> | <a href="#" id="<?php echo $row['suplier_id']; ?>" class="delbutton" title="Click To Delete">Delete</a></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "SupplierDAO/deleteSupplier.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
</html>
<html>
<?php include('head.php'); ?>
<body>
<div id="maintable">
	<div style="margin-top: -19px; margin-bottom: 21px;">
		<a class="btn btn-danger" href="index.php" style="float: none;">Back</a>
	</div>
	<!-- <input type="text" name="filter" value="" id="filter" placeholder="Search Customer..." autocomplete="off" /><a rel="facebox" id="addd" href="purchases.php">Add Purchases</a><br><br> -->

	<div class="row">
		<input type="text" name="filter" value="" class="form-control col-sm-9" id="filter"placeholder="Search..." autocomplete="off" />
		<a rel="facebox" class="btn btn-success float-right col-sm-2 ml-3" href="Forms/addPurchasesForm.php">Add Purchases</a>
	</div>
	<table id="resultTable" class="table table-hover mt-3">
		<thead>
			<tr>
				<th width="5%"> Invoice Number </th>
				<th width="21%"> Date </th>
				<th width="11%"> Supplier </th>
				<th width="11%"> Remarks </th>
				<th width="12%"> Action </th>
			</tr>
		</thead>
		<tbody>
			
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM purchases ORDER BY transaction_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['invoice_number']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['suplier']; ?></td>
			<td><?php echo $row['remarks']; ?></td>
			<td><a rel="facebox" href="view_purchases_list.php?iv=<?php echo $row['invoice_number']; ?>"> View </a> | <a href="#" id="<?php echo $row['transaction_id']; ?>" class="delbutton" title="Click To Delete">Delete</a></td>
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
   url: "PurchaseDAO/deletePurchase.php",
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
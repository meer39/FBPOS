<html>
<?php include('head.php'); ?>
<body>
<div id="maintable"><div style="margin-top: -19px; margin-bottom: 21px;">
<a id="addd" href="index.php" style="float: none;">Back</a>
</div>
<input type="text" name="filter" value="" id="filter" placeholder="Search Product..." autocomplete="off" /><a rel="facebox" id="addd" href="Forms/addProductForm.php">Add Product</a><br><br>
<table id="resultTable" data-responsive="table" class="table table-hover table-bordered">
	<thead>
		<tr>
			<th scope="col"> Code </th>
			<th scope="col"> Name </th>
			<th scope="col"> Cost </th>
			<th scope="col"> Price </th>
			<th scope="col"> Supplier </th>
			<th scope="col"> Qty </th>
			<th scope="col">Size</th>
			<th scope="col">Color</th>
			<th scope="col">Category</th>
			<th scope="col"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM products ORDER BY product_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['product_name']; ?></td>
			<td><?php
			$pcost=$row['cost'];
			echo formatMoney($pcost, true);
			?></td>
			<td><?php
			$pprice=$row['price'];
			echo formatMoney($pprice, true);
			?></td>
			<td><?php echo $row['supplier']; ?></td>
			<td><?php echo $row['qty']; ?></td>
			<td><?php echo $row['size'] ?></td>
			<td><?php echo $row['color'] ?></td>
			<td><?php echo $row['category'] ?></td>
			<td><a rel="facebox" href="Forms/editProductForm.php?id=<?php echo $row['product_id']; ?>"> Edit </a> | <a href="#" id="<?php echo $row['product_id']; ?>" class="delbutton" title="Click To Delete">Delete</a></td>
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
   url: "ProductDAO/deleteProduct.php",
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
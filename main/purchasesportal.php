<html>
<?php
	require_once('auth.php');
	include('head.php');
?>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
</head>
<body>
<div id="maintable">
<form action="savepurchasesitem.php" method="post" >
	<input type="hidden" name="invoice" value="<?php echo $_GET['iv']; ?>" />
	<div class="form-group row">
		<div class="col-sm-8">
			<select name="product" style="width: 600px;" class="form-control">
				<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM products WHERE supplier = :supplier");
					// $result->bindParam(':userid', $res);
					$result->bindParam(':supplier', $_GET['supplier']);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
				?>
					<option value="<?php echo $row['product_code']; ?>"><?php echo $row['product_code']; ?> - <?php echo $row['product_name']; ?> - <?php echo $row['size'] ?> - <?php echo $row['color'] ?></option>
				<?php
				}
				?>
			</select>
		</div>
		<div class="col-sm-2">
			<input type="text" name="qty" value="" placeholder="Qty" autocomplete="off" class="form-control"/>
		</div>
		<div class="col-sm-2">
			<input type="submit" value="save" style="width: 123px;" class="btn btn-success"/>
		</div>	
	</div>
</form>

<div class="content" id="content">
<div>
<?php
$id=$_GET['iv'];
include('../connect.php');
$resultaz = $db->prepare("SELECT * FROM purchases WHERE invoice_number= :xzxz");
$resultaz->bindParam(':xzxz', $id);
$resultaz->execute();
for($i=0; $rowaz = $resultaz->fetch(); $i++){
echo 'Transaction ID : TR-'.$rowaz['transaction_id'].'<br>';
echo 'Invoice Number : '.$rowaz['invoice_number'].'<br>';
echo 'Date : '.$rowaz['date'].'<br>';
echo 'Supplier : '.$rowaz['suplier'].'<br>';
echo 'Remarks : '.$rowaz['remarks'].'<br>';
}
?>
</div>
<table id="resultTable" class="table table-hover">
	<thead>
		<tr>
			<th width="5%"> Name </th>
			<th width="21%"> Qty </th>
			<th width="11%"> Cost </th>
			<th width="12%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				$id=$_GET['iv'];
				$result = $db->prepare("SELECT * FROM purchases_item WHERE invoice= :userid");
				$result->bindParam(':userid', $id);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php
			$rrrrrrr=$row['name'];
			$resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
			$resultss->bindParam(':asas', $rrrrrrr);
			$resultss->execute();
			for($i=0; $rowss = $resultss->fetch(); $i++){
			echo $rowss['product_name'];
			}
			?></td>
			<td><?php echo $row['qty']; ?></td>
			<td>
			<?php
			$dfdf=$row['cost'];
			echo formatMoney($dfdf, true);
			?>
			</td>
			<td><a href="deletep.php?id=<?php echo $row['id']; ?>&invoice=<?php echo $_GET['iv']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['name'];?>"> Delete </a></td>
			</tr>
			<?php
				}
			?>
			<tr>
				<td colspan="2"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
				<td colspan="2"><strong style="font-size: 12px; color: #222222;">
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
				$sdsd=$_GET['iv'];
				$resultas = $db->prepare("SELECT sum(cost) FROM purchases_item WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(cost)'];
				echo formatMoney($fgfg, true);
				}
				?>
				</strong></td>
			</tr>
		
	</tbody>
</table></div><br>
<a href="index.php" class="btn btn-danger">Back</a><a class="btn btn-primary btn-lg float-right" href="javascript:Clickheretoprint()">Print</a>
<div class="clearfix"></div>
</div>
</body>
</html>
<link href="invoice.css" media="screen" rel="stylesheet" type="text/css" />
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=true,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=no"; 
  var content_vlue = document.getElementById("invoice-POS").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
    docprint.document.write('</body></html>');
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<a href="javascript:Clickheretoprint()" style="font-size:20px";>Print</a>|<a href="index.php" style="font-size:20px";>Back</a>
<?php
$invoice=$_GET['invoice'];
include('../connect.php');
$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$cname=$row['name'];
$invoice=$row['invoice_number'];
$date=$row['date'];
// $cash = 0;
$cash=$row['due_date'];
$cashier=$row['cashier'];

$pt=$row['type'];
$am=$row['amount'];
if($pt=='cash'){
$cash=$row['due_date'];
$amount=$cash-$am;
}
}
?><br>
<br>

<!-- <div class="content" id="content">
<div style="margin: 0 auto; padding: 20px; width: 700px; font-weight: normal;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 459px; float: left;">
	<h1>fb - Fashion Botique</h1><br>
	Street Address<br>
	Brgy<br>
	TIN:<br>
	Contact No : <br>
	Email Add : <br>
	<div>
	<?php
	$resulta = $db->prepare("SELECT * FROM customer WHERE customer_name= :a");
	$resulta->bindParam(':a', $cname);
	$resulta->execute();
	for($i=0; $rowa = $resulta->fetch(); $i++){
	$address=$rowa['address'];
	$contact=$rowa['contact'];
	}
	?>
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">
		<tr>
			<td width="25%">Received From : </td>
			<td width="75%"><?php echo $cname ?></td>
		</tr>
		<tr>
			<td width="25%">Address : </td>
			<td width="75%"><?php if(isset($address))echo $address ?></td>
		</tr>
		<tr>
			<td width="25%">Contact No : </td>
			<td width="75%"><?php if(isset($contact)) echo $contact ?></td>
		</tr>
	</table>
	</div>
	</div>
	<div style="width: 236px; float: right; height: 178px;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">
		<tr>
			<td colspan="2"><div style="text-align: center; font-weight: bold;">
			
			<?php
			if($pt=='cash'){
			echo 'OFFICIAL RECEIPT:';
			}
			if($pt=='credit'){
			echo 'CREDIT RECEIPT:';
			}
			?>
			</div></td>
		</tr>
		<tr>
			<td>OR No.</td>
			<td><?php echo $invoice ?></td>
		</tr>
		<tr>
			<td>Date</td>
			<td><?php echo $date ?></td>
		</tr>
		<tr style="height: 109px; vertical-align: top;">
			<td>Remarks</td>
			<td><?php echo $cash ?></td>
		</tr>
	</table>
	
	</div>
	<div class="clearfix"></div>
	</div>
	<div style="width: 100%">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;" width="50%">
		<thead>
			<tr>
				<th> Product Code </th>
				<th> Product Name </th>
				<th> Qty </th>
				<th> Price </th>
				<th> Discount </th>
				<th> Amount </th>
			</tr>
		</thead>
		<tbody>
			
				<?php
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
				?>
				<tr class="record">
				<td><?php echo $row['product']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['qty']; ?></td>
				<td>
				<?php
				$ppp=$row['price'];
				echo formatMoney($ppp, true);
				?>
				</td>
				<td>
				<?php
				$ddd=$row['discount'];
				echo formatMoney($ddd, true);
				?>
				</td>
				<td>
				<?php
				$dfdf=$row['amount'];
				echo formatMoney($dfdf, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
					<td colspan="2"><strong style="font-size: 12px; color: #222222;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $rowas = $resultas->fetch(); $i++){
					$fgfg=$rowas['sum(amount)'];
					echo formatMoney($fgfg, true);
					}
					?>
					</strong></td>
				</tr>
				<?php if($pt=='cash'){
				?>
				<tr>
					<td colspan="5"><strong style="font-size: 12px; color: #222222;">Cash Tendered:</strong></td>
					<td colspan="2"><strong style="font-size: 12px; color: #222222;">
					<?php
					echo formatMoney($cash, true);
					?>
					</strong></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="5"><strong style="font-size: 12px; color: #222222;">
					<?php
					if($pt=='cash'){
					echo 'Change:';
					}
					if($pt=='credit'){
					echo 'Due Date:';
					}
					?>
					</strong></td>
					<td colspan="2"><strong style="font-size: 12px; color: #222222;">
					<?php
					//function formatMoney($number, $fractional=false) {
					// 	if ($fractional) {
					// 		$number = sprintf('%.2f', $number);
					// 	}
					// 	while (true) {
					// 		$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
					// 		if ($replaced != $number) {
					// 			$number = $replaced;
					// 		} else {
					// 			break;
					// 		}
					// 	}
					// 	return $number;
					// }
					if($pt=='credit'){
					echo $cash;
					}
					if($pt=='cash'){
					echo formatMoney($amount, true);
					}
					?>
					</strong></td>
				</tr>
			
		</tbody>
	</table>
	</div>
	
<div style="text-align: right; margin-top: 13px;">Cashier : <?php echo $cashier ?></div>
</div>
</div> -->


<div id="invoice-POS">
    
    <center id="top" style="margin: 0px;">
      <div class="logo">
		  <img src="../logo.png" alt="logo" width="150px" height="60px"/>
		<div style="margin: 0px; font-size: 1em;">Project By Liaqat Garments - Since 1985</div>
	  </div>
    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info">
        <p> 
            College Road Opposite Noor Mosque, Daska<br>
            0347-6190458<br>
			0300-6437725
        </p>
	  </div>
		<div style="font-size: 1em; text-align: center; margin-bottom:5px;"><?php date_default_timezone_set("Asia/Karachi"); echo date("F j, Y, g:i a");?></div>
		<span style="font-size: 1em;"><strong>Receipt No. </strong><?php echo $invoice; ?></span>
		<hr style="margin:0px;">	  
    </div><!--End Invoice Mid-->
    
    <div id="bot">

		<div id="table">
			<table width="100%">
			
				<tr class="tabletitle" style="background-color: #EEE;">
					<td class="item" style="font-size: .5em; width: 40mm;"><h2>Item</h2></td>
					<td class="Hours" style="font-size: .5em;"><h2>Discount</h2></td>
					<td class="Hours" style="font-size: .5em;"><h2>Qty</h2></td>
					<td class="Rate" style="font-size: .5em;"><h2>Sub Total</h2></td>
				</tr>

				<?php
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
					$productPrice = 0;
					$qty = 0;
					for($i=0; $row = $result->fetch(); $i++){
				?>

				<tr class="service">
					<td class="tableitem"><p class="itemtext" style="font-size: 1em;"><?php echo $row['name'] ?></p></td>
					<td class="tableitem"><p class="itemtext" style="font-size: 1em;"><?php echo $row['discount'] ?>%</p></td>
					<td class="tableitem"><p class="itemtext" style="font-size: 1em;"><?php echo $row['qty'] ?></p></td>
					<?php $discountPrice = $row['price'] - ($row['price'] * $row['discount'] / 100); ?>
					<td class="tableitem"><p class="itemtext" style="font-size: 1em;"><?php	echo $discountPrice*$row['qty']; ?></p></td>
					<?php  $productPrice = $productPrice + ($discountPrice*$row['qty']); $qty += $row['qty'] ?>
				</tr>

				<?php } ?>
				</table>

				<hr style="margin:0px;">

				<table width="100%">

				<tr class="tabletitle"><td>Total Items: <?php echo $qty; ?></td></tr>
				<!--<tr class="tabletitle" style="background-color: #EEE;">
					<td></td>
					<td class="Rate" style="font-size: .5em;"><h2>Total</h2></td>
					<td class="payment" style="font-size: .5em;"><h2><?php echo $productPrice; ?></h2></td>
				</tr>

				 <tr class="tabletitle" style="background-color: #EEE;">
					<td></td>
					<td class="Rate" style="font-size: .5em;"><h2>Discount</h2></td>
					<?php
						$discount = $db->prepare("SELECT discount FROM discount");
						$discount->execute();
						$discount = $discount->fetch();
					?>
					<td class="payment" style="font-size: .5em;"><h2><?php echo formatMoney($discount['discount'], true) ?></h2></td>
				</tr> -->
				<tr class="tabletitle" style="background-color: #EEE;">
					<td></td>
					<td class="Rate" style="font-size: .5em;"><h2>Total</h2></td>
					<?php $productPrice = $productPrice - ($productPrice * $discount['discount'] / 100) ?>
					<td class="payment" style="font-size: .5em;"><h2><?php echo formatMoney($productPrice, true) ?></h2></td>
				</tr>
				<tr class="tabletitle" style="background-color: #EEE;">
					<td></td>
					<td class="Rate" style="font-size: .5em;"><h2>Cash Tendered</h2></td>
					<td class="payment" style="font-size: .5em;"><h2><?php echo formatMoney($cash, true); ?></h2></td>
				</tr>
				<tr class="tabletitle" style="background-color: #EEE;">
					<td></td>
					<td class="Rate" style="font-size: .5em;"><h2><?php if($pt=='cash'){echo 'Change';} if($pt=='credit'){echo 'Due Date';}?></h2></td>
					<td class="payment" style="font-size: .5em;"><h2><?php
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
					if($pt=='credit'){
					echo $cash;
					}
					if($pt=='cash'){
					echo formatMoney($amount, true);
					}
					?></h2></td>
				</tr>

			</table>
			<hr style="margin:0px;">
		</div><!--End Table-->

		<div id="legalcopy">
			<!-- <p class="legal"> -->
			<ul>
			<li>Thanks Your Shopping and Your Satisfaction is our Proud.</li>
			<li>Keep Follow For Update Collection and Unique Designe 0300-6437725.</li> 
			<li>Show your Bill While Return Within Three Days.</li> 
			<li>Exchange is Possible Only.</li>
			</ul>
			<!-- </p> -->
		</div>
		<hr>
		<div style="font-size: 1em; text-align:center;"> Design & Developed By <br> <img src="../atlogo.png" width="65px" height="15px"><br> +92306 - 4798395 </div>

	</div><!--End InvoiceBot-->
  </div><!--End Invoice-->
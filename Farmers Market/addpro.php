<?php
	$val = sizeof($_GET);
	if($val==0)
	{
		echo "<script>location.href='login.html'</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Ajai_qmar">
		<meta name="viewport" content="width = device-width , initial-scale = 1.0">
		<title> FARMERS MARKET </title>
		<link rel="stylesheet" href="CSS/addpro.css?v=<?php echo time(); ?>">
	</head>
	<body>
		<div id="container">
			<h1> Farmers Market </h1>
			<h2> FILL THE DETAILS TO ADD THE PRODUCT TO THE INVENTORY </h2>
			<form action="add.php<?php echo "?key=".$_GET["key"]?>" method="POST">
				<div class="input">
					<input id="product" type="text" placeholder="PRODUCT" name="product" />
				</div>
				<div class="input">
					<input id="value" type="tel" placeholder="PRICE PER KG" oninput="check_numbers()" name="price" />
					<div id="price"></div>
				</div>
				<div class="input">
					<input id="location" type="text" placeholder="CITY" oninput="" name="city" />
				</div>
				<input type="submit" id="submit" value="SUBMIT"/>
			</form>
		</div>
		<script src="JAVASCRIPT/addpro.js"></script>
	</body>
</html>

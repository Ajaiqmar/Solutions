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
		<title> உழவர் சந்தை </title>
		<link rel="stylesheet" href="CSS/taddpro.css?v=<?php echo time(); ?>">
	</head>
	<body>
		<div id="container">
			<h1> உழவர் சந்தை </h1>
			<h2> உற்பத்தியை முதலீட்டில் சேர்க்க விவரங்களை நிரப்பவும் </h2>
			<form action="tadd.php<?php echo "?key=".$_GET["key"]?>" method="POST">
				<div class="input">
					<input id="product" type="text" placeholder="தயாரிப்பு" name="product" />
				</div>
				<div class="input">
					<input id="value" type="tel" placeholder="ஒரு கிலோ விலை" oninput="check_numbers()" name="price" />
					<div id="price"></div>
				</div>
				<div class="input">
					<input id="location" type="text" placeholder="நகரம்" oninput="" name="city" />
				</div>
				<input type="submit" id="submit" value="சமர்ப்பிக்கவும்"/>
			</form>
		</div>
		<script src="JAVASCRIPT/addpro.js"></script>
	</body>
</html>

<?php
	$val = sizeof($_GET);
	if($val==0)
	{
		echo "<script>location.href='login.html'</script>";
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="AJAY KUMAR">
		<meta name="viewport" content="width=device-width and initial-scale=1.0">
		<meta name="description" content="Electronic market for Farmers">
		<title>FARMERS MARKET</title>
		<link rel="stylesheet" href="CSS/bors.css">
	</head>
	<body>
		<div id="container">
			<div id="head"><h1>Farmers Market</h1></div>
			<div id="contents">
				<a href="mainproduct.php<?php echo "?key=".$_GET['key'];?>"><h2 id="buy">BUYER</h2></a>
				<div class="line"> </div> <h3> OR </h3> <div class="line"> </div>
				<a href="proinst.php<?php echo "?key=".$_GET['key'];?>"><h2 id="sell">SELLER</h2></a>
			</div>
		</div>
	</body>
</html>

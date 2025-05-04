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
		<title>உழவர் சந்தை</title>
		<link rel="stylesheet" href="CSS/bors_tamil.css">
	</head>
	<body>
		<div id="container">
			<div id="head"><h1>உழவர் சந்தை</h1></div>
			<div id="contents">
				<a href="tmainproduct.php<?php echo "?key=".$_GET['key'];?>"><h2 id="buy">வாங்குபவர்</h2></a>
				<div class="line"> </div> <h3> அல்லது </h3> <div class="line"> </div>
				<a href="tproinst.php<?php echo "?key=".$_GET['key'];?>"><h2 id="sell">விற்பனையாளர்</h2></a>
			</div>
		</div>
	</body>
</html>

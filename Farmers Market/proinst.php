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
		<title>FARMERS MARKET</title>
		<meta name="author" content="ajai_qmar">
		<meta name="description" content="Electronic market for farmers">
		<meta name="viewport" content="initial-scale = 1.0 , width = screen-width">
		<link rel="stylesheet" href="CSS/proinst.css?v=<?php echo time();?>">
	</head>
	<body>
		<div id="header">
			<h1>Farmers Market</h1>
			<h2>HELLO, <?php echo $_GET["key"]; ?></h2>
			<nav>
				<a href="bors.php<?php echo "?key=".$_GET["key"]; ?>">INDEX</a>
				<a href="profile.php<?php echo "?key=".$_GET["key"]; ?>">PROFILE</a>
				<a href="addpro.php<?php echo "?key=".$_GET["key"]; ?>">ADD PRODUCT</a>
				<a href="index.html">LOG OUT</a>
				<a href="https://en.wikipedia.org/wiki/Farmers%27_market">ABOUT</a>
		</div>
				<?php
					$conn = new mysqli("localhost","root","","rural");
					$val = $_GET["key"];
					if($conn -> connect_error)
					{
						echo "error";
					}
					$sql = "SELECT * FROM `products` WHERE `username`='$val';";

					$table = mysqli_query($conn,$sql);

					$n = mysqli_num_rows($table);

					if($n!=0)
					{
						echo "<div id='container'>
										<center>";
						while($n!=0)
						{
							$row = mysqli_fetch_assoc($table);
							$pro = $row["product"];
							$pr = $row["price"];
							echo "<div id='products'>
											<h3>$pro</h3>
											<table>
												<tr>
													<td>PRICE PER KG:</td>
													<td class='values'>$pr</td>
												</tr>
											</table>
											<a href='del.php?key=$val&pro=$pro&pr=$pr'>DELETE</a>
										</div>";
										$n-=1;
							}
							echo "</center>
										</div>";
						}

				?>
	</body>
</html>

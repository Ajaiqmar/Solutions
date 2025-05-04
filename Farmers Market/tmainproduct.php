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
		<title>உழவர் சந்தை</title>
		<meta name="author" content="ajai_qmar">
		<meta name="description" content="Electronic market for farmers">
		<meta name="viewport" content="initial-scale = 1.0 , width = screen-width">
		<link rel="stylesheet" href="CSS/tmainproduct.css?v=<?php echo time(); ?>">
	</head>
	<body>
		<div id="header">
			<h1>உழவர் சந்தை</h1>
			<h2>வணக்கம், <?php echo $_GET["key"]; ?></h2>
			<nav>
				<a href="bors_tamil.php<?php echo "?key=".$_GET["key"]; ?>">குறியீட்டு</a>
				<a href="tprofile.php<?php echo "?key=".$_GET["key"]; ?>">சுயவிவரம்</a>
				<a href="index.html">வெளியேறு</a>
				<a href="https://en.wikipedia.org/wiki/Farmers%27_market">பற்றி</a>
		</div>
		<div id="container">
				<center>
					<?php
						$conn = new mysqli("localhost","root","","rural");

						$user = $_GET["key"];

						if($conn->connect_error)
						{
							echo "error";
						}

						$sql1 = "SELECT `email` FROM `signup` WHERE `username`='$user';";
						$result1 = mysqli_query($conn,$sql1);

						$row1 = mysqli_fetch_assoc($result1);

						$email = $row1["email"];

						$sql2 = "SELECT * FROM `products`;";
						$table2 = mysqli_query($conn,$sql2);

						$m = mysqli_num_rows($table2);
						if($m!=0)
						{
							while($m!=0)
							{
								$row2 = mysqli_fetch_assoc($table2);
								if($row2["lang"]=="ta")
								{
									$val = $row2["username"];
									$price = $row2["price"];
									$city = $row2["city"];
									$pro = $row2["product"];
									echo "<div id='products'>
													<h3>$pro</h3>
													<table>
														<tr>
															<td>விற்பனையாளரின் பெயர்: </td>
															<td class='values'>$val</td>
															</tr>
														<tr>
															<td>ஒரு கிலோ விலை:</td>
															<td class='values'>$price</td>
														</tr>
														<tr>
															<td>நகரம்:</td>
															<td class='values' id='city'>$city</td>
														</tr>
													</table>
													<a href='tbuy.php?key=$user&name=$val&email=$email&pro=$pro'>வாங்க</a>
												</div>";
								}
								$m-=1;
							}
						}
						mysqli_close($conn);
					?>
				</center>
			</div>
	</body>
</html>

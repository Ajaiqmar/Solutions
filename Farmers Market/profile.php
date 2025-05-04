<?php
	$val = sizeof($_GET);
	if($val==0)
	{
		echo "<script>location.href='login.html'</script>";
	}
?>
<?php
	$conn = new mysqli("localhost","root","","rural");

	if($conn -> connect_error)
	{
		echo "ERROR";
	}

	$val = $_GET["key"];
	$pass = "";
	$email = "";
	$pn = "";

	$sql = "SELECT `username`,`password`,`email`,`phonenumber` FROM `signup`;";
	$table = mysqli_query($conn,$sql);
	$n = mysqli_num_rows($table);

	while($n!=0)
	{
		$row = mysqli_fetch_assoc($table);
		if($row["username"]==$val)
		{
			$pass = $row["password"];
			$email = $row["email"];
			$pn = $row["phonenumber"];
			break;
		}
		$n-=1;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>FARMERS MARKET</title>
		<meta name="author" content="ajai_qmar">
		<meta name="description" content="Online market for Farmers">
		<meta name="viewport" content="initial-scale = 1.0 , width = screen-width">
		<link rel="stylesheet" href="CSS/profile.css?v<?php echo time(); ?>">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
		<div id="container">
			<h1> PROFILE </h1>
			<form>
				<div class="space">
					<input type="username" id="username" name="username" placeholder="<?php echo $val; ?>" disabled />
				</div>
				<div class="space">
					<input type="password" id="password" name="password" placeholder="<?php echo $pass; ?>" disabled oninput="check_password()" />
					<!--<span class="material-icons" id="material" onclick="toggle_visibility()">visibility</span>-->
				</div>
				<p id="alert"></p>
				<div class="space">
				<input type="text" id="email" name="email" placeholder="<?php echo $email; ?>" disabled />
				</div>
				<div class="space">
				<input type="tel" id="phonenumber" name="phonenumber" placeholder="<?php echo $pn; ?>" disabled />
				</div>
				<div class="space">
					<!--<input type="submit" id="submit" />-->
					<div id="edit">
						<a href="edit.php?key=<?php echo $val; ?>">EDIT</a>
					</div>
				</div>
			</form>
		</div>
		<script src="JAVASCRIPT/login.js"></script>
	</body>
</html>

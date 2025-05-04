<?php
	$val = sizeof($_GET);
	if($val==0)
	{
		echo "<script>location.href='login.html'</script>";
	}
?>
<?php
  $product = $_POST["product"];
  $price = $_POST["price"];
  $city = $_POST["city"];

  $val = $_GET["key"];

  $conn = new mysqli("localhost","root","","rural");

  if($conn -> connect_error)
  {
    echo "ERROR";
  }

  $sql = "INSERT INTO products(`username`,`product`,`price`,`city`) VALUES ('$val','$product','$price','$city');";

  if(mysqli_query($conn,$sql))
  {
    echo "<script>location.href='proinst.php?key=$val'</script>";
  }
  else {
    echo "error";
  }
  mysqli_close($conn);
?>

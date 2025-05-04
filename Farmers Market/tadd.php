<?php
	$val = sizeof($_GET);
	if($val==0)
	{
		echo "<script>location.href='tlogin.html'</script>";
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

  $sql = "INSERT INTO products VALUES ('$val','$product','$price','$city','ta');";

  if(mysqli_query($conn,$sql))
  {
    echo "<script>location.href='tproinst.php?key=$val'</script>";
  }
  else {
    echo "error";
  }
  mysqli_close($conn);
?>

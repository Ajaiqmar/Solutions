<?php
	$val = sizeof($_GET);
	if($val==0)
	{
		echo "<script>location.href='login.html'</script>";
	}
?>
<?php
  $val = $_GET["key"];
  $pro = $_GET["pro"];
  $pr = $_GET["pr"];

  $conn = new mysqli("localhost","root","","rural");

  if($conn -> connect_error)
  {
    echo "ERROR";
  }

  $sql1 = "SELECT `product`,`price` FROM `products` WHERE username='$val';";

  $table = mysqli_query($conn,$sql1);

  $n = mysqli_num_rows($table);

  while($n!=0)
  {
    $row = mysqli_fetch_assoc($table);
    if($row["product"]==$pro && $row["price"]==$pr)
    {
      $sql2 = "DELETE FROM products WHERE `price`='$pr' AND `product`='$pro';";
      if(mysqli_query($conn,$sql2))
      {
        echo "<script>location.href='proinst.php?key=$val'</script>";
      }
      else
      {
        echo "error";
      }
      break;
    }
    $n-=1;
  }

?>

<?php
  $username = $_POST["username"];
  $password = $_POST["password"];


  $conn = new mysqli("localhost","root","","rural");

  if($conn -> connect_error)
  {
    echo "Error";
  }

  $sql = "SELECT `username`,`password` FROM `signup`;";

  $table = mysqli_query($conn,$sql);

  $n = mysqli_num_rows($table);


  while($n!=0)
  {
    $row = mysqli_fetch_assoc($table);
    $u = $row["username"];
    $p = $row["password"];
    if($u == $username && password_verify($password,$p))
    {
      echo "<script>location.href='bors.php?key=$username'</script>";
      break;
    }
    $n-=1;
  }
  include('login.html');
  echo "<script>alert('CHECK YOUR USERNAME AND PASSWORD')</script>";
  mysqli_close($conn);
?>

<?php
  $username = $_POST["username"];
  $pass = $_POST["password"];
  $email = $_POST["email"];
  $pn = $_POST["phonenumber"];

  $conn = new mysqli("localhost","root","","rural");

  if($conn->connect_error)
  {
    echo "error";
  }

  $sql1 = "SELECT `username`,`email`,`phonenumber` FROM `signup`;";

  $table = mysqli_query($conn,$sql1);

  $n = mysqli_num_rows($table);

  while($n!=0)
  {
    $row = mysqli_fetch_assoc($table);
    if($row["username"] == $username)
    {
      include("tsignup.html");
      echo "<script>alert('பெயர் ஏற்கனவே உள்ளது')</script>";
      die();
    }
    if($row["email"] == $email)
    {
      include("tsignup.html");
      echo "<script>alert('மின்னஞ்சல் ஏற்கனவே உள்ளது')</script>";
      die();
    }
    if($row["phonenumber"] == $pn)
    {
      include("tsignup.html");
      echo "<script>alert('தொலைபேசி எண் ஏற்கனவே உள்ளது')</script>";
      die();
    }
    $n-=1;
  }
  $pass=password_hash($pass,PASSWORD_DEFAULT);
  $sql2 = "INSERT INTO `signup` (`username`,`password`,`email`,`phonenumber`) VALUES ('$username','$pass','$email','$pn');";


  if(mysqli_query($conn,$sql2))
  {
    echo "<script>location.href='tlogin.html'</script>";
  }
  else
  {
    echo "error";
  }
  mysqli_close($conn);
?>

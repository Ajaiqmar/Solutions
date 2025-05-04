<?php
  $x=0;
  $y=0;
  $z=0;
  if(count($_GET))
  {
    $x=$_GET['user'];
    $y=$_GET['incpass'];
    $z=$_GET['mail'];
  }
  if(count($_POST)==2)
  {
    $mail=trim($_POST['email']," ");
    $pass=trim($_POST['password']," ");
    $conn = new mysqli("localhost","root","","assembly");

    if(!$conn)
    {
      echo "error";
    }

    $sql="SELECT * FROM users WHERE mail_id='$mail' AND pass_word='$pass';";

    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1)
    {
      echo "<script>location.href='discussion.php?key=$mail'</script>";
    }
    else {
      echo "<script>location.href='los.php?user=0&incpass=1&mail=0'</script>";
    }
    mysqli_close($conn);
  }
  else if(count($_POST)==4)
  {
    $user=trim($_POST['username']," ");
    $dep=trim($_POST['department']," ");
    $mail=trim($_POST['email']," ");
    $pass=trim($_POST['password']," ");
    $conn = new mysqli("localhost","root","","assembly");

    if(!$conn)
    {
      echo "error!";
    }

    $sql1="SELECT * FROM users WHERE username='$user';";
    $result1=mysqli_query($conn,$sql1);

    $sql2="SELECT * FROM users WHERE mail_id='$mail';";
    $result2=mysqli_query($conn,$sql2);


    if(mysqli_num_rows($result1)==1 && mysqli_num_rows($result2)==1)
    {
      echo "<script>location.href='los.php?user=1&incpass=0&mail=1'</script>";
    }
    else if(mysqli_num_rows($result1)==1)
    {
      echo "<script>location.href='los.php?user=1&incpass=0&mail=0'</script>";
    }
    else if(mysqli_num_rows($result2)==1)
    {
      echo "<script>location.href='los.php?user=0&incpass=0&mail=1'</script>";
    }
    else
    {
      $sql3="INSERT INTO users(username,department,mail_id,pass_word) VALUES('$user','$dep','$mail','$pass');";
      $result3=mysqli_query($conn,$sql3);

      if($result3)
      {
        echo "<script>location.href='los.php'</script>";
      }
      else {
        echo "error!!";
      }
    }
    mysqli_close($conn);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="ajaiqmar" />
    <meta name="description" content="website for intercollege communication" />
    <meta name="keywords" content="assembly,college,communication" />
    <title>ASSEMBLY</title>
    <link rel="icon" href="IMG/th.jfif" />
    <link rel="stylesheet" href="CSS/los.css?v=<?php echo time(); ?>" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
  </head>
  <body onload="uvalidation()">
    <input type="tel" value="<?php echo $x; ?>" id="exist" />
    <input type="tel" value="<?php echo $y; ?>" id="incorrect"  />
    <input type="tel" value="<?php echo $z; ?>" id="mail"  />
    <table>
      <tr>
        <td><img src="IMG/th.jfif" alt="logo" /></td>
        <td><h1 onclick="">ASSEMBLY</h1></td>
      </tr>
    </table>
    <div id="outline">
      <h2 id="log" onclick="log()">LOGIN</h2>
      <h2 id="sign" onclick="sign()">SIGNUP</h2>
      <center>
        <form id="for" method="POST">
          <input type="email" name="email" id="email" placeholder="MAIL - ID" onclick="clearp()" required/>
          <input type="password" name="password" id="pass" placeholder="PASSWORD" onclick="clearp()" required/>
          <p id="ualert"></p>
          <input type="checkbox" id="check" onclick="show()"/>
          <label> show password</label>
          <input type="submit" id="submit" value="SUBMIT"/>
        </form>
      </center>
    </div>
    <script src="JS/los.js?v=<?php echo time(); ?>"></script>
  </body>
</html>

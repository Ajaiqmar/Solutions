<?php
  $x=0;
  $y=0;
  $key=$_GET['key'];
  if(count($_GET)==0)
  {
    echo "<script>location.href='index.html'</script>";
  }
  if(count($_GET)==3)
  {
    $x = $_GET['u'];
    $y = $_GET['m'];
  }
  if(count($_POST)==1)
  {
    if(array_key_exists('email',$_POST))
    {
      $mail = $_POST['email'];

      $conn = new mysqli("localhost","root","","assembly");
      $sql2 = "SELECT * FROM users WHERE mail_id='$mail';";

      $result2 = mysqli_query($conn,$sql2);

      if(mysqli_num_rows($result2)==1)
      {
        echo "<script> location.href='profile.php?key=$key&u=0&m=1'</script>";
      }
      else
      {
        $sql3 = "UPDATE users SET mail_id='$mail' WHERE mail_id='$key';";
        $result3 = mysqli_query($conn,$sql3);
        if(!$result3)
        {
          echo "error!!";
        }
        else {
          echo "<script> location.href='profile.php?key=$mail'; </script>";
        }
      }
    }
    else if(array_key_exists('department',$_POST))
    {
      $dep = $_POST['department'];

      $conn = new mysqli("localhost","root","","assembly");

      $sql3 = "UPDATE users SET department='$dep' WHERE mail_id='$key';";
      $result3 = mysqli_query($conn,$sql3);
      if(!$result3)
      {
        echo "error!!!";
      }
    }
  }
  if(count($_FILES))
  {
    $exten = strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));
    $filename = "IMG/$key.$exten";

    $conn = new mysqli("localhost","root","","assembly");

    $sql2 = "SELECT prop FROM users WHERE mail_id='$key';";
    $result2 = mysqli_query($conn,$sql2);
    $row = mysqli_fetch_assoc($result2);
    if($row['prop']!='-')
    {
      if(file_exists($row['prop']))
      {
        unlink($row['prop']);
      }
    }

    $sql3 = "UPDATE users SET prop='$filename' WHERE mail_id='$key';";
    $result3 = mysqli_query($conn,$sql3);
    if(!$result3)
    {
      echo "error";
    }
    $t=move_uploaded_file($_FILES['file']['tmp_name'],$filename);

  }
  $conn = new mysqli("localhost","root","","assembly");

  $sql1 = "SELECT * FROM users WHERE mail_id='$key';";
  $result1 = mysqli_query($conn,$sql1);

  $row = mysqli_fetch_assoc($result1);

  $username = $row['username'];
  $department = $row['department'];
  $cgpa = $row['o_cgpa'];
  $img = $row['prop'];
  if($img=='')
  {
    $img='IMG/pp.png';
  }
  if($cgpa==0)
  {
    $cgpa='--';
  }
  mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="author" content="ajaiqmar" />
    <meta name="description" content="website for inter-college communication" />
    <meta name="keywords" content="assembly,communication,college" />
    <meta name="viewport" content="width=screen-width, initial-scale=1.0" />
    <title>ASSEMBLY</title>
    <link rel="icon" href="IMG/th.jfif" />
    <link rel="stylesheet" href="CSS/profile.css?v=<?php echo time(); ?>" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bc64afda90.js" crossorigin="anonymous"></script>
  </head>
  <body onload="uvalidation('<?php echo $key; ?>')">
    <input type="tel" id="m" value="<?php echo $y; ?>"/>
  </input/>
  </input/>
    <div id="blur">
    <table id="header">
      <tr>
        <td class="head"><img src="IMG/th.jfif" alt="logo" id="logo"/></td>
        <td class="head"><h1 onclick="">ASSEMBLY</h1></td>
        <td id="nav" class="head">
          <nav>
            <h2><a class="not" href="discussion.php?key=<?php echo $key; ?>" >DISCUSSION</a></h2>
            <h2><a class="not" href="cgpa.php?key=<?php echo $key; ?>">CGPA</a></h2>
            <h2><a id="current" href="profile.php?key=<?php echo $key; ?>">PROFILE</a></h2>
            <h2><a class="not" href="about.php?key=<?php echo $key; ?>">ABOUT</a></h2>
          </nav>
        </td>
      </tr>
    </table>
    <div id="profile">
      <center>
        <form method="POST" id="fpp" enctype="multipart/form-data">
          <input type="file" id="prp" name="file" accept="image/*" onchange="sub()"/>
          <input type="submit" id="sprp" />
        </form>
        <img src="<?php echo $img; ?>" alt="default picture" id="pp" onclick="upload()"/>
        <table id="tab1" >
          <tr>
            <td class="gen">USERNAME</td>
            <td class="val"><?php echo $username; ?> </td>
          </tr>
          <tr>
            <td class="gen">EMAIL-ID</td>
            <td class="val"><?php echo $key; ?> <i class="fas fa-edit" id="edit2" onclick="edit2('<?php echo $key; ?>')"></i></td>
          </tr>
          <tr>
            <td class="gen">DEPARTMENT</td>
            <td class="val"><?php echo $department; ?> <i class="fas fa-edit" id="edit3" onclick="edit3('<?php echo $department; ?>')"></i></td>
          </tr>
          <tr>
            <td class="gen">CGPA</td>
            <td class="val"><?php echo $cgpa; ?></td>
          </tr>
        </table>
        <a href="index.php" id="log"><i class="fas fa-power-off" id="power"></i></a>
      </center>
    </div>
    </div>
    <div id="pop">
       <form method="POST">
         <p onclick="escape('<?php echo $key; ?>')" id="esc">X</p>
         <h3>EDIT</h3>
         <input type="username" id="input" placeholder="" onclick="clearu()" required/>
         <p id="ualert"></p>
         <input type="submit"  value="SUBMIT" id="submit"/>
       </form>
    </div>
    <script src="JS/profile.js?v=<?php echo time(); ?>"></script>
  </body>
</html>

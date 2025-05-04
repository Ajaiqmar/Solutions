<?php
  if(count($_GET)==0)
  {
    echo "<script>location.href='index.html'</script>";
  }
  $key=$_GET['key'];

  $c=0;
  $ocgpa=0;

  $conn = new mysqli("localhost","root","","assembly");
  $sql = "SELECT * FROM users WHERE mail_id='$key';";
  $result = mysqli_query($conn,$sql);

  if(!$result)
  {
    echo "error!";
  }
  else if(mysqli_num_rows($result))
  {
    $row = mysqli_fetch_assoc($result);

    $s1=$row['s1'];
    $s2=$row['s2'];
    $s3=$row['s3'];
    $s4=$row['s4'];
    $s5=$row['s5'];
    $s6=$row['s6'];
    $s7=$row['s7'];
    $s8=$row['s8'];

    $ocgpa=$row['o_cgpa'];

    if($s1==0)
    {
      $c+=1;
    }
    if($s2==0)
    {
      $c+=1;
    }
    if($s3==0)
    {
      $c+=1;
    }
    if($s4==0)
    {
      $c+=1;
    }
    if($s5==0)
    {
      $c+=1;
    }
    if($s6==0)
    {
      $c+=1;
    }
    if($s7==0)
    {
      $c+=1;
    }
    if($s8==0)
    {
      $c+=1;
    }
  }

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
  <link rel="stylesheet" href="CSS/cgpa_analysis.css?v=<?php echo time(); ?>" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/bc64afda90.js" crossorigin="anonymous"></script>
</head>

<body>
  <input type="tel" value="<?php echo $ocgpa; ?>" id="ocgpa" class="sem"/>
  <input type="tel" value="<?php echo $c; ?>" id="c" class="sem"/>

  <div id="blur">
    <table id="header">
      <tr>
        <td class="data"><img src="IMG/th.jfif" alt="logo" /></td>
        <td class="data">
          <h1 onclick="">ASSEMBLY</h1>
        </td>
        <td id="nav" class="data">
          <nav>
            <h2><a class="not" href="discussion.php?key=<?php echo $key; ?>" >DISCUSSION</a></h2>
            <h2><a id="current" href="cgpa.php?key=<?php echo $key; ?>">CGPA</a></h2>
            <h2><a class="not" href="profile.php?key=<?php echo $key; ?>">PROFILE</a></h2>
            <h2><a class="not" href="about.php?key=<?php echo $key; ?>">ABOUT</a></h2>
          </nav>
        </td>
      </tr>
    </table>
    <div id="predictor">
      <form method="POST">
        <h3>WHAT WOULD YOU WISH TO BE YOUR COURSE END CUMMULATIVE GRADE<br />POINT AVERAGE (CGPA)?</h3>
        <div class="input">
          <input type="tel" id="cgpa" name="cgpa" required onclick="clearp()"/>
        </div>
        <p id="ualert"></p>
        <div class="input" >
          <h4 id="submit" onclick="edit()">ANALYSE</h4>
        </div>
        <input type="submit" id="sub" />
      </form>
    </div>
  </div>
  <center>
  <div id="analysis">
    <h5 id="h">TRY TO ATTAIN THE FOLLOWING GPA OR ABOVE FOR THE REMAINING<br />SEMESTER TO MEET YOUR WISH.</h5>
    <p id="malert"></p>
    <p id="salert"></p>
  </div>
  </center>
  <script src="JS/cgpa_analysis.js?v=<?php echo time(); ?>"></script>
</body>

</html>

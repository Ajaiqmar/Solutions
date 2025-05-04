<?php
  if(count($_GET)==0)
  {
    echo "<script>location.href='index.html'</script>";
  }
  $key = $_GET['key'];
  $conn = new mysqli("localhost","root","","assembly");

  $sql1 = "SELECT * FROM users WHERE mail_id='$key';";
  $result1 = mysqli_query($conn,$sql1);

  $row = mysqli_fetch_assoc($result1);
  $ocgpa = $row['o_cgpa'];
  $cs1=0;
  $cs2=0;
  $cs3=0;
  $cs4=0;
  $cs5=0;
  $cs6=0;
  $cs7=0;
  $cs8=0;
  $s1=0;
  $s2=0;
  $s3=0;
  $s4=0;
  $s5=0;
  $s6=0;
  $s7=0;
  $s8=0;
  $f1=0;
  $f2=0;
  $f3=0;
  $f4=0;
  $f5=0;
  $f6=0;
  $f7=0;
  $f8=0;
  if($row['s1']==0)
  {
    $cs1='-';
    $s1="urom";
  }
  else {
    $f1=1;
    $cs1=$row['s1'];
    $s1="rom";
  }
  if($row['s2']==0)
  {
    $cs2='-';
    $s2="urom";
  }
  else {
    $f2=1;
    $cs2=$row['s2'];
    $s2="rom";
  }
  if($row['s3']==0)
  {
    $cs3='-';
    $s3="urom";
  }
  else {
    $f3=1;
    $cs3=$row['s3'];
    $s3="rom";
  }
  if($row['s4']==0)
  {
    $cs4='-';
    $s4="urom";
  }
  else {
    $f4=1;
    $cs4=$row['s4'];
    $s4="rom";
  }
  if($row['s5']==0)
  {
    $cs5='-';
    $s5="urom";
  }
  else {
    $f5=1;
    $cs5=$row['s5'];
    $s5="rom";
  }
  if($row['s6']==0)
  {
    $cs6='-';
    $s6="urom";
  }
  else {
    $f6=1;
    $cs6=$row['s6'];
    $s6="rom";
  }
  if($row['s7']==0)
  {
    $cs7='-';
    $s7="urom";
  }
  else {
    $f7=1;
    $cs7=$row['s7'];
    $s7="rom";
  }
  if($row['s8']==0)
  {
    $cs8='-';
    $s8="urom";
  }
  else {
    $f8=1;
    $cs8=$row['s8'];
    $s8="rom";
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
    <link rel="stylesheet" href="CSS/cgpa.css?v=<?php echo time(); ?>" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
  </head>
  <body>
    <table id="header">
      <tr>
        <td class="hval"><img src="IMG/th.jfif" alt="logo" /></td>
        <td class="hval"><h1 onclick="">ASSEMBLY</h1></td>
        <td id="nav" class="hval">
          <nav>
            <h2><a class="not" href="discussion.php?key=<?php echo $key; ?>" >DISCUSSION</a></h2>
            <h2><a id="current" href="cgpa.php?key=<?php echo $key; ?>">CGPA</a></h2>
            <h2><a class="not" href="profile.php?key=<?php echo $key; ?>">PROFILE</a></h2>
            <h2><a class="not" href="about.php?key=<?php echo $key; ?>">ABOUT</a></h2>
          </nav>
        </td>
      </tr>
    </table>
    <table id="tab1">
      <tr>
        <td class="dat1">
          <table id="tab2">
            <tr>
              <td id="dat2">
                <div id="val">
                  <div id="grade">
                    <h3 id="cgpa"><?php echo $ocgpa; ?></h3>
                    <h4>OVERALL</h4>
                  </div>
                  <p id="predictor">
                    WANT A BETTER CGPA RECORD?<br />TRY<br />
                    <a id="predict" href="cgpa_analysis.php?key=<?php echo $key; ?>">PREDICTOR</a>
                  </p>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div id="sem">
                  <h3 id="head">SEMESTER-WISE DATA<br />COLLECTION</h3>
                  <p id="num">
                    <a class="<?php echo $s1; ?>" href="cgpa_list.php?key=<?php echo $key; ?>&t=s1&f=<?php echo $f1; ?>">I</a>
                    <a class="<?php echo $s2; ?>" href="cgpa_list.php?key=<?php echo $key; ?>&t=s2&f=<?php echo $f2; ?>">II</a>
                    <a class="<?php echo $s3; ?>" href="cgpa_list.php?key=<?php echo $key; ?>&t=s3&f=<?php echo $f3; ?>">III</a>
                    <a class="<?php echo $s4; ?>" href="cgpa_list.php?key=<?php echo $key; ?>&t=s4&f=<?php echo $f4; ?>">IV</a><br />
                    <a class="<?php echo $s5; ?>" href="cgpa_list.php?key=<?php echo $key; ?>&t=s5&f=<?php echo $f5; ?>">V</a>
                    <a class="<?php echo $s6; ?>" href="cgpa_list.php?key=<?php echo $key; ?>&t=s6&f=<?php echo $f6; ?>">VI</a>
                    <a class="<?php echo $s7; ?>" href="cgpa_list.php?key=<?php echo $key; ?>&t=s7&f=<?php echo $f7; ?>">VII</a><br />
                    <a class="<?php echo $s8; ?>" href="cgpa_list.php?key=<?php echo $key; ?>&t=s8&f=<?php echo $f8; ?>">VIII</a>
                  </p>
                </div>
              </td>
            </tr>
          </table>
        </td>
        <td class="dat1">
          <div id="gpa">
            <h3 id="head">SEMESTER-WISE CGPA<br />RECORD</h3>
            <table id="gp">
              <thead>
                <td class="va">SEMESTER</td>
                <td class="va">CGPA</td>
              </thead>
              <tr>
                <td clas="va">I</td>
                <td class="va"><?php echo $cs1; ?></td>
              </tr>
              <tr>
                <td class="va">II</td>
                <td class="va"><?php echo $cs2; ?></td>
              </tr>
              <tr>
                <td class="va">III</td>
                <td class="va"><?php echo $cs3; ?></td>
              </tr>
              <tr>
                <td class="va">IV</td>
                <td class="va"><?php echo $cs4; ?></td>
              </tr>
              <tr>
                <td class="va">V</td>
                <td class="va"><?php echo $cs5; ?></td>
              </tr>
              <tr>
                <td class="va">VI</td>
                <td class="va"><?php echo $cs6; ?></td>
              </tr>
              <tr>
                <td class="va">VII</td>
                <td class="va"><?php echo $cs7; ?></td>
              </tr>
              <tr>
                <td class="va">VIII</td>
                <td class="va"><?php echo $cs8; ?></td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
    </table>
  </body>
</html>

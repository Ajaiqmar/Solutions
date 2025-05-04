<?php
  if(count($_GET)==0)
  {
    echo "<script>location.href='index.html'</script>";
  }
  $key = $_GET['key'];
  $t = $_GET['t'];
  $f = $_GET['f'];
  $c = 0;
  $conn = new mysqli("localhost","root","","assembly");

  $sql = "SELECT * FROM `$t` WHERE mail_id='$key';";
  $result = mysqli_query($conn,$sql);

  $sql6 = "SELECT * FROM users WHERE mail_id='$key';";
  $result6 = mysqli_query($conn,$sql6);

  $row6 = mysqli_fetch_assoc($result6);
  $gpa1 = $row6[$t];

  if(mysqli_num_rows($result))
  {
    $c=1;
  }
  $a=0;
  $b=0;
  if(count($_POST))
  {
    if($_POST['gpa']==0)
    {
      $sc = $_POST['sc'];
      $credit = $_POST['credit'];
      $mark = $_POST['mark'];

      $sql1 = "SELECT * FROM `$t` WHERE mail_id='$key' AND sc='$sc';";
      $result1 = mysqli_query($conn,$sql1);
      if($mark>100)
      {
        $a=1;
      }
      else if(mysqli_num_rows($result1))
      {
        $b=1;
      }
      else {
        $sql2 = "INSERT INTO `$t` VALUES('$key','$sc','$credit','$mark');";
        $result2 = mysqli_query($conn,$sql2);

        if(!$result2)
        {
          echo "error!";
        }
        else {
          echo "<script> location.href='cgpa_list.php?key=$key&t=$t&f=$f'</script>";
        }
      }
    }
    else if($_POST['gpa']==2)
    {
      $sc = $_POST['sc'];

      $sql1 = "DELETE FROM `$t` WHERE sc='$sc' AND mail_id='$key';";
      $result1 = mysqli_query($conn,$sql1);

      if(!$result1)
      {
        echo "error!";
      }
      else
      {
        echo "<script> location.href='cgpa_list.php?key=$key&t=$t&f=$f'</script>";
      }
    }
    else
    {
      $sql2 = "SELECT * FROM `$t` WHERE mail_id='$key'";
      $result2 = mysqli_query($conn,$sql2);

      if(!$result2)
      {
        echo "error!";
      }
      else
      {
        $gpa=0;
        $scr=0;
        while($row = mysqli_fetch_assoc($result2))
        {
          $credit = $row['credit'];
          $mark = $row['mark'];
          $point = 0;
          if($mark<=100 && $mark>=91)
          {
            $point=10;
          }
          else if($mark<=90 && $mark>=81)
          {
            $point=9;
          }
          else if($mark<=80 && $mark>=71)
          {
            $point=8;
          }
          else if($mark<=70 && $mark>=61)
          {
            $point=7;
          }
          else if($mark<=60 && $mark>=50)
          {
            $point=6;
          }
          $gpa += ($credit*$point);
          $scr += $credit;
        }
        $gpa/=$scr;
        $gpa=round($gpa,1);

        if($gpa==0)
        {
          $gpa=-1;
        }

        $sql3 = "UPDATE users SET `$t`='$gpa' WHERE mail_id='$key';";
        $result3 = mysqli_query($conn,$sql3);

        if(!$result3)
        {
          echo "error!";
        }

        $sql4 = "SELECT * FROM users WHERE mail_id='$key';";
        $result4 = mysqli_query($conn,$sql4);

        $row = mysqli_fetch_assoc($result4);
        $ocgpa = 0;
        $co=0;

        if($row['s1']!=0)
        {
          $ocgpa+=$row['s1'];
          $co+=1;
        }
        if($row['s2']!=0)
        {
          $ocgpa+=$row['s2'];
          $co+=1;
        }
        if($row['s3']!=0)
        {
          $ocgpa+=$row['s3'];
          $co+=1;
        }
        if($row['s4']!=0)
        {
          $ocgpa+=$row['s4'];
          $co+=1;
        }
        if($row['s5']!=0)
        {
          $ocgpa+=$row['s5'];
          $co+=1;
        }
        if($row['s6']!=0)
        {
          $ocgpa+=$row['s6'];
          $co+=1;
        }
        if($row['s7']!=0)
        {
          $ocgpa+=$row['s7'];
          $co+=1;
        }
        if($row['s8']!=0)
        {
          $ocgpa+=$row['s8'];
          $co+=1;
        }
        $ocgpa/=$co;

        $ocgpa=round($ocgpa,1);

        $sql5 = "UPDATE users SET o_cgpa='$ocgpa' WHERE mail_id='$key';";
        $result5 = mysqli_query($conn,$sql5);

        if(!$result5)
        {
          echo "error!";
        }
        else
        {
          echo "<script> location.href='cgpa_list.php?key=$key&t=$t&f=1'</script>";
        }
      }
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
    <link rel="stylesheet" href="CSS/cgpa_list.css?v=<?php echo time(); ?>" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bc64afda90.js" crossorigin="anonymous"></script>
  </head>
  <body onload="uvalidation()">
    <input type="tel" value="<?php echo $f; ?>" id="f"/>
    <input type="tel" value="<?php echo $a; ?>" id="a"/>
    <input type="tel" value="<?php echo $b; ?>" id="b"/>
    <input type="tel" value="<?php echo $c; ?>" id="c"/>
    <table id="header">
      <tr>
        <td class="val"><img src="IMG/th.jfif" alt="logo" /></td>
        <td class="val"><h1 onclick="">ASSEMBLY</h1></td>
        <td id="nav" class="val">
          <nav>
            <h2><a class="not" href="discussion.php?key=<?php echo $key; ?>" >DISCUSSION</a></h2>
            <h2><a id="current" href="cgpa.php?key=<?php echo $key; ?>">CGPA</a></h2>
            <h2><a class="not" href="profile.php?key=<?php echo $key; ?>">PROFILE</a></h2>
            <h2><a class="not" href="about.php?key=<?php echo $key; ?>">ABOUT</a></h2>
          </nav>
        </td>
      </tr>
    </table>
    <h3 id="h">ADD SEMESTER MARKS</h3>
    <form method="POST">
      <div id="entry">
        <input type="text" id="sc" name="sc" placeholder="SUBJECT CODE" required onclick="clearp()"/>
        <input type="tel" id="credits" name="credit" placeholder="CREDITS" required onclick="clearp()"/>
        <input type="tel" id="marks" name="mark" placeholder="MARKS" required onclick="clearp()"/>
        <p id="ualert"></p>
        <h4 id="submit" onclick="addm()">+</h4>
        <input type="tel" id="gpa" value="0" name="gpa" />
        <input type="submit" id="sub" />
      </div>
      <div id="list">
        <span id="exit" onclick="exit('<?php echo $key; ?>')"><i class="fas fa-arrow-left"></i></span>
        <h3 id="he">SEMESTER MARKS</h3>
        <table id="scm">
          <tr id="head">
            <td class="dat">SUBJECT CODE</td>
            <td class="dat">CREDITS</td>
            <td class="dat">MARKS</td>
          </tr>
          <?php
            while($row=mysqli_fetch_assoc($result))
            {
              $sc = $row['sc'];
              $credit = $row['credit'];
              $mark = $row['mark'];

              echo "<tr><td class='dat'>$sc</td><td class='dat'>$credit</td><td class='dat'>$mark<p class='ex' onclick=\"del('$sc')\">X</p></td></tr>";
            }
          ?>
        </table>
        <p id="info">GRADE POINT AVERAGE OF THIS SEMESTER : <?php echo $gpa1; ?></p>
        <h4 id="subm" onclick="addma()">SUBMIT</h4>
        <h4 id="edit" onclick="edit('<?php echo $key; ?>','<?php echo $t; ?>')" >EDIT</h4>
      </div>
    </form>
    <script src="JS/cgpa_list.js?v=<?php echo time(); ?>"></script>
  </body>
</html>

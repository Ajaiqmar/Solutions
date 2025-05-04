<?php
  $x=0;
  if(count($_GET)==0)
  {
    echo "<script>location.href='index.html'</script>";
  }
  if(count($_GET)==2)
  {
    $x=$_GET['q'];
  }
  $key=$_GET['key'];
  if(count($_POST)==1)
  {
    $conn = new mysqli("localhost","root","","assembly");
    $quer = $_POST['query'];

    if(!$conn)
    {
      echo "error";
    }

    $sql1="SELECT * FROM discussion_list WHERE topic='$quer';";
    $result1=mysqli_query($conn,$sql1);

    if(mysqli_num_rows($result1)>0)
    {
      echo "<script> location.href='discussion.php?key=$key&q=1'</script>";
    }
    else {
      $sql2="SELECT * FROM users WHERE mail_id='$key';";
      $result2=mysqli_query($conn,$sql2);

      $row=mysqli_fetch_assoc($result2);
      $user=$row['username'];
      $department=$row['department'];

      $sql3="INSERT INTO discussion_list(topic,username,department) VALUES('$quer','$user','$department');";
      $result3=mysqli_query($conn,$sql3);

      $sql1="SELECT * FROM discussion_list WHERE topic='$quer';";
      $result1=mysqli_query($conn,$sql1);
      $row = mysqli_fetch_assoc($result1);
      $ind = $row['ind'];

      $sql4="CREATE TABLE `$ind`( views VARCHAR(150) NOT NULL, username VARCHAR(30) NOT NULL, department VARCHAR(10) NOT NULL);";
      $result4=mysqli_query($conn,$sql4);

      if(!$result4)
      {
        echo "error!";
      }

      if($result3)
      {
        echo "<script> location.href='discussion.php?key=$key'</script>";
      }
      else {
        echo "error!";
      }
    }
    mysqli_close($conn);
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
    <link rel="stylesheet" href="CSS/discussion.css?v=<?php echo time(); ?>" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
  </head>
  <body onload="uvalidation()">
    <input type="tel" value="<?php echo $x; ?>" id="q" />
    <div id="body">
      <table>
        <tr>
          <td><img src="IMG/th.jfif" alt="logo" /></td>
          <td><h1 onclick="">ASSEMBLY</h1></td>
          <td id="nav">
            <nav>
              <h2><a id="current" href="discussion.php?key=<?php echo $key; ?>">DISCUSSION</a></h2>
              <h2><a class="not" href="cgpa.php?key=<?php echo $key; ?>">CGPA</a></h2>
              <h2><a class="not" href="profile.php?key=<?php echo $key; ?>">PROFILE</a></h2>
              <h2><a class="not" href="about.php?key=<?php echo $key; ?>">ABOUT</a></h2>
            </nav>
          </td>
        </tr>
      </table>
      <span onclick="popup()">+</span>
      <div id="whole">
        <?php
          $conn = new mysqli("localhost","root","","assembly");

          $sql4 = "SELECT * FROM discussion_list;";
          $result4 = mysqli_query($conn,$sql4);

          if(mysqli_num_rows($result4))
          {
            while($row=mysqli_fetch_assoc($result4))
            {
              $topic = $row['topic'];
              $username = $row['username'];
              $department = $row['department'];
              $ind = $row['ind'];
              echo "
                    <div id='list'>
                      <center>
                        <div id='sec' onclick=\"pag('$key','$topic','$ind')\">
                          <h3>
                            $topic
                          </h3>
                          <h6 id='post'>POSTED BY : $username</h6>
                          <h6 id='dep'>DEPARTMENT : $department</h6>
                        </div>
                      </center>
                    </div>";
            }
          }
        ?>
      </div>
  </div>
  <div id="popup">
    <div id="inner">
      <p id="esc" onclick="escape('<?php echo $key; ?>')">X</p>
      <h4>ADD QUERY</h4><h5>(MIN. 100 CHARACTERS)</h5>
      <form method="POST">
        <textarea id="ta" draggable="true" maxlength="100" required name="query" onclick="cleart()" onchange="checkp()"></textarea>
        <p id="alert"></p>
        <input type="submit" value="SUBMIT" id="submit" required/>
      </form>
    </div>
  </div>
  <script src="JS/discussion.js?v=<?php echo time(); ?>"></script>
  </body>
</html>

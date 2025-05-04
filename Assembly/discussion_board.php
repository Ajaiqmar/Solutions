<?php
  if(count($_GET)==0)
  {
    echo "<script>location.href='index.html'</script>";
  }
  $topic = $_GET['q'];
  $ind = $_GET['i'];
  $key = $_GET['key'];
  $c=0;
  if(count($_POST))
  {
    $view = $_POST['view'];
    $conn = new mysqli("localhost","root","","assembly");

    $sql1 = "SELECT * FROM users WHERE mail_id='$key';";
    $result1 = mysqli_query($conn,$sql1);

    $row = mysqli_fetch_assoc($result1);
    $user = $row['username'];
    $department = $row['department'];

    $sql3 = "SELECT * FROM `$ind` WHERE views='$view' AND username='$user' AND department='$department';";
    $result3 = mysqli_query($conn,$sql3);

    if(mysqli_num_rows($result3))
    {
      echo "<script> location.href='discussion_board.php?key=$key&q=$topic&i=$ind' </script>";
    }
    else
    {
      $sql2 = "INSERT INTO `$ind` VALUES('$view','$user','$department')";
      $result2 = mysqli_query($conn,$sql2);

      if(!$result2)
      {
        echo "error";
      }
    }
  }
  $conn = new mysqli("localhost","root","","assembly");
  $sql4 = "SELECT * FROM `$ind`;";
  $result4 = mysqli_query($conn,$sql4);
  $c=mysqli_num_rows($result4);
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
    <link rel="stylesheet" href="CSS/discussion_board.css?v=<?php echo time(); ?>" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
  </head>
  <body>
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
      <div id="heading">
        <h3 id="head"><?php echo $topic; ?></h3>
        <h3 id="count">VIEWS COUNT : <?php echo $c; ?></h3>
      </div>
      <span onclick="popup()">+</span>
      <div id="whole">
        <?php
          if(mysqli_num_rows($result4)>0)
          {
            while($row=mysqli_fetch_assoc($result4))
            {
              $views=$row['views'];
              $username=$row['username'];
              $department=$row['department'];
              echo "
              <div id='list'>
                <center>
                  <div id='sec'>
                    <h3>
                      $views
                    </h3>
                    <h6 id='post'>POSTED BY : $username</h6>
                    <h6 id='dep'>DEPARTMENT : $department</h6>
                  </div>
                </center>
              </div>
              ";
            }
          }
        ?>
      </div>
  </div>
  <div id="popup">
    <div id="inner">
      <p onclick="escape('<?php echo $key; ?>','<?php echo $topic; ?>','<?php echo $ind; ?>')">X</p>
      <h4>ADD YOUR VIEW</h4><h5>(MIN. 150 CHARACTERS)</h5>
      <form method="POST">
        <textarea id="ta" draggable="true" name="view" maxlength="150" required ></textarea>
        <input type="submit" value="SUBMIT" id="submit"/>
      </form>
    </div>
  </div>
  <script src="JS/discussion_board.js?v=<?php echo time(); ?>"></script>
  </body>
</html>

<?php
  if(count($_GET)==0)
  {
    echo "<script>location.href='index.html'</script>";
  }
  $key=$_GET['key'];
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
    <link rel="stylesheet" href="CSS/about.css?v=<?php echo time(); ?>" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bc64afda90.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <table>
      <tr>
        <td><img src="IMG/th.jfif" alt="logo" /></td>
        <td><h1 onclick="">ASSEMBLY</h1></td>
        <td id="nav">
          <nav>
            <h2><a class="not" href="discussion.php?key=<?php echo $key; ?>" >DISCUSSION</a></h2>
            <h2><a class="not" href="cgpa.php?key=<?php echo $key; ?>">CGPA</a></h2>
            <h2><a class="not" href="profile.php?key=<?php echo $key; ?>">PROFILE</a></h2>
            <h2><a id="current" href="about.php?key=<?php echo $key; ?>">ABOUT</a></h2>
          </nav>
        </td>
      </tr>
    </table>
    <p id="main">
      “ASSEMBLY”  is created for the sole purpose to enhance the inter-college communication.<br />
      It is a place where geeks could show off their work.<br />
      It breaks down the trial and error form of learning with the help of seniors and alumnus guidance.<br />
      It is a place where irrespective of the quality of the questions, the answers are received in abundance.<br />
      <br />
      Everybody can’t know everything, their scope of knowledge is constricted only within<br />
      the knowledge that they are exposed to, so it is only wise to ask for help,<br />
      and i hope “ASSEMBLY” would play a part in it.<br />
    </p>
    <center>
      <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook" id="f"></i></a>
      <a href="https://www.instagram.com/accounts/login/" target="_blank"><i class="fab fa-instagram" id="i"></i></a>
      <a href="https://mobile.twitter.com/login" target="_blank"><i class="fab fa-twitter" id="t"></i></a>
    </center>
    <div>
      <i class="far fa-copyright" id="co"></i> <p id="copy">Copyrights owned by ajaiqmar</p>
    </div>
  </body>
</html>

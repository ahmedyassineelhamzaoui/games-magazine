<?php
session_start();
if(isset($_SESSION["Id"])){
  header('location:dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
  $title='home';
 include '../config/head.php';
  ?>

<body>
<div class="container">
    <header>
        <nav class="nav-home">
        <input type="checkbox" id="home_checkbox">

            <a class="home-logo" href="home.php">Enjoy <span class="home-span-logo"> Game</span></a>
            <ul class="nav-home-ul">
                <li><a class="Sign-in-home" href="Signin.php"></i> Sign in</a></li>
                <img class="home-login-img" src="../pictures/loginundraw.svg" alt="home-login-img">
                <li><a  class="Sign-up-home" href="Signup.php">Sign up</a></li>
                <label id="home-label-close" for="home_checkbox"></label>

            </ul>
            <label id="home-label-checkbox" for="home_checkbox"></label>

        </nav>
    </header>
    <main class="main-home">
      <div class="ractangle-box">
        <div class="text-box">
            <h1 class="title-box">Discover the latest special games in <br> <span class="title-span-box">our store</span></h1>
            <p class="description-box">Play games and tell stories with your favorite PBS KIDS characters like Elmo, Arthur, Clifford, Xavier Riddle, and Pinkalicious!</p>
            <a class="button-box" href="Signup.php">See our product</a>
        </div>
        <div class="picture-box">
            <img class="picture-content-box" src="../pictures/box-picture.jpg" alt="box-picture">
        </div>
      </div>  
    </main>
</div>

</body>
</html>
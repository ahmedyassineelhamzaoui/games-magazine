<?php
session_start();
if(@$_SESSION["authorize"]=="yes"){
   header('location:dashboard.php');
  }
$title="Sign in";
include '../config/head.php';
?>
<?php
  
  include '../config/connexion.php';
  
 @$email=$_POST["email"];
 @$pasword=md5($_POST["pasword"]);
 $erreur="";
 if(isset($_POST["Signinbutton"])){    
   $sql="SELECT * FROM moderator WHERE Email='$email' AND Password='$pasword'";
   $result=mysqli_query($Connexion,$sql);
   $row=mysqli_fetch_assoc($result);//pour afficher le nom 
   $Ncount=mysqli_num_rows($result);
   if(!empty($pasword) && !empty($email)){
   if($Ncount==0){
      $erreur="<li>Wrong! email or password</li>";
   }else{
     $_SESSION["sucess"]="oui";
     $_SESSION["Id"]=$row["Id"];
     header('location:dashboard.php');
   }
   }
}
 ?>
 <body>
    <main class="main-signin">
         <section class="section-signin-style">
             <img  class="picture-signin-ware" src="../pictures/wave.png" alt="ware">
             <a class="home-icon" href="home.php"><i class="fa-solid fa-house"></i> Home</a>
             <div class="section-signin-style-content">
             <h2 class="">New Here ?</h2>
             <p class="">gaming has more and more followers thanks <br> to more andmore immersive gaming experiences.</p>
             <a href="Signup.php"><button class="section-submit" >Sign Up</buton></a>
             </div>
            <img class="picture-signin-undraw" src="../pictures/undraw-signin.svg" alt="undraw">
         </section>
         <section  class="section-signin-content">
             <form action="" method="post" class="content-form" id="signin_form" >
             <img class="signin-avatar" src="../pictures/avatar.png" alt="avatar">
            
             <h1 class="heading-signin">Welcome</h1>
             <div class="erreur-signin">
               <?php echo $erreur ;?>
             </div>
             <br>
             <div class="input-feld" id="input-feld-email">
                <i class="fa-solid fa-envelope"></i>
                <input class="content-input" name="email" id="email" type="email" placeholder="Email">
             </div>
             <p id="signin-email-erreur">please enter a valid emeil*</p>
             <div class="input-feld" id="input-feld-password">
                <i class="fas fa-lock"></i>               
                <input class="content-input" name="pasword" id="password" type="password" placeholder="Password">
             </div>
             <p id="signin-password-erreur">please enter a valid password*</p>
             <button name="Signinbutton" class="section-submit" type="submit">login</button>    
             <div class="section-signin-style-content">
             <h2 class="section-style-title">New Here ?</h2>
             <p class="section-signin-style-descreption">gaming has more and more followers thanks <br> to more andmore immersive gaming experiences.</p>
             <a href="Signup.php"><button class="section-submit" >Sign Up</buton></a>
             </div>
             </form>

        </section>
       
    </main>
    
    <script src="../assets/script.js"></script>
 </body>
 <?php

?>
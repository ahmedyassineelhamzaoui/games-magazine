<?php
session_start();

include '../config/connexion.php';
$title='Sign up';
include '../config/head.php';
  if(isset($_SESSION["Id"])){
   header('location:dashboard.php');
}
?>
<?php


 $erreur="";

if($_SERVER["REQUEST_METHOD"]=="POST"){    
   $username= htmlspecialchars($_POST["username"]);
   $email=  htmlspecialchars($_POST["email"]) ;
   $pasword=  htmlspecialchars(md5($_POST["pasword"]));

   $sql="SELECT * FROM moderator WHERE Username='$username' ";
   $result=mysqli_query($Connexion,$sql);
   $usercount=mysqli_num_rows($result);
   $sql="SELECT * FROM moderator WHERE Email='$email' ";
   $result=mysqli_query($Connexion,$sql);
   $emailcount=mysqli_num_rows($result);
   if(!empty($username) && !empty($email)){
   if($usercount!=0){
      $erreur="<li>oops! Username ALready exists</li>";
   }
   if($emailcount!=0){
      $erreur.="<li>oops! Email Already exists</li>";
   }
   }
   if($usercount==0 && $emailcount==0){
     $request="INSERT INTO moderator VALUES(null,'$username',' $signupSelect','$email','$pasword')";
     mysqli_query($Connexion,$request);  
     header('location:Signin.php');
   }

}

?>
<body>
   <main class="main-signup">
        <section  class="section-signup-content">
             <form action="Signup.php" method="post" class="content-form" id="signup_form">    
                  <img class="signup-avatar" src="../pictures/avatarsignup.png" alt="avatar">
                  <div class="erreur">
                   <?php echo $erreur ?>
                  </div>
                  
                  <p  id="username-message-erreur">please enter a valid username</p> <span id="mail-exist">email exist déja</span>
                  <div class="input-feld" id="username_signup_feld">
                     <i class="fa-solid fa-user"></i>
                     <input class="content-input" name="username" id="username" type="text" placeholder="Username">
                  </div>
                  <div class="input-feld">
                     <i class="fa-solid fa-venus-mars"></i>              
                     <select  class="content-input content-input-select" name="signupSelect" id="signup_select">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                     </select>
                  </div>
                  <p class="erreur-message" class="erreur" id="email-message-erreur">please enter a valid email*</p><span><?php echo @$mailErreur ?></span>
                  <div class="input-feld" id="email_signup_feld">
                     <i class="fa-solid fa-envelope"></i>
                     <input class="content-input" name="email" id="email" type="email" placeholder="Email">
                  </div>
                  <p class="erreur-message" id="password-message-erreur">please enter a valid password*</p>
                  <div class="input-feld" id="password_signup_feld">
                     <i class="fas fa-lock"></i>               
                     <input class="content-input" name="pasword" id="password" type="password" placeholder="Password">
                  </div>
                  <button name="signupbutton" class="section-submit" type="submit">sign up</button>
                  <div class="section-signup-style-content">
                  <h2 class="section-style-title">Already have an account ?</h2>
                  <button class="section-submit" > <a href="Signin.php">Sign In</a></button>
                  </div> 
            </form>  
             
        </section>
        <section class="section-signup-style">
             <img  class="picture-signup-ware" src="../pictures/wave-reverse.png" alt="ware">
             <a class="home-icon" href="home.php"><i class="fa-solid fa-house"></i> Home</a>
             <!-- <img src="img/bg.svg"> -->
             <div class="section-signup-style-content">
             <h2 class="section-style-title">Already have an account ?</h2>
             <a href="Signin.php"><button class="section-submit" type="submit">Sign In</button></a>
             </div>
             <img class="picture-undraw-signup" src="../pictures/consoles.svg" alt="console">
        </section>
    </main>
<script src="../assets/script1.js"></script>
</body>
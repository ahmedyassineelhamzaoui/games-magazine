<?php
include 'config/connexion.php';
if(isset($_POST["save"])){addProduct();}
function addProduct(){
    global $Connexion;
    
    $title=$_POST["title"];
    $type=$_POST["selectproduct"];
    $price=$_POST["price"];
    $amount=$_POST["amount"];
    $description=$_POST["description"];
    
    $filename=$_FILES["image"]["name"];
    $image=$_FILES["image"]["tmp_name"];
    
    
    $sql="INSERT INTO product VALUES(null,'$title','$type','$price','$amount','$filename','$description') ";
    mysqli_query($Connexion,$sql);
    move_uploaded_file($image,'img/'.$filename);
    header('location:dashboard.php');
    
}

   



?>
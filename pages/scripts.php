<?php
session_start();


include '../config/connexion.php';

if(isset($_POST["save"])){ addProduct();}
else if(isset($_POST["update"])){ update();}
else if(isset($_POST["delete"])){  delete();}
else if(isset($_POST["updateprofile"])){ updateprofile();}


else{
  header('location:dashboard.php'); 
}



function updateprofile(){
    global $Connexion;
    $id=$_POST["id"];
    $username=$_POST["username"];
    $email=$_POST["emailprofile"];

        $sql="UPDATE moderator SET Username='$username' , Email='$email' where Id='$id' ";
        mysqli_query($Connexion,$sql);
        header('location:./dashboard.php');
    }
   









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
    move_uploaded_file($image,'../img/'.$filename);
    $_SESSION["addproduct"]="product has been added successfully !";
    header('location:./dashboard.php');
}
function update(){
    global $Connexion;
    $id=$_POST["id"];
    $title=$_POST["title"];
    $type=$_POST["selectproduct"];
    $price=$_POST["price"];
    $amount=$_POST["amount"];
    $description=$_POST["description"];
    $filename=$_FILES["image"]["name"];
    $image=$_FILES["image"]["tmp_name"];
    

        if(empty($filename)){
            $sql="UPDATE product SET Title='$title', Type='$type' , Price='$price' , Amount='$amount' , Description='$description' where Id='$id' ";
            mysqli_query($Connexion,$sql);
            $_SESSION["updateProduct"]="product has been updated successfully !";
            header('location:./dashboard.php');
         }else{

                $sql="UPDATE product SET Title='$title', Type='$type' , Price='$price' , Amount='$amount' , Picture='$filename' , Description='$description' where Id='$id' ";
                mysqli_query($Connexion,$sql);
                move_uploaded_file($image,'../img/'.$filename);
                $_SESSION["updateProduct"]="product has been updated successfully !";
                header('location:./dashboard.php');
            }
    }
    
        
       

function delete(){
    global $Connexion;
    $id=$_POST["id"];
    $sql="DELETE FROM product WHERE Id='$id='";
    mysqli_query($Connexion,$sql);
    $_SESSION["deleteProduct"]="Product has been deleted successfully !";
    header('location:./dashboard.php');

}


?>
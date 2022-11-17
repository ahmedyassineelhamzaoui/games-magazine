<?php
session_start();
include '../config/connexion.php';
if(isset($_POST["save"])){addProduct();}
if(isset($_POST["update"])){update();}
if(isset($_POST["delete"])){ delete();}


if(isset($_POST["updateprofile"])){
    updateprofile();
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
    $verify="SELECT Picture FROM product WHERE Id='$id' ";
    $result=mysqli_query($Connexion,$verify);
    $number=mysqli_num_rows($result);

        if(empty($filename)){
            $sql="UPDATE product SET Title='$title', Type='$type' , Price='$price' , Amount='$amount' , Description='$description' where Id='$id' ";
            mysqli_query($Connexion,$sql);
            move_uploaded_file($image,'../img/'.$filename);
            header('location:./dashboard.php');
         }else{
            if($number!=0){
                
            }else{
                $sql="UPDATE product SET Title='$title', Type='$type' , Price='$price' , Amount='$amount' , Picture='$filename' , Description='$description' where Id='$id' ";
                mysqli_query($Connexion,$sql);
                move_uploaded_file($image,'../img/'.$filename);
                header('location:./dashboard.php');
            }
           
         }
    }
    
        
       

function delete(){
    global $Connexion;
    $id=$_POST["id"];
    $sql="DELETE FROM product WHERE Id='$id='";
    mysqli_query($Connexion,$sql);
    header('location:./dashboard.php');

}







?>
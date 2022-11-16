<?php
include '../config/connexion.php';
if(isset($_POST["save"])){addProduct();}
if(isset($_POST["update"])){update();}
if(isset($_POST["delete"])){ delete();}
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
    $sql="UPDATE product SET Title='$title', Type='$type' , Price='$price' , Amount='$amount' , Picture='$filename' , Description='$description' where Id='$id' ";
    mysqli_query($Connexion,$sql);
    move_uploaded_file($image,'../img/'.$filename);
    header('location:./dashboard.php');
}
function delete(){
    global $Connexion;
    $id=$_POST["id"];
    $sql="DELETE FROM product WHERE Id='$id='";
    mysqli_query($Connexion,$sql);
    header('location:./dashboard.php');

}
   



?>
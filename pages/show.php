<?php
session_start();
if(!isset($_POST["submit"])){
    header('location:dashboard.php');
}
include '../config/connexion.php';
$title = "products";
include '../config/head.php';

?>
<link href="../style/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<body class="bg-light">

    <?php
    $id = $_GET["id"];
    $sql = "SELECT * FROM product where Id='$id'";
    $result = mysqli_query($Connexion, $sql);
    $_SESSION["Erreur"]="";
    while ($ligne = mysqli_fetch_assoc($result)){
    ?>
        <div class="row d-flex row align-items-center justify-content-center mx-2" style="min-height: 100vh">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xsm">
                <form id="edit-form" action="./scripts.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $ligne["Id"]; ?>">
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="product-title" value="<?= $ligne["Title"]; ?>">
                    </div>
                    <p class="d-none text-danger"  id="erreeur-title">please fill this fild*</p>
                    <div class="form-group">
                        <label class="form-label">Type</label>
                        <select name="selectproduct" class="form-control" id="product-type">
                            <option value="">Please select</option>
                            <option value="1" <?php echo $ligne["Type"] == 1 ? 'selected' : '' ?>>Jeux vidéo</option>
                            <option value="2" <?php echo $ligne["Type"] == 2 ? 'selected' : '' ?>>Pc gamer</option>
                            <option value="3" <?php echo $ligne["Type"] == 3 ? 'selected' : '' ?>>Materiel Gaming </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Picture</label>
                        <div>
                            <!-- <input name="oldimage" type="hidden" > -->
                            <img  style="width:100px;height:100px;" <?= 'src=../img/' . $ligne['Picture'] . '' ?> alt="photo">
                        </div>
                        <input name="image" type="file" accept=".jpg, .png" class="form-control" id="product-file"  >
                    </div>
                    <div class="form-group">
                        <label class="form-label">Price</label>
                        <input name="price" type="number" min="0" class="form-control" id="product-price" value="<?= $ligne["Price"]; ?>">
                    </div>
                    <p class="d-none text-danger"  id="erreeur-price">please fill this fild*</p>
                    <div class="form-group">
                        <label class="form-label">Amount</label>
                        <input name="amount" type="number" min="0" class="form-control" id="product-amount" value="<?= $ligne["Amount"]; ?>">
                    </div>
                    <p class="d-none text-danger"  id="erreeur-amount">please fill this fild*</p>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea style="resize:none" name="description" class="form-control" rows="5" id="product-description"><?= $ligne["Description"]; ?></textarea>
                    </div>
                    <p  class="d-none text-danger" id="erreeur-descreption">please fill this fild*</p>
                    <!-- <div class="mt-4 form-group d-flex  flex-row-reverse"> -->
                    <div class="mt-4 form-group d-flex justify-content-end">
                        <input id="update-form" name="update" type="submit" class="me-1 btn btn-warning" value="update">
                        <input id="delete-form" name="delete" type="submit" class="me-1 btn btn-danger" value="delete">
                        <a href="dashboard.php" class="me-1 btn btn-dark">Retour</a>
                    </div>
                </form>

            <?php  }    ?>

              <script>
                     let updateForm=document.querySelector("#update-form");

                     let erreurtitleForm=document.querySelector("#erreeur-title");
                     let erreurdescriptionForm=document.querySelector("#erreeur-descreption");

                     let productTitle=document.querySelector("#product-title");
                     let productDescription=document.querySelector("#product-description");

                     let titleRegex=/^[a-zA-Z\s]{6,40}$/
                     let description=/^[a-zA-Z\s]{5,300}$/

                            updateForm.addEventListener('click',(e)=>{
                            if(!titleRegex.test(productTitle.value) || productTitle.value.trim().length ===0){
                                productTitle.style.border="2px solid red"
                                erreurtitleForm.classList.remove("d-none")
                                e.preventDefault()
                            } 
                            if(!description.test(productDescription.value || productTitle.value.trim().length ===0)){
                                productDescription.style.border="2px solid red"
                                erreurdescriptionForm.classList.remove("d-none")
                                e.preventDefault()
                            } 
                        })
                                productTitle.onclick=()=>{
                                    productTitle.style.border="none"
                                    erreurtitleForm.classList.add("d-none")
                                }
                                productDescription.onclick=()=>{
                                    productDescription.style.border="none"
                                    erreurdescriptionForm.classList.add("d-none")

                                }

              </script>
</body>
 
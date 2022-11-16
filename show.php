<?php
include 'connexion.php';
$title = "products";
include 'head.php';

?>
<link href="bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<body class="bg-light">

     <?php
       @$id=$_POST["Id"];
       $sql = "SELECT * FROM product where Id='$id'";
       $result = mysqli_query($Connexion, $sql);
       while ($ligne = mysqli_fetch_assoc($result)) {     
        
     ?>
    <div class="row d-flex row align-items-center justify-content-center mx-2" style="min-height: 100vh">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xsm">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $ligne["Id"];?>">
                <div class="form-group">
                    <label class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="product-title" value="<?= $ligne["Title"];?>">
                </div>
                <div class="form-group">
                    <label class="form-label">Type</label>
                    <select name="selectproduct" class="form-control" id="product-type" >
                                <option value="">Please select</option>
                                <option value="1" <?php echo $ligne["Type"] == 1 ? 'selected': ''?>>Jeux vidéo</option>
                                <option value="2" <?php echo $ligne["Type"] == 2 ? 'selected': ''?>>Pc gamer</option>
                                <option value="3" <?php echo $ligne["Type"] == 3 ? 'selected': ''?>>aMateriel Gaming </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Picture</label>
                    <div>
                        <img style="width:100px;height:100px;" <?= 'src=img/'.$ligne['Picture'].''?> alt="photo">
                    </div>
                    <input name="image" type="file" accept=".jpg, .png" class="form-control" id="product-file" >
                </div>
                <div class="form-group">
                    <label class="form-label">Price</label>
                    <input name="price" type="number" min="1" class="form-control" id="product-price" value="<?= $ligne["Price"];?>">
                </div>
                <div class="form-group">
                    <label class="form-label">Amount</label>
                    <input name="amount" type="number" min="1" class="form-control" id="product-amount" value="<?= $ligne["Amount"];?>">
                </div>
                <div class="form-group">
                     <label class="form-label">Description</label>
                     <textarea style="resize:none" name="description" class="form-control" rows="5" id="product-description" ><?= $ligne["Description"];?></textarea> 
                </div>
                <!-- <div class="mt-4 form-group d-flex  flex-row-reverse"> -->
                <div class="mt-4 form-group d-flex justify-content-end">
                    <input name="update" type="submit" class="me-1 btn btn-warning" value="Modifier">
                    <input name="delete" type="submit" class="me-1 btn btn-danger" value="Modifier">
                    <a href="dashboard.php" class="me-1 btn btn-dark">Retour</a>
                </div>
            </form>

        <?php  } ?>


</body>
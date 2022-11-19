<?php
session_start();
include '../config/connexion.php';
$title = "Dashboard";
include '../config/head.php';
if ($_SESSION["sucess"] != "oui") {
    header('location:Signin.php');
} else {
    $Querynumbreproduct = "SELECT * From product";
    $result = mysqli_query($Connexion, $Querynumbreproduct);
    $num = mysqli_num_rows($result);
    $resultAmount = mysqli_query($Connexion, 'SELECT SUM(Amount) AS sumvalue FROM product');
    $row = mysqli_fetch_assoc($resultAmount);
    $amountSum = $row['sumvalue'];

    $resultPrice = mysqli_query($Connexion, 'SELECT SUM(Price) AS sumvalue FROM product');
    $row1 = mysqli_fetch_assoc($resultPrice);
    $pricesum =  $row1['sumvalue'];

?>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <body class="dashboard">

        <main class="main-dashboard">
            <aside id='aside-bar' class="sidebar-dashboard">
                <div class="dashboard-logo">
                    <i id="double-left" class="fa fa-angle-double-left"></i>
                    <i id="double-right" class="fa fa-angle-double-right"></i>
                    <div class="user-dashboard border-top-2  d-flex flex-column text-align-center">
                        <img class="w-100 rounded-circle" src="../pictures/userman.jpg" alt="manuser">
                        <p class="my-2  text-light"><?= $_SESSION["Username"]; ?></p>
                    </div>
                </div>
                <div class="dashboard-list d-flex">

                    <a data-bs-toggle="modal" href="#modal-form" class="mt-2  btn btn-light d-flex align-items-center" href="">
                        <i class="mx-3 fa-solid fa-square-plus"></i>
                        <span class="span">Add product</span>
                    </a>
                    <a class="mt-2 btn btn-light d-flex align-items-center">
                        <i class="mx-3 fa-solid fa-basket-shopping"></i>
                        <span class="span">All products</span>
                    </a>
                    <a href="dashboard.php"  class="mt-2 btn btn-light d-flex align-items-center" href="">
                        <i class="mx-3 fa-solid fa-cart-shopping"></i>
                        <span class="span">Analytics</span>
                    </a>

                    <a data-bs-toggle="modal" href="#modal-profile" class="mt-2 btn btn-light d-flex align-items-center" href="">
                        <i class="mx-3 fa-solid fa-gear"></i>
                        <span class="span">Settings</span>
                    </a>

                </div>
                <div class="mx-3 dashboard-logout d-flex">
                    <a class="btn-light d-flex align-items-center" href="">
                        <i class="mx-3 fa-solid fa-right-from-bracket"></i>
                        <span class="span">Log out</span>
                    </a>
                </div>
            </aside>
            <section id="section-dashboards" class="section-dashboard">
                <header class="dashboard-header d-flex justify-content-between align-items-center">
                    <div class="paragraph-dashboard">
                        <p class="fs-4">Dashboard</p>
                    </div>
                    <div class="mx-2 d-flex">
                        <p class="me-1" style="hieght:40px;line-height:40px"><?= $_SESSION["Username"]; ?></p>
                        <img class="userimage rounded-circle" src="../pictures/userman.jpg" alt="manuser">
                    </div>
                    <div class="dashboard-menu">
                        <i class="fa-sharp fa-solid fa-bars"></i>
                    </div>
                </header>
                <div class="addproduct ms-auto me-2">
                    <a data-bs-toggle="modal" href="#modal-form" class="mt-2  btn btn-light d-flex align-items-center" href="">
                        <i class="mx-3 fa-solid fa-square-plus"></i>
                        <span class="span">Add product</span>
                    </a>
                </div>
                <div class="row mx-1 mt-2">
                    <div class="mt-2 col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body d-flex justify-content-evenly align-items-center">
                                <div>
                                    <h5 class="card-title">All Product</h5>
                                    <p class="card-text"><?= $num; ?></p>
                                </div>
                                <div>
                                    <i class="fs-3 fa-solid fa-bag-shopping"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body d-flex justify-content-evenly align-items-center">
                                <div>
                                    <h5 class="card-title">Amount</h5>
                                    <p class="card-text"><?= $amountSum ?></p>
                                </div>
                                <div>
                                    <i class="fs-3  fa-solid fa-cart-shopping"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body d-flex justify-content-evenly align-items-center">
                                <div>
                                    <h5 class="card-title">Prices</h5>
                                    <p class="card-text"><?= $pricesum ?></p>
                                </div>
                                <div>
                                    <i class="fs-3 fa-solid fa-money-check-dollar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body d-flex justify-content-evenly align-items-center">
                                <div>
                                    <h5 class="card-title">Best product</h5>
                                    <p class="card-text">number</p>
                                </div>
                                <div>
                                    <i class="fs-3 fa-sharp fa-solid fa-circle-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="width:400px" class="ms-2 mt-4">
                    <form method="post" action="dashboard.php" class="d-flex" role="search">
                    <input id="input-search" class="form-control me-2" name="product-search" type="search" placeholder="name of product" aria-label="Search">
                    <button id="submit-search" class="btn btn-outline-primary" name="search" type="submit">Search</button>
                    </form>
                </div>
                <?php
                $sqll = "SELECT * from product";
                $result = mysqli_query($Connexion, $sqll);
                $num = mysqli_num_rows($result);
                $numberproductbypage = 4;
                $totalpages = ceil($num / $numberproductbypage);
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                } else {
                    $page = 1;
                }
                $startlimit = ($page - 1) * $numberproductbypage;
                $sql = "SELECT * FROM product INNER JOIN typeproduct ON product.Type=typeproduct.idp LIMIT $startlimit,$numberproductbypage ";
                $result = mysqli_query($Connexion, $sql);
                @$productName=$_POST["product-search"];
                $message;
                if(isset($_POST['search'])){
                   
                            $sql="SELECT * FROM product INNER JOIN typeproduct ON product.Type=typeproduct.idp  WHERE Title='$productName' LIMIT $startlimit,$numberproductbypage ";
                            $result =mysqli_query($Connexion,$sql);
                            $numberProduct=mysqli_num_rows($result);
                            if($numberProduct==0){
                                ?>
                                <div class="mx-2 alert alert-warning alert-dismissible" role="alert">
                                  this product dosn't exist!
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                            }
                }
                if(isset($_SESSION["addproduct"])){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <Strong>Success!</Strong>
                        <?php 
						echo $_SESSION['addproduct']; 
                        unset($_SESSION['addproduct']);
					     ?>  
                         <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                 <?php   
                }
                if(isset($_SESSION["updateProduct"])){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <Strong>Success</Strong>
                        <?php
                        echo $_SESSION["updateProduct"];
                        unset($_SESSION["updateProduct"]);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php
                }
                if(isset($_SESSION["deleteProduct"])){
                    ?>
                    <div class="mx-2 alert alert-success alert-dismissible fade show">
                    <Strong>Success</Strong>
                        <?php
                        echo $_SESSION["deleteProduct"];
                        unset($_SESSION["deleteProduct"]);
                        ?>
                        <button type="button" class="btn-close" dada-bs-dismiss="alert"></button>
                    </div>
                    <?php
                }
                ?>
                <div class="table-responsive mx-2 mt-5 d-flex justify-content-center ">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Price</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Description</th>
                                <th scope="col">more</th>
                                <th scope="col">status</th>
                            </tr>
                        </thead>
                        <tbody class="table-light ">
                            <?php

                            while ($ligne = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <th class="text-center" scope="row"><?php echo $ligne["Title"] ?></th>
                                    <td><?php echo $ligne["namep"] ?></td>
                                    <td><?php echo '<img src="../img/' . $ligne["Picture"] . '" style="width:100px;height:70px;">' ?></td>
                                    <td><?php echo $ligne["Price"].'$' ?></td>
                                    <td><?php echo $ligne["Amount"] ?></td>
                                    <td><?php echo $ligne["Description"] ?></td>
                                    <form action="./show.php?id=<?php echo $ligne["Id"]; ?>" method="post">
                                        <input type="hidden" name="Id" value="<?php echo $ligne['Id'] ?>">
                                        <td><input type="submit" class="btn btn-primary" value="more"></td>
                                    </form>
                                    <td><?php if ($ligne["Amount"] > 0) echo '<input type="button" class="btn btn-success" value="in stock">';
                                        else {
                                            echo '<input type="button" class="btn btn-danger" value="unavailable">';
                                        } ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- pagination -->
                <div class=" mb-3 d-flex justify-content-end">
                <?php
                
                for ($btn = 1; $btn <= $totalpages; $btn++) {
                ?>  
                    <a href="dashboard.php?page=<?= $btn ?>" class="mx-1 btn btn-primary text-light text-decoration-none"><?= $btn ?> </a></button>
                <?php
                }
                // si le variable page exist return the numbre of page else return the default 1
                ?>
                </div>
            </section>

        </main>




        <div class="modal" tabindex="-1" id="modal-form">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="./scripts.php" method="POST" id="form-product" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Product</h5>
                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input name="title" type="text" class="form-control" id="product-title" />
                            </div>
                            <p id="erreur-title">please select a valid title*</p>
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <select name="selectproduct" class="form-control" id="product-type">
                                    <option value="1">Jeux vidéo</option>
                                    <option value="2">Pc gamer</option>
                                    <option value="3">Materiel Gaming </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Picture</label>
                                <input name="image" type="file" accept=".jpg, .png" class="form-control" id="product-file">
                            </div>
                            <p id="erreur-picture">please select a valid image*</p>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input name="price" type="number" min="0" class="form-control" id="product-price">
                            </div>
                            <p id="erreur-price">please select a valid Price*</p>
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <input name="amount" type="number" min="0" class="form-control" id="product-amount">
                            </div>
                            <p id="erreur-amount">please select a valid Amount*</p>
                            <div class="mb-0">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="5" id="product-description"></textarea>
                            </div>
                            <p id="erreur-description">please select a valid Description*</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" name="save" class="btn btn-primary task-action-btn">save</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>









       <!-- setting form -->
        <?php
        $user=$_SESSION["Username"];
        $sql="SELECT * FROM moderator WHERE Username='$user' ";
        $result=mysqli_query($Connexion,$sql);
        while($ligne=mysqli_fetch_assoc($result)):
            
        ?>
        <div class="modal" tabindex="-1" id="modal-profile">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="./scripts.php" method="POST" id="form-profil" >
                        <div class="modal-header">
                            <h5 class="modal-title">edit Profile</h5>
                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                        </div>
                        <input type="hidden" name="id" value="<?= $ligne["Id"] ?>">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input name="username" type="text" class="form-control" id="profile-username" value="<?= $ligne["Username"];?>">
                            </div>
                            <p class="d-none text-danger" id="erreur-username" >please select a valid username*</p>
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <select name="selectprofile" class="form-control" id="profile-type">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input name="emailprofile" type="email"  class="form-control" id="profile-email" value="<?= $ligne["Email"];?>">
                            </div>
                            <p class="d-none text-danger" id="erreur-email">please chose a valid email*</p>
                            <div class="mb-3">
                                <label class="form-label">password</label>
                                <input disabled  name="passwordprofile" type="password"  class="form-control" id="profile-password" value="<?= $ligne["Password"];?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" name="updateprofile" class="btn btn-warning ">Update</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endwhile; ?>


        <script src="../assets/dashboard.js"></script>
        <script src="../assets/scriptadd.js"></script>
        <script src="../assets/profile.js"></script>

    </body>

    </html>
<?php } ?>
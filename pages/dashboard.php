<?php
session_start();
include '../config/connexion.php';
$title = "Dashboard";
include '../config/head.php';
if ($_SESSION["sucess"] != "oui") {
    header('location:Signin.php');
} 
    $result = mysqli_query($Connexion, "SELECT * From product");
    $num = mysqli_num_rows($result);
    
    $queryAmount = mysqli_query($Connexion, 'SELECT SUM(Amount) AS sumvalue FROM product');
    $row = mysqli_fetch_assoc($queryAmount);
    $amountSum = $row['sumvalue'];
    
    $queryPrice = mysqli_query($Connexion, 'SELECT SUM(Price) AS sumvalue FROM product');
    $row1 = mysqli_fetch_assoc($queryPrice);
    $pricesum =  $row1['sumvalue'];

    $ids=$_SESSION["Id"];
    $connectClient=mysqli_query($Connexion,"SELECT * From moderator WHERE Id='$ids' ");
    $rowss=mysqli_fetch_assoc($connectClient);
    
    $instockQuery=mysqli_query($Connexion,'SELECT * FROM product WHERE Amount > 0 ');
    $instockCard = mysqli_num_rows($instockQuery);
    
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
                        <p class="my-2  text-light"><?= $rowss["Username"];  ?></p>
                    </div>
                </div>
                <div class="d-flex align-content-between flex-wrap contn">
                <div class="dashboard-list d-flex mb-5 w-100">
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

                    <a data-bs-toggle="modal" data-bs-target="#modal-profile" class="mt-2 btn btn-light d-flex align-items-center" href="">
                        <i class="mx-3 fa-solid fa-gear"></i>
                        <span class="span">Settings</span>
                    </a>

                </div>
                <div class="mx-3 mt-5 d-flex">
                    <form action="./d??conexion.php" method="post">
                    <a name="logout" type="submit" class="btn-light d-flex align-items-center" href="d??conexion.php">
                        <i class="mx-3 fa-solid fa-right-from-bracket"></i>
                        <span class="span">Log out</span>
                    </a>
                    </form>
                </div>
                </div> 
            </aside>
            <section id="section-dashboards" class="section-dashboard">
                <header class="me-2 ms-3 dashboard-header d-flex justify-content-between align-items-center">
                    <div class="paragraph-dashboard">
                        <p class="fs-4">Dashboard</p>
                    </div>
                    <div class="mx-2 d-flex dashboard-client">
                        <p class="me-1" style="hieght:40px;line-height:40px"><?= $rowss["Username"];?></p>
                        <img class="userimage rounded-circle" src="../pictures/userman.jpg" alt="manuser">
                    </div>
                    <div class="dashboard-menu">
                        <i class="fa-sharp fa-solid fa-bars"></i>
                    </div>
                </header>
                <div class="addproduct ms-auto me-3">
                    <a data-bs-toggle="modal" href="#modal-form" class="mt-2  btn btn-light asspro d-flex align-items-center" href="">
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
                                    <h5 class="card-title">In stock</h5>
                                    <p class="card-text"><?= $instockCard ?></p>
                                </div>
                                <div>
                                    <i class="fs-3 fa-sharp fa-solid fa-circle-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="width:80vw" class="d-flex m-3 mt-4">
                    <form style="width:400px" method="post" action="dashboard.php" class="d-flex " role="search">
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


                // $message;
                if(isset($_POST['search'])){
                    $productName=$_POST["product-search"];

                            $sql="SELECT * FROM product INNER JOIN typeproduct ON product.Type=typeproduct.idp  WHERE Title='$productName' ";
                            $result =mysqli_query($Connexion,$sql);
                            $numberProduct=mysqli_num_rows($result);
                            if($numberProduct==0){
                                ?>
                                <div class="mx-3 alert alert-warning alert-dismissible" role="alert">
                                  this product dosn't exist!
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                            }
                }
                if(isset($_SESSION["addproduct"])){
                    ?>
                    <div class="mx-3 alert alert-success alert-dismissible fade show">
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
                    <div class="mx-3 alert alert-success alert-dismissible fade show">
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
                    <div class="mx-3 alert alert-success alert-dismissible fade show">
                    <Strong>Success</Strong>
                        <?php
                        echo $_SESSION["deleteProduct"];
                        unset($_SESSION["deleteProduct"]);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php
                }
                ?>
                <div  class="table-responsive mx-3 mt-2 ">
                    <table style="overflow-x:auto;" class="table">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" scope="col">Title</th>
                                <th class="text-center" scope="col">Category</th>
                                <th class="text-center" scope="col">Picture</th>
                                <th class="text-center" scope="col">Price</th>
                                <th class="text-center" scope="col">Amount</th>
                                <th class="text-center" scope="col">Description</th>
                                <th class="text-center" scope="col">more</th>
                                <th class="text-center" scope="col">status</th>
                            </tr>
                        </thead>
                        <tbody class="table-light ">
                            <?php

                            while ($ligne = mysqli_fetch_assoc($result)) {
                                if(strlen($ligne["Description"])>20){
                                    $ligne["Description"]=substr($ligne["Description"],0,20).'...';
                                    }
                            ?>
                                <tr>
                                    <td class="text-center" scope="row"><?php echo $ligne["Title"] ?></td>
                                    <td class="text-center"><?php echo $ligne["namep"] ?></td>
                                    <td class="text-center"><?php echo '<img src="../img/' . $ligne["Picture"] . '" style="width:100px;height:70px;">' ?></td>
                                    <td class="text-center"><?php echo $ligne["Price"].'$' ?></td>
                                    <td class="text-center"><?php echo $ligne["Amount"] ?></td>
                                    <td class="text-center"><?php echo $ligne["Description"] ?></td>
                                    <form action="./show.php?id=<?php echo $ligne["Id"]; ?>" method="post">
                                        <input type="hidden" name="Id" value="<?php echo $ligne['Id'] ?>">
                                        <td class="text-center"><input type="submit" class="btn more text-light" name="submit" value="more"></td>
                                    </form>
                                    <td class="text-center">
                                        <?php if ($ligne["Amount"] > 0) echo '<input type="button" class="btn stock text-light" value="in stock">';
                                        else {
                                            echo '<input type="button" class="btn empty  text-light" value="unavailable">';
                                        } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- pagination -->
                <div class=" mb-3 d-flex justify-content-center">
                <?php
                
                for ($btn = 1; $btn <= $totalpages; $btn++) {
                ?>  
                    <a href="dashboard.php?page=<?= $btn ?>" class="mx-1 btn btn-pagination text-center text-light text-decoration-none"><?= $btn ?> </a>
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
                                <label class="form-label">category</label>
                                <select name="selectproduct" class="form-control" id="product-type">
                                    <option value="1">Jeux vid??o</option>
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
        $user=$_SESSION["Id"];
        $sql="SELECT * FROM moderator WHERE Id='$user' ";
        $result=mysqli_query($Connexion,$sql);
        $ligne=mysqli_fetch_assoc($result);
            
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


        <script src="../assets/dashboard.js"></script>
        <script src="../assets/scriptadd.js"></script>
        <script src="../assets/profile.js"></script>

    </body>

    </html>

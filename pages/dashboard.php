<?php
session_start();
include '../config/connexion.php';
$title = "Dashboard";
include '../config/head.php';
if ($_SESSION["sucess"] != "oui") {
    header('location:Signin.php');
} else {
 $Querynumbreproduct="SELECT * From product";
 $result=mysqli_query($Connexion,$Querynumbreproduct);
 $num=mysqli_num_rows($result);
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
                    <a class="mt-2 btn btn-light d-flex align-items-center" href="">
                        <i class="mx-3 fa-solid fa-cart-shopping"></i>
                        <span class="span">Analytics</span>
                    </a>

                    <a class="mt-2 btn btn-light d-flex align-items-center" href="">
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
                <header class="my-1 dashboard-header d-flex justify-content-between align-items-center">
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
                    <div class="col-lg-3">
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
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body d-flex justify-content-evenly align-items-center">
                                <div>
                                <h5 class="card-title">Amount</h5>
                                <p class="card-text"><?=$amountSum?></p>
                                </div>
                                <div>
                                <i class="fs-3  fa-solid fa-cart-shopping"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body d-flex justify-content-evenly align-items-center">
                                <div>
                                <h5 class="card-title">Prices</h5>
                                <p class="card-text"><?=$pricesum?></p>
                                </div>
                                <div>
                                <i class="fs-3 fa-solid fa-money-check-dollar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
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
                            $sql = "SELECT * FROM product INNER JOIN typeproduct ON product.Type=typeproduct.idp";
                            $result = mysqli_query($Connexion, $sql);
                            while ($ligne = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $ligne["Title"] ?></th>
                                    <td><?php echo $ligne["namep"] ?></td>
                                    <td><?php echo '<img src="../img/' . $ligne["Picture"] . '" style="width:100px;height:70px;">' ?></td>
                                    <td><?php echo $ligne["Price"] ?></td>
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
                                    <option value="3">aMateriel Gaming </option>
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
        <script src="../assets/dashboard.js"></script>
        <script src="../assets/scriptadd.js"></script>
    </body>

    </html>
<?php } ?>
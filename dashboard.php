<?php
session_start();
$title = "Dashboard";

include 'head.php';
// if($_SESSION["sucess"]!="oui"){
// header('location:Signin.php');
// }else{
//     echo "WELCOM".$_SESSION["Username"];
// }

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<body class="dashboard">

    <main class="main-dashboard">
        <aside id='aside-bar' class="sidebar-dashboard">
            <div class="dashboard-logo">
                <i id="double-left" class="fa fa-angle-double-left"></i>
                <i id="double-right" class="fa fa-angle-double-right"></i>
                <img class="user-dashboard" src="pictures/userman.jpg" alt="manuser">
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
            <header class=" dashboard-header d-flex justify-content-between align-items-center">
                <div class="paragraph-dashboard">
                    <p class="fs-4">Dashboard</p>
                </div>
                <div class="d-flex align-items-center">
                    <p>welcome</p>
                    <img class="userimage rounded-circle" src="pictures/userman.jpg" alt="manuser">
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
                            </tr>
                        </thead>
                        <tbody class="table-light ">
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody> 
            </table>
            </div>
        </section>

    </main>




    <div class="modal" tabindex="-1" id="modal-form">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  method="POST" id="form-product">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Game</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                        <!-- This Input Allows Storing Task Index  -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input name="title" type="text" class="form-control" id="task-title" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select name="select1" class="form-select">
                                <option value="">Please select</option>
                                <option value="1">Jeux vidéo</option>
                                <option value="2">Pc gamer</option>
                                <option value="3">aMateriel Gaming </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Picture</label>
                            <input name="file" type="file" accept=".jpg, .png" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input name="date" type="number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input name="date" type="number" class="form-control">
                        </div>
                        <div class="mb-0">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" name="save" class="btn btn-primary task-action-btn">save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="dashboard.js">

    </script>
</body>

</html>
<?php
// session_destroy();
?>
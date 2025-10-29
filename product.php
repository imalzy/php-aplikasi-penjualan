<?php
include "./config/db.php";

session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$result = $koneksi->query("SELECT * FROM products");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
    <title>Product</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css" />
    <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css" />
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/components.css" />
    <!-- Start GA -->
    <!-- <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"
    ></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "UA-94034622-3");
    </script> -->
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <?php include "./layouts/header.php"; ?>

            <?php include "./layouts/sidebar.php"; ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Product</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Product</a></div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between" style="width: 100%">
                                            <h4>List Product</h4>
                                            <button type="button" class="btn btn-info"
                                                id="modal-product">Tambah</button>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode</th>
                                                    <th>Nama</th>
                                                    <th>Stok</th>
                                                    <th>Harga</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" .
                                        $row["kode_product"] .
                                        "</td>";
                                    echo "<td>" .
                                        $row["nama_product"] .
                                        "</td>";
                                    echo "<td>" . $row["stock"] . "</td>";
                                    echo "<td>" . $row["harga"] . "</td>";
                                    echo "<td>
                                            <a href='edit.php?id=" .
                                        $row["id"] .
                                        "' class='btn btn-warning btn-sm'>Edit</a>
                                            <a href='delete.php?id=" .
                                        $row["id"] .
                                        "' class='btn btn-danger btn-sm' 
                                            onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a>
                                        </td>";
                                    echo "</tr>";
                                }
                            } ?>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <nav class="d-inline-block">
                                            <ul class="pagination mb-0">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1"><i
                                                            class="fas fa-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1 <span
                                                            class="sr-only">(current)</span></a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#"><i
                                                            class="fas fa-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php include "./layouts/footer.php"; ?>
        </div>

        <form class="modal-part" id="modal-form-product">
            <div class="form-group">
                <label for="kode_product">Kode Product</label>
                <input type="text" class="form-control" placeholder="Kode Product" name="kode_product">
            </div>
            <div class="form-group">
                <label for="nama_product">Nama Product</label>
                <input type="text" class="form-control" placeholder="Nama Product" name="nama_product">
            </div>
            <div class="form-group">
                <label for="stock_product">Stock</label>
                <input type="text" class="form-control" placeholder="Stock Product" name="stock_product">
            </div>
            <div class="form-group">
                <label for="harga_product">Harga (Rp)</label>
                <input type="text" class="form-control" placeholder="Harga Product" name="harga_product">
            </div>
        </form>

        <!-- General JS Scripts -->
        <script src="assets/modules/jquery.min.js"></script>
        <script src="assets/modules/popper.js"></script>
        <script src="assets/modules/tooltip.js"></script>
        <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="assets/modules/moment.min.js"></script>
        <script src="assets/js/stisla.js"></script>

        <!-- JS Libraies -->
        <script src="assets/modules/jquery.sparkline.min.js"></script>
        <script src="assets/modules/chart.min.js"></script>
        <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
        <script src="assets/modules/summernote/summernote-bs4.js"></script>
        <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

        <!-- Page Specific JS File -->
        <script src="assets/js/page/index.js"></script>

        <!-- Template JS File -->
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/custom.js"></script>

        <!-- Page Specific JS File -->
        <script src="assets/js/page/bootstrap-modal.js"></script>

</body>

</html>
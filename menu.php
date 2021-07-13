<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Burger King - Food Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    $headerArr = ["", "", "", "", "active", "", "", "", "", "", ""];
    require_once "./components/header.php" ?>

    <?php
    $title = "Food Menu";
    require_once "./components/topSection.php";
    ?>

    <!-- Food Start -->
    <div class="food mt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="food-item">
                        <i class="flaticon-burger"></i>
                        <h2>Burgers</h2>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem.
                        </p>
                        <a href="">View Menu</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food-item">
                        <i class="flaticon-snack"></i>
                        <h2>Snacks</h2>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem.
                        </p>
                        <a href="">View Menu</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food-item">
                        <i class="flaticon-cocktail"></i>
                        <h2>Beverages</h2>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem.
                        </p>
                        <a href="">View Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Food End -->

    <!-- Menu Start -->
    <div class="menu">
        <div class="container">
            <div class="section-header text-center">
                <p>Food Menu</p>
                <h2>Delicious Food Menu</h2>
            </div>
            <div class="menu-tab">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#burgers">Burgers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#snacks">Snacks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#beverages">Beverages</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="burgers" class="container tab-pane active">
                        <div class="row">
                            <div class="col-lg-7 col-md-12">
                                <?php
                                require_once "./php/db.php";
                                $burgers = "SELECT * FROM burgers";
                                $result = mysqli_query($mysqli, $burgers);

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="menu-item">
                                        <div class="menu-img">
                                            <img src="./img/burgers/<?php echo $row['img'] ?>" alt="<?php echo $row['name'] ?>">
                                        </div>
                                        <div class="menu-text">
                                            <h3>
                                                <span><?php echo $row['name'] ?></span>
                                                <strong>$<?php if($row['discPrice']){echo $row['discPrice'];}else{echo $row['price'];} ?></strong>
                                            </h3>
                                            <p><?php echo $row['info'] ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block">
                                <img src="img/menu-burger-img.jpg" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div id="snacks" class="container tab-pane fade">
                        <div class="row">
                            <div class="col-lg-7 col-md-12">
                            <?php
                                $burgers = "SELECT * FROM snacks";
                                $result = mysqli_query($mysqli, $burgers);

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="menu-item">
                                        <div class="menu-img">
                                            <img src="./img/snacks/<?php echo $row['img'] ?>" alt="<?php echo $row['name'] ?>">
                                        </div>
                                        <div class="menu-text">
                                            <h3>
                                                <span><?php echo $row['name'] ?></span>
                                                <strong>$<?php if($row['discPrice']){echo $row['discPrice'];}else{echo $row['price'];} ?></strong>
                                            </h3>
                                            <p><?php echo $row['info'] ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block">
                                <img src="img/menu-snack-img.jpg" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div id="beverages" class="container tab-pane fade">
                        <div class="row">
                            <div class="col-lg-7 col-md-12">
                            <?php
                                $burgers = "SELECT * FROM beverages";
                                $result = mysqli_query($mysqli, $burgers);

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="menu-item">
                                        <div class="menu-img">
                                            <img src="./img/Beverages/<?php echo $row['img'] ?>" alt="<?php echo $row['name'] ?>">
                                        </div>
                                        <div class="menu-text">
                                            <h3>
                                                <span><?php echo $row['name'] ?></span>
                                                <strong>$<?php if($row['discPrice']){echo $row['discPrice'];}else{echo $row['price'];} ?></strong>
                                            </h3>
                                            <p><?php echo $row['info'] ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block">
                                <img src="img/menu-beverage-img.jpg" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->

    <?php require_once "./components/footer.php" ?>
</body>

</html>
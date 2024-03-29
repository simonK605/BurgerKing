<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Burger King - Food Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="../../img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="../../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>

    <?php require_once "../db.php" ?>

    <div class="admin">
        <?php
        $navArr = ["index.php", "chefs.php", "foodCategories.php", "allFoods.php", "blogGrid.php", "contacts.php", "booking.php", "homeSection.php", "tags.php"];
        require_once "../../components/adminFoodNav.php";
        ?>

        <!-- ---------------------------------- SNACKS ----------------------------------------------- -->

        <div class="admin__section admin__section_header-list">
            <div class="admin__section_head">
                <h3 class="admin__section_title">Snacks</h3>
            </div>
            <div class="admin__section_content">
                <div class="admin__section_content">
                    <div class="admin__burgers">
                        <table class="admin__table">
                            <tr>
                                <th class="admin__table_title">name</th>
                                <th class="admin__table_title">info</th>
                                <th class="admin__table_title">img</th>
                                <th class="admin__table_title">price</th>
                                <th class="admin__table_title">discPrice</th>
                                <th class="admin__table_title">date</th>
                                <th class="admin__table_title">panel</th>
                            </tr>
                            <?php
                            $query = "SELECT * FROM all_foods WHERE categories_id = $_GET[catId]";
                            $result = mysqli_query($mysqli, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr class="admin__section_item">
                                    <td class="admin__section_item_td">
                                        <h3 class="admin__section_item_name">
                                            <?php echo $row['name'] ?>
                                        </h3>
                                    </td>
                                    <td class="admin__section_item_td">
                                        <?php echo $row['info'] ?>
                                    </td>
                                    <td class="admin__section_item_td">
                                        <div class="admin__section_img">
                                            <img src="../../img/foods/<?php echo $row['img'] ?>" alt="<?php echo $row['name'] ?>">
                                        </div>
                                    </td>
                                    <td class="admin__section_item_td">
                                        <?php echo $row['price'] ?>
                                    </td>
                                    <td class="admin__section_item_td">
                                        <?php echo $row['discPrice'] ? $row['discPrice'] : "no discount price" ?>
                                    </td>
                                    <td class="admin__section_item_td">
                                        <?php echo $row['date'] ?>
                                    </td>
                                    <td class="admin__section_item_td">
                                        <a href="?catId=<?php echo $_GET["catId"] ?>&id=<?php echo $row["id"] ?>">
                                            <i class="example__class admin__icon fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="./allFoods/remove.php?id=<?php echo $row["id"] ?>">
                                            <i class="admin__icon fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <?php
                    $id = '';
                    $name = '';
                    $info = '';
                    $img = '';
                    $price = '';
                    $discPrice = '';

                    if (isset($_GET["id"])) {
                        $query = 'SELECT * FROM all_foods WHERE id = ' . $_GET["id"];
                        $result = mysqli_query($mysqli, $query);

                        $row = mysqli_fetch_assoc($result);
                        $id = $row["id"];
                        $name = $row["name"];
                        $info = $row["info"];
                        $img = $row["img"];
                        $price = $row["price"];
                        $discPrice = $row["discPrice"];
                    }
                    ?>
                    <form class="admin__form"
                    action="<?php if (isset($_GET['id'])) {echo './allFoods/update.php';} else {echo './allFoods/insert.php';} ?>" method="POST" enctype="multipart/form-data">
                        <div class="form__flex">
                            <input class="admin__inp admin__inp_food form-control" type="text" name="name" placeholder="Name" required value="<?php echo $name ?>">

                            <textarea class="admin__inp admin__inp_food form-control" name="info" placeholder="Info"><?php echo $info ?></textarea>

                            <input class="admin__inp admin__inp_food form-control" type="file" name="img"
                            <?php if (!isset($_GET['id'])) {echo 'required';} ?>>

                            <input class="admin__inp admin__inp_food form-control" type="number" name="price" placeholder="Price" required value="<?php echo $price ?>">

                            <input class="admin__inp admin__inp_food form-control" type="number" name="discPrice" placeholder="Discount Price" value="<?php echo $discPrice ?>">

                            <select name="categoriesId" id="categoriesId" name="categoriesId">
                                <?php
                                $query = 'SELECT * FROM food_categories';
                                $result = mysqli_query($mysqli, $query);

                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $row['id'] ?>" <?php if ($row['id'] == 2) {
                                                                                    echo "selected='true'";
                                                                                } else {
                                                                                    echo false;
                                                                                } ?>>
                                        <?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select>

                            <input type="hidden" name="img" value="<?php echo $img ?>">

                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                        </div>
                        <div>
                            <button class="btn custom-btn admin__form_btn">Add snack</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <script src='../../lib/easing/easing.min.js'></script>
    <script src='../../lib/owlcarousel/owl.carousel.min.js'></script>
    <script src='../../lib/tempusdominus/js/moment.min.js'></script>
    <script src='../../lib/tempusdominus/js/moment-timezone.min.js'></script>
    <script src='../../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js'></script>

    <!-- Contact Javascript File -->
    <script src='../../mail/jqBootstrapValidation.min.js'></script>
    <script src='../../mail/contact.js'></script>

    <!-- Template Javascript -->
    <script src='../../js/admin.js'></script>
</body>

</html>
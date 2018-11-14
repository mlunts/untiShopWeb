<?php
    require_once 'core/init.php';
$featured = $db->query("SELECT * FROM products WHERE featured = 1");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>UNTITLED</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/main.css?v=1.0" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="css/navigation-bar.css?v=1.0" rel="stylesheet" type="text/css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/dropdown-menu.js" type="text/javascript"></script>
</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top" id="navbar">
    <div class="container">
        <a href="index.php" class="navbar-brand" id="brandbar">UNTITLED</a>
        <ul class="nav navbar-nav">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Женщины<b class="caret"></b></a>

                <ul class="dropdown-menu mega-menu">

                    <li class="mega-menu-column">
                        <ul>
                            <li class="nav-header">Одежда</li>
                            <img src="images/champion-reverse-weave-down-red-01-1.jpg">
                            <?php while ($category = mysqli_fetch_assoc($female_clothes)) : ?>
                                <li class="category">
                                    <a href="product-list.php?id=<?php echo $category['id']; ?>&gender=<?php echo urlencode('f') ?>"><?= $category['category'] ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </li>

                    <li class="mega-menu-column">
                        <ul>
                            <li class="nav-header">Обувь</li>
                            <img src="images/dr-martens-1460-smooth-black-1.jpg">
                            <?php while ($category = mysqli_fetch_assoc($female_shoes)) : ?>
                                <li class="category">
                                    <a href="product-list.php?id=<?php echo $category['id']; ?>&gender=<?php echo urlencode('f') ?>"><?= $category['category'] ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </li>

                    <li class="mega-menu-column">
                        <ul>
                            <li class="nav-header">Аксессуары</li>
                            <img src="images/adidas-backpack-originals-eqt-item1.png">
                            <?php while ($category = mysqli_fetch_assoc($female_accessories)) : ?>
                                <li class="category">
                                    <a href="product-list.php?id=<?php echo $category['id']; ?>&gender=<?php echo urlencode('f') ?>"><?= $category['category'] ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </li>

                </ul><!-- dropdown-menu -->

            </li><!-- /.dropdown -->


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Мужчины<b class="caret"></b></a>

                <ul class="dropdown-menu mega-menu">

                    <li class="mega-menu-column">
                        <ul>
                            <li class="nav-header">Одежда</li>
                            <img src="images/nike-windrunner-jacket-item-1.jp2">
                            <?php while ($category = mysqli_fetch_assoc($male_clothes)) : ?>
                                <li class="category">
                                    <a href="product-list.php?id=<?php echo $category['id']; ?>&gender=<?php echo urlencode('m') ?>"><?= $category['category'] ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </li>

                    <li class="mega-menu-column">
                        <ul>
                            <li class="nav-header">Обувь</li>
                            <img src="images/nike-air-max-97-qs-black-varsity-red-metallic-silver-white-1.jpg">
                            <?php while ($category = mysqli_fetch_assoc($male_shoes)) : ?>
                                <li class="category">
                                    <a href="product-list.php?id=<?php echo $category['id']; ?>&gender=<?php echo urlencode('m') ?>"><?= $category['category'] ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </li>

                    <li class="mega-menu-column">
                        <ul>
                            <li class="nav-header">Аксессуары</li>
                            <img src="images/champion-reverse-weave-merino-knit-beanie-logo-navy-1.jpg">
                            <?php while ($category = mysqli_fetch_assoc($male_accessories)) : ?>
                                <li class="category">
                                    <a href="product-list.php?id=<?php echo $category['id']; ?>&gender=<?php echo urlencode('m') ?>"><?= $category['category'] ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </li>

                </ul><!-- dropdown-menu -->

            </li><!-- /.dropdown -->
        </ul>


        <!-- ##### Right Side Cart Area ##### -->

        <div class="right-side-area">
            <!-- User Login Info -->
            <div class="col-md-6">
                <a href="register.php"><img src="images/elements/account-icon.png" alt=""></a>
            </div>
            <!-- Cart Area -->
            <div class="col-md-6">
                <a href="cart.php"><img src="images/elements/shopping-cart.png" alt=""></a>
            </div>
        </div>
        <!-- ##### Right Side Cart End ##### -->
    </div>
</nav>

<div class="container-fluid">
    <!--    <form method="get" action="details.php">-->
    <h2 class="text-center">СПЕЦИАЛЬНЫЕ ПРЕДЛОЖЕНИЯ</h2>
    <div class="row">
        <?php while($product = mysqli_fetch_assoc($featured)) : ?>
        <div class="col-md-3">
            <div id="container-text-product">
                <p> <?=$product['title']; ?> </p>
            </div>

            <div id="hover-details">
                <img src="images/<?=$product['image-1']; ?>" alt="<?=$product['title']; ?>" id="images"/>
                <div class="overlay"></div>
                <div class="button"><a href="details.php?id=<?php echo $product['id']; ?>"> ПОДРОБНЕЕ </a></div>
<!--                data-toggle="modal" data-target="#details-1"-->
            </div>
            <p class="price"><span class="discount-price text-danger"><s>$<?=$product['price']; ?></s></span> $<?=round($product['price'] - ($product['price']*$product['discount_percent'])/100, 2); ?></p>
        </div>
        <?php endwhile; ?>
    </div>
    <!--    </form>-->
</div>


</body>
</html>
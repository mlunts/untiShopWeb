<?php
require_once 'core/init.php';
include('header.php');

$id = $_GET['id'];
$gender = $_GET['gender'];

$sql = "SELECT b.brand_name, c.category, p.id, p.discount_percent, p.price, p.title, p.`image-2`, p.`image-1`, p.`image-3` FROM products p, category c, brand b WHERE c.id = '$id' AND c.id = p.category AND p.sex IN ('$gender', 'u') AND b.id=p.brand ORDER BY (p.id) DESC";

$result = $db->query($sql);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <?php
    while (($category = mysqli_fetch_array($result))) : ?>
        <title><?= $category['category']; ?></title>
    <?php endwhile; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/product-list.css?v=1.0" rel="stylesheet" type="text/css"/>
    <link href="css/navigation-bar.css?v=1.0" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/dropdown-menu.js" type="text/javascript"></script>
</head>
<body>

<!-- ##### Shop Grid Area Start ##### -->

<div class="container">
    <div class="row">



        <div class="col-12 col-md-9 col-lg-10">
            <div class="shop_grid_product_area">
                <!--                    <div class="row">-->
                <!--                        <div class="col-12">-->
                <!--                            <div class="product-topbar d-flex align-items-center justify-content-between">-->
                <!--                                <!-- Total Products -->
                <!--                                <div class="total-products">-->
                <!--                                    <p><span>186</span> products found</p>-->
                <!--                                </div>-->
                <!--                                <!-- Sorting -->
                <!--                                <div class="product-sorting d-flex">-->
                <!--                                    <p>Sort by:</p>-->
                <!--                                    <form action="#" method="get">-->
                <!--                                        <select name="select" id="sortByselect">-->
                <!--                                            <option value="value">Highest Rated</option>-->
                <!--                                            <option value="value">Newest</option>-->
                <!--                                            <option value="value">Price: $$ - $</option>-->
                <!--                                            <option value="value">Price: $ - $$</option>-->
                <!--                                        </select>-->
                <!--                                        <input type="submit" class="d-none" value="">-->
                <!--                                    </form>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->

                <div class="row">
                    <!-- Single Product -->
                    <!--                        <div class="col-12 col-sm-6 col-lg-4" style="background-color: aquamarine">-->

                    <?php mysqli_data_seek($result, 0);
                    while ($product = mysqli_fetch_assoc($result)) : ?>
                        <div class="col-md-4">
                            <div class="mcadf">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="images/<?= $product['image-1']; ?>"
                                         onmouseover="this.src='images/<?= $product['image-2']; ?>'"
                                         onmouseout="this.src='images/<?= $product['image-1']; ?>'"
                                         alt="<?= $product['title']; ?>">
                                </div>

                                <!-- Product Description -->
                                <div class="product-description">
                                    <span class="brand"><?= $product['brand_name']; ?></span>
                                    <p class="title"><a href="details.php?id=<?php echo $product['id']; ?>">
                                            <?= $product['title']; ?>
                                        </a></p>
                                    <?php if ($product['discount_percent'] != 0) : ?>
                                        <p class="price"><span
                                                class="discount-price text-danger"><s>$<?= $product['price']; ?></s></span> $<?= round($product['price'] - ($product['price'] * $product['discount_percent']) / 100, 2); ?>
                                    <?php else : ?>
                                        <p class="price">$<?= $product['price']; ?></p>
                                    <?php endif; ?>

                                    <!-- Hover Content -->
                                    <div class="hover-content">
                                        <!-- Add to Cart -->
                                        <div class="add-to-cart-btn">
                                            <a href="#" class="btn essence-btn">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <!--                        </div>-->

                </div>
            </div>
            <!-- Pagination -->
            <nav aria-label="navigation">
                <ul class="pagination mt-50 mb-70">
                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">21</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- ##### Shop Grid Area End ##### -->


</body>
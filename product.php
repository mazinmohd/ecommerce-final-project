<?php
include "Backend/db.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>

<header class="navbar">
    <h2 class="logo">TechLaptop</h2>

    <nav>
        <a href="index.html">Home</a>
        <a href="products.php">Products</a>
        <a href="cart.html">Cart</a>
        <a href="contact.html">Contact</a>
    </nav>
</header>

<div class="product-page">

    <div class="product-wrapper">

        <!-- IMAGE -->
        <div class="product-image-box">
            <img src="images/<?php echo $product['image']; ?>" alt="">
        </div>

        <!-- DETAILS -->
        <div class="product-info-box">

            <h1><?php echo $product['name']; ?></h1>

            <p class="product-price">
                $<?php echo $product['price']; ?>
            </p>

            <p class="product-desc">
                <?php echo $product['description']; ?>
            </p>

            <div class="btn-group">

                <button class="add-cart-btn"
                    onclick="addToCart(
                        '<?php echo addslashes($product['name']); ?>',
                        <?php echo $product['price']; ?>,
                        '<?php echo $product['image']; ?>'
                    )">
                    Add to Cart
                </button>

                <a href="products.php" class="back-link">
                    Back to Products
                </a>

            </div>

        </div>

    </div>

</div>

<footer>
    <p>© 2026 Tech Laptop Store</p>
</footer>

<script src="js/app.js"></script>

</body>
</html>
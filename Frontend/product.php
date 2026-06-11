<?php
include "../Backend/db.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>

<!-- NAVBAR -->
<header class="navbar">
    <h2 class="logo">TechLaptop</h2>

    <nav>
        <a href="index.html">Home</a>
        <a href="products.php">Products</a>
        <a href="cart.html">Cart</a>
        <a href="contact.html">Contact</a>
    </nav>
</header>

<!-- PRODUCT DETAILS -->
<section class="product-details">

    <div class="product-container">

        <!-- IMAGE -->
        <div class="product-image">
            <img src="images/<?php echo $product['image']; ?>" alt="">
        </div>

        <!-- INFO -->
        <div class="product-info">

            <h1><?php echo $product['name']; ?></h1>

            <h2 class="price">$<?php echo $product['price']; ?></h2>

            <p class="desc">
                <?php echo $product['description']; ?>
            </p>

        <div class="button-group">

            <button class="cart-btn"
                onclick="addToCart('<?php echo $product['name']; ?>', <?php echo $product['price']; ?>)">
                Add To Cart
            </button>

        <a href="products.php" class="back-btn">
            ← Back to Products
        </a>

</div>

        </div>

    </div>

</section>

<!-- FOOTER -->
<footer>
    <p>© 2026 Tech Laptop Store</p>
</footer>

<script src="js/app.js"></script>

</body>
</html>
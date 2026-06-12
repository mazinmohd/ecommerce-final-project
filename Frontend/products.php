<?php
include "../Backend/db.php";

$result = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Tech Laptop Store</title>
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

<!-- PRODUCTS SECTION -->
<section class="products-section">

    <h1>Our Laptop Collection</h1>

    <!-- FILTERS -->
    <div class="filters">
        <button onclick="filterProducts('all')">All</button>
        <button onclick="filterProducts('Gaming')">Gaming</button>
        <button onclick="filterProducts('Business')">Business</button>
        <button onclick="filterProducts('Student')">Student</button>
    </div>

    <!-- PRODUCTS GRID -->
    <div class="products-grid">

        <?php while($product = mysqli_fetch_assoc($result)) { ?>

            <div class="product-card <?php echo $product['category']; ?>">

                <img src="images/<?php echo $product['image']; ?>" alt="">

                <h3><?php echo $product['name']; ?></h3>

                <p>$<?php echo $product['price']; ?></p>

                <button class="view-btn"
                    onclick="window.location.href='product.php?id=<?php echo $product['id']; ?>'">
                    View Details
                </button>

                <button class="cart-btn"
                    onclick="addToCart(
                    '<?php echo addslashes($product['name']); ?>',
                    <?php echo $product['price']; ?>,
                    '<?php echo $product['image']; ?>'
                    )">
                    Add To Cart
                </button>
            </div>

        <?php } ?>

    </div>

</section>

<!-- FOOTER -->
<footer>
    <p>© 2026 Tech Laptop Store. All rights reserved.</p>
</footer>

<script src="js/app.js"></script>

</body>
</html>
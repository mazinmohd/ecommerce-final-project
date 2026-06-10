<?php
include '../Backend/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Laptop Store</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <h1>Tech Laptop Store</h1>

            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="products-page">

            <h2>Our Laptop Collection</h2>

        </section>
        <div class="filter-buttons">

            <button onclick="filterProducts('all')">All</button>

            <button onclick="filterProducts('gaming')">Gaming</button>

            <button onclick="filterProducts('business')">Business</button>

            <button onclick="filterProducts('student')">Student</button>

        </div> 
        <div class="products-grid">
        <?php

            $query =
            "SELECT * FROM products";

            $result =
            mysqli_query($conn,$query);

            while(
            $product =
            mysqli_fetch_assoc($result)
            ){

            ?>

            <div class="product-card <?php echo strtolower($product['category']); ?>">

                <img
                src="images/<?php
                echo $product['image'];
                ?>"
                alt="Laptop">

                <h3>
                    <?php
                    echo $product['name'];
                    ?>
                </h3>

                <p>
                    $
                    <?php
                    echo $product['price'];
                    ?>
                </p>

                <a href="product.php?id=<?php echo $product['id']; ?>">
                    <button class="view-btn">
                        View Details
                    </button>
                </a>

            </div>

            <?php
            }
            ?>
        </div>
    </main>
    <footer>

        <p>Tech Laptop Store © 2026</p>

    </footer>
    <script src="js/app.js"></script>
</body>
</html>
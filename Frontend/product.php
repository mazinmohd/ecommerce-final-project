<?php

include '../Backend/db.php';

$id = $_GET['id'];

$query =
"SELECT * FROM products WHERE id = $id";

$result =
mysqli_query($conn,$query);

$product =
mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>

<head>

    <title>
        <?php echo $product['name']; ?>
    </title>

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

    <section class="product-container">

        <div class="product-box">

            <img
            src="images/<?php echo $product['image']; ?>"
            alt="<?php echo $product['name']; ?>"
            class="product-image">

            <div class="product-content">

                <span class="category-badge">
                    <?php echo $product['category']; ?>
                </span>

                <h1>
                    <?php echo $product['name']; ?>
                </h1>

                <h2>
                    $<?php echo $product['price']; ?>
                </h2>

                <p class="description">
                    <?php echo $product['description']; ?>
                </p>

                <div class="button-group">

                    <button
                    class="cart-btn"
                    onclick="addToCart(
                    '<?php echo $product['name']; ?>',
                    <?php echo $product['price']; ?>
                    )">
                        Add To Cart
                    </button>

                    <a href="products.php">
                        <button class="back-btn">
                            Back To Products
                        </button>
                    </a>

                </div>

            </div>

        </div>

    </section>

</main>
    <footer>

        <p>Tech Laptop Store © 2026</p>

    </footer>
    <script src="js/app.js"></script>
</body>
</html>
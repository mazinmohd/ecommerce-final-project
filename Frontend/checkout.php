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
                <li><a href="products.php">Products</a></li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>

        <section class="checkout-page">

            <h2>Checkout</h2>

            <form action="../Backend/place_order.php" method="POST" id="checkout-form">

                <input type="text" name="name" placeholder="Full Name" required>

                <input type="email" name="email" placeholder="Email" required>

                <input type="text" name="phone" placeholder="Phone" required>

                <textarea name="address" placeholder="Address" required></textarea>

                <input type="hidden" name="cart_data" id="cart_data">

                <button type="submit">
                    Place Order
                </button>

            </form>

        </section>

    </main>
    <footer>

        <p>Tech Laptop Store © 2026</p>

    </footer>
    <script src="js/app.js"></script>
</body>
</html>
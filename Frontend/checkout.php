<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
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

<!-- CHECKOUT -->
<section class="checkout-page">

    <div class="checkout-container">

        <!-- FORM -->
        <div class="checkout-form-box">

            <h2>Billing Details</h2>

            <form id="checkout-form" method="POST" action="../Backend/place_order.php">

                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Phone" required>
                <input type="text" name="address" placeholder="Address" required>

                <!-- CART DATA -->
                <input type="hidden" name="cart_data" id="cart_data">

                <button type="submit" class="checkout-btn">
                    Place Order
                </button>

            </form>

        </div>

        <!-- ORDER SUMMARY -->
        <div class="order-summary-box">

            <h2>Your Order</h2>

            <div id="order-summary"></div>

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